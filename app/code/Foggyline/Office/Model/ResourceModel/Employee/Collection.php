<?php

namespace Foggyline\Office\Model\ResourceModel\Employee;

class Collection extends \Magento\Eav\Model\Entity\Collection\AbstractCollection
{
    protected function _construct()
    {   
        $this->init(
            'Foggyline\Office\Model\Employee',
            'Foggyline\Office\Model\ResourceModel\Employee'
        );
    }
}