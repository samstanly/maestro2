<?php
/**
 * @category   Maestro
 * @package    UFJF
 * @subpackage auth
 * @copyright  Copyright (c) 2003-2013 UFJF (http://www.ufjf.br)
 * @license    http://siga.ufjf.br/license
 * @version
 * @since
 */

// wizard - code section created by Wizard Module

namespace auth\models\map;

class UserMap extends \MBusinessModel {

    
    public static function ORMMap() {

        return array(
            'class' => \get_called_class(),
            'database' => 'kancolle',
            'table' => 'user',
            'attributes' => array(
                'id' => array('column' => 'id','key' => 'primary','idgenerator' => 'seq_id_user','type' => 'integer'),
                'login' => array('column' => 'login','type' => 'string'),
                'email' => array('column' => 'email','type' => 'string'),
                'passwordSalt' => array('column' => 'password_salt','type' => 'string'),
                'password' => array('column' => 'password','type' => 'string'),
            ),
            'associations' => array(
                'roles' => array('toClass' => '\auth\models\role', 'cardinality' => 'manyToMany' , 'associative' => 'user_role'), 
            )
        );
    }
    
    /**
     * 
     * @var integer 
     */
    protected $id;
    /**
     * 
     * @var string 
     */
    protected $login;
    /**
     * 
     * @var string 
     */
    protected $email;
    /**
     * 
     * @var string 
     */
    protected $passwordSalt;
    /**
     * 
     * @var string 
     */
    protected $password;

    /**
     * Associations
     */
    protected $roles;
    

    /**
     * Getters/Setters
     */
    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($value) {
        $this->login = $value;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }

    public function getPasswordSalt() {
        return $this->passwordSalt;
    }

    public function setPasswordSalt($value) {
        $this->passwordSalt = $value;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($value) {
        $this->password = $value;
    }
    /**
     *
     * @return Association
     */
    public function getRoles() {
        if (is_null($this->roles)){
            $this->retrieveAssociation("roles");
        }
        return  $this->roles;
    }
    /**
     *
     * @param Association $value
     */
    public function setRoles($value) {
        $this->roles = $value;
    }
    /**
     *
     * @return Association
     */
    public function getAssociationRoles() {
        $this->retrieveAssociation("roles");
    }

    

}
// end - wizard

?>