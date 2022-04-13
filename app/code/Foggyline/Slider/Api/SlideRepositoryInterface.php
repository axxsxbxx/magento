<?php

namespace Foggyline\Slider\Api;

interface SlideRepositoryInterface
{
    // Slide entity 불러옴
    public function getById($slideId);

    // Slide 저장
    public function save(\Foggyline\Slider\Api\Data\SlideInterface $slide);

    // 요청된 검색 기준에 매치되는 Slide 불러옴
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    // ID로 Slide 삭제
    public function deleteById($slideId);
}