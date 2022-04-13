<?php

namespace Foggyline\Slider\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;

class SlideRepository implements \Foggyline\Slider\Api\SlideRepositoryInterface
{
    protected $resource;
    protected $slideFactory;
    protected $slideCollectionFactory;
    protected $searchResultsFactory;
    protected $dataObjectHelper;
    protected $dataObjectProcessor;
    protected $dataSlideFactory;

    public function __construct(
        \Foggyline\Slider\Model\ResourceModel\Slide $resource,
        \Foggyline\Slider\Model\SlideFactory $slideFactory,
        \Foggyline\Slider\Model\ResourceModel\Slide\CollectionFactory $slideCollectionFactory,
        \Magento\Framework\Api\SearchResultsInterface $searchResultsFactory,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,
        \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor,
        \Foggyline\Slider\Api\Data\SlideInterfaceFactory $dataSlideFactory
    )
    {
        $this->resource = $resource;
        $this->slideFactory = $slideFactory;
        $this->slideCollectionFactory = $slideCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->dataSlideFactory = $dataSlideFactory;
    }

    // slide entity 불러옴
    public function getById($slideId)
    {
        $slide = $this->slideFactory->create();
        $this->resource->load($slide, $slideId);
        if(!$slide->getId()) {
            throw new NoSuchEntityException(__('Slide with id %1 does not exist.', $slideId));
        }
        return $slide;
    }

    // slide 저장
    public function save(\Foggyline\Slider\Api\Data\SlideInterface $slide)
    {
        try {
            $this->resource->save($slide);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $slide;
    }

    // 요청된 검색 기준에 매치되는 slides 불러옴
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $this->searchResultsFactory->setSearchCriteria($searchCriteria);

        $collection = $this->slideCollectionFactory->create();

        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition =>
                $filter->getValue()]);
            }
        }
        $this->searchResultsFactory->setTotalCount($collection->getSize());
        $sortOrders = $searchCriteria->getSortOrders();
        if ($sortOrders) {
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                        (strtoupper($sortOrder->getDirection()) === 'ASC') ? 'ASC': 'DESC'
                );
            }
        }

        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        $slides = [];

        foreach ($collection as $slideModel) {
            $slideData = $this->dataSlideFactory->create();
            $this->dataObjectHelper->populateWithArray(
                $slideData,
                $slideModel->getData(),
                '\Foggyline\Slider\Api\Data\SlideInterface'
            );
            $slides[] = $this->dataObjectProcessor->buildOutputDataArray(
                $slideData,
                '\Foggyline\Slider\Api\Data\SlideInterface'
            );
        }

        $this->searchResultsFactory->setItems($slides);
        return $this->searchResultsFactory;
    }

    // slide 삭제
    public function delete(\Foggyline\Slider\Api\Data\SlideInterface $slide)
    {
        try {
            $this->resource->delete($slide);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    // id로 slide 삭제
    public function deleteById($slideId)
    {
        return $this->delete($this->getById($slideId));
    }
}