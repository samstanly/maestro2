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

use auth\models\map\UserMap;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping\ClassMetadataInfo;

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

    public function byLogin($login){
        $criteria = $this->getCriteria()->select('id')->where("login = '{$login}'");

        //$user1 = new User();
        //$user1->retrieveFromCriteria($criteria);
        //mdump("User 1 =======");
       // mdump($user1->getData());

        $id = $criteria->asQuery()->getResult()[0][0];

        //$user = new User($criteria);
        //mdump($user->getData());
        //mdump('---');
        $this->setId($id);
        $this->retrieve();
        return;
        mdump("User this =========");
        mdump($this->getData());
    }

    public function validatePassword(){
        return false;
    }
}

?>