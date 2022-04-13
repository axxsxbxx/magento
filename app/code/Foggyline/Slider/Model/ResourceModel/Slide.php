<?php

namespace Foggyline\Slider\Model\ResourceModel;

// Foggyline Slide 자원
class Slide extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    // 메인 테이블 정의
    protected function _construct()
    {
        $this->_init('foggyline_slider_slide', 'slide_id');
    }
}