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
use Maestro\Persistence\Annotation\Validator;
use Maestro\MVC\MBusinessModel;
//@IdGenerator(sequence="seq_user_id")
/**
 * @Map(table="`user`",database="kancolle")
 */
class UserMap extends MBusinessModel
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="SEQUENCE")
     * @var integer
     **/
    protected $id;
    /**
     * @Column(length=20,unique=True)
     * @var string
     */
    protected $login;
    /**
     * @Column()
     * @Validator(class="auth\Classes\MyValidator",rules={"email"})
     * @var string
     **/
    protected $email;
    /**
     * @Column(name="password_salt")
     * @Validator()
     * @var string
     **/
    protected $passwordSalt;
    /**
     * @Column(type="mpassword")
     * @Validator(rules={"NotEmpty","length"={5,null}},method="validatePassword")
     * @var string
     */
    protected $password;
    /**
     * @ManyToMany(targetEntity="auth/models/Role")
     * @JoinTable(name="user_role")
     */
    protected $roles;
    /**
     * Getters/Setters
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($value)
    {
        $this->login = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getPasswordSalt()
    {
        return $this->passwordSalt;
    }

    public function setPasswordSalt($value)
    {
        $this->passwordSalt = $value;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($value)
    {
        $this->password = $value;
    }

    /**
     *
     * @return Association
     */
    public function getRoles()
    {
        if (is_null($this->roles)) {
            $this->retrieveAssociation("roles");
        }
        return $this->roles;
    }

    /**
     *
     * @param Association $value
     */
    public function setRoles($value)
    {
        $this->roles = $value;
    }

    /**
     *
     * @return Association
     */
    public function getAssociationRoles()
    {
        $this->retrieveAssociation("roles");
    }


}

// end - wizard

?>