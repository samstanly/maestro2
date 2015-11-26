<?php

namespace Maestro\Persistence\Annotation;

use Doctrine\ORM\Mapping\Annotation;

/** @Annotation */
class Association implements Annotation
{
    /**
     * @var string
     */
    public $toClass;
    /**
     * @var string
     */
    public $cardinality;
}

