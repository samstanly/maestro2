<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 27/11/2015
 * Time: 18:42
 */

namespace Maestro\Database\Platforms;


interface MPlatform
{
    function convertColumn($value,$type);

    function convertToPHPValue($value,$type);

    function convertToDatabaseValue($value,$type);

}