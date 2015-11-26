<?php

namespace Maestro\Persistence\Annotation;

use Doctrine\ORM\Mapping\Annotation;

/** @Annotation */
class Association implements  Annotation
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

/** @Annotation */
class ManyToMany extends Association
{
    public $cardinality = "manyToMany";
    public $associative;
}

/** @Annotation */
class OneToMany extends Association
{
    /**
     * @var string
     */
    public $foreignKey;
    /**
     * @var string
     */
    public $refersTo;
    public $cardinality = "oneToMany";
}