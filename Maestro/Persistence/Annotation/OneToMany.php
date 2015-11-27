<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 26/11/2015
 * Time: 10:42
 */

namespace Maestro\Persistence\Annotation;


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