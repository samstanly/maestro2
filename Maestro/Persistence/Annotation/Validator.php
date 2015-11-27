<?php

namespace Maestro\Persistence\Annotation;

use Doctrine\ORM\Mapping\Annotation;

/** @Annotation */
class Validator implements Annotation
{
    /**
     * @var string
     */
    public $method;
    /**
     * @var string
     */
    public $class;
    /**
     * @var array
     */
    public $rules;

}

