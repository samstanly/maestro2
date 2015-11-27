<?php
/**
 * $_comment
 *
 * @category   Maestro
 * @package    UFJF
 * @subpackage $_package
 * @copyright  Copyright (c) 2003-2012 UFJF (http://www.ufjf.br)
 * @license    http://siga.ufjf.br/license
 * @version    
 * @since      
 */

Manager::import("auth\models\*");

class UserController extends MController {

    public function main() {
        $this->render("formBase");
    }

    public function formFind() {
        $User= new User($this->data->id);
        $filter->login = $this->data->login;
        $this->data->query = $User->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function formNew() {
        $this->data->action = '@auth/User/save';
        $this->render();
    }

    public function formObject() {
        $this->data->User = User::create($this->data->id)->getData();
        $this->render();
    }

    public function formUpdate() {
        $User= new User($this->data->id);
        $this->data->User = $User->getData();
        
        $this->data->action = '@auth/User/save/' .  $this->data->id;
        $this->render();
    }

    public function formDelete() {
        $User = new User($this->data->id);
        $ok = '>auth/User/delete/' . $User->getId();
        $cancelar = '>auth/User/formObject/' . $User->getId();
        $this->renderPrompt('confirmation', "Confirma remoção do User [{$model->getDescription()}] ?", $ok, $cancelar);
    }

    public function lookup() {
        $model = new User();
        $filter->login = $this->data->login;
        $this->data->query = $model->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function save() {
            $User = new User($this->data->User);
            $User->save();
            $go = '>auth/User/formObject/' . $User->getId();
            $this->renderPrompt('information','OK',$go);
    }

    public function delete() {
            $User = new User($this->data->id);
            $User->delete();
            $go = '>auth/User/formFind';
            $this->renderPrompt('information',"User [{$this->data->login}] removido.", $go);
    }

}