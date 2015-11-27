<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 26/11/2015
 * Time: 10:42
 */

namespace Maestro\Persistence\Annotation;


/** @Annotation */
class ManyToMany extends Association
{
    public $cardinality = "manyToMany";
    public $associative;
}