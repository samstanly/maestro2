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

class User extends map\UserMap {

    public static function config() {
        return array(
            'log' => array( user ),
            'validators' => array(
                'login' => array('notnull'),
                'email' => array('notnull'),
                'passwordSalt' => array('notnull'),
                'password' => array('notnull'),
            ),
            'converters' => array()
        );
    }
    
    public function getDescription(){
        return $this->getLogin();
    }

    public function listByFilter($filter){
        $criteria = $this->getCriteria()->select('*')->orderBy('login');
        if ($filter->login){
            $criteria->where("login LIKE '{$filter->login}%'");
        }
        return $criteria;
    }
}

?>