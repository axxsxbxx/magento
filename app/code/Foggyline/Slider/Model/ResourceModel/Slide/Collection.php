<?php

namespace Foggyline\Slider\Model\ResourceModel\Slide;

// Foggyline slides 컬렉션
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    // 리소스 모델과 모델 정의
    protected function _construct()
    {
        $this->_init('Foggyline\Slider\Model\Slide',
        'Foggyline\Slider\Model\ResourceModel\Slide');
    }
}