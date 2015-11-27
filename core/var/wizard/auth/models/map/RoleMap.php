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

class RoleMap extends \MBusinessModel {

    
    public static function ORMMap() {

        return array(
            'class' => \get_called_class(),
            'database' => 'kancolle',
            'table' => 'role',
            'attributes' => array(
                'id' => array('column' => 'id','key' => 'primary','idgenerator' => 'seq_id_role','type' => 'integer'),
                'name' => array('column' => 'name','type' => 'string'),
                'description' => array('column' => 'description','type' => 'string'),
            ),
            'associations' => array(
                'users' => array('toClass' => '\auth\models\user', 'cardinality' => 'manyToMany' , 'associative' => 'user_role'), 
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
    protected $name;
    /**
     * 
     * @var string 
     */
    protected $description;

    /**
     * Associations
     */
    protected $users;
    

    /**
     * Getters/Setters
     */
    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($value) {
        $this->description = $value;
    }
    /**
     *
     * @return Association
     */
    public function getUsers() {
        if (is_null($this->users)){
            $this->retrieveAssociation("users");
        }
        return  $this->users;
    }
    /**
     *
     * @param Association $value
     */
    public function setUsers($value) {
        $this->users = $value;
    }
    /**
     *
     * @return Association
     */
    public function getAssociationUsers() {
        $this->retrieveAssociation("users");
    }

    

}
// end - wizard

?>