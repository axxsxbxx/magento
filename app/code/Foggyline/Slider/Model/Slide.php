<?php

namespace Foggyline\Slider\Model;

class Slide extends \Magento\Framework\Model\AbstractModel implements \Foggyline\Slider\Api\Data\SlideInterface
{
    // Foggyline Slide 모델 초기화
    protected function _construct()
    {
        $this->_init('Foggyline\Slider\Model\ResourceModel\Slide');
    }

    // Slide entity의 slide_id 프로퍼티 값을 불러옴
    public function getId()
    {
        return $this->getData(self::PROPERTY_ID);
    }

    // Slide entity의 slide_id 프로퍼티 값 설정
    public function setId($id)
    {
        $this->setData(self::PROPERTY_ID, $id);
        return $this;
    }

    // Slide entity의 slide_id 프로퍼티 값 불러옴
    public function getSlideId()
    {
        return $this->getData(self::PROPERTY_SLIDE_ID);
    }

    // Slide entity의 slide_id 프로퍼티 값 설정
    public function setSlideId($slideId)
    {
        $this->setData(self::PROPERTY_SLIDE_ID, $slideId);
        return $this;
    }

    // Slide entity의 title 프로퍼티 값 불러옴
    public function getTitle()
    {
        return $this->getData(self::PROPERTY_TITLE);
    }

    // Slide entity의 title 속성값 설정
    public function setTitle($title)
    {
        $this->setData(self::PROPERTY_TITLE, $title);
    }
}