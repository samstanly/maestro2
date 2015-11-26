<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 24/11/2015
 * Time: 19:07
 */

namespace Maestro\Persistence\Annotation;


use Doctrine\ORM\Mapping\Annotation;

/** @Annotation */
class Map implements Annotation
{
    public $database;
    public $table;

}

/** @Annotation */
class IdGenerator implements Annotation
{
    public $sequence;
}