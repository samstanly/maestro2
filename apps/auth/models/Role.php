<?php
/**
 * 
 *
 * @category   Maestro
 * @package    UFJF
 * @subpackage auth
 * @copyright  Copyright (c) 2003-2012 UFJF (http://www.ufjf.br)
 * @license    http://siga.ufjf.br/license
 * @version    
 * @since      
 */

namespace auth\models;

use Doctrine\DBAL\Types\Type;

class Role extends map\RoleMap {

    public static function config() {
        return array(
            'log' => array( role ),
            'validators' => array(
                'name' => array('notnull'),
                'description' => array('notnull'),
            ),
            'converters' => array()
        );
    }
    
    public function getDescription(){
        return $this->getName();
    }

    public function listByFilter($filter){
        $criteria = $this->getCriteria()->select('*')->orderBy('name');
        if ($filter->name){
            $criteria->where("name LIKE '{$filter->name}%'");
        }
        return $criteria;
    }
}

Type::BIGINT

?>