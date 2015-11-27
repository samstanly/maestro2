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

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Maestro\Persistence\Annotation\Map;
use Maestro\MVC\MBusinessModel;


/**
 * @package auth\models\map
 * @Map(table="role",database="kancolle")
 */
class RoleMap extends MBusinessModel {
    /**
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @Column(type="integer")
     * @var integer 
     */
    protected $id;
    /**
     * @Column()
     * @var string 
     */
    protected $name;
    /**
     * @Column()
     * @var string 
     */
    protected $description;
    /**
     * @ManyToMany(targetEntity="auth/models/User")
     * @JoinTable(name="user_role")
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