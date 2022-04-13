<?php

namespace Foggyline\Slider\Api\Data;

interface SlideInterface
{
    const PROPERTY_ID = 'slide_id';
    const PROPERTY_SLIDE_ID = 'slide_id';
    const PROPERTY_TITLE = 'title';

    public function getId();
    public function setId($id);
    public function getSlideId();
    public function setSlideId($slideId);
    public function getTitle();
    public function setTitle($title);

}