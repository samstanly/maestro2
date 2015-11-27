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

class RoleController extends MController {

    public function main() {
        $this->render("formBase");
    }

    public function formFind() {
        $Role= new Role($this->data->id);
        $filter->name = $this->data->name;
        $this->data->query = $Role->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function formNew() {
        $this->data->action = '@auth/Role/save';
        $this->render();
    }

    public function formObject() {
        $this->data->Role = Role::create($this->data->id)->getData();
        $this->render();
    }

    public function formUpdate() {
        $Role= new Role($this->data->id);
        $this->data->Role = $Role->getData();
        
        $this->data->action = '@auth/Role/save/' .  $this->data->id;
        $this->render();
    }

    public function formDelete() {
        $Role = new Role($this->data->id);
        $ok = '>auth/Role/delete/' . $Role->getId();
        $cancelar = '>auth/Role/formObject/' . $Role->getId();
        $this->renderPrompt('confirmation', "Confirma remoção do Role [{$model->getDescription()}] ?", $ok, $cancelar);
    }

    public function lookup() {
        $model = new Role();
        $filter->name = $this->data->name;
        $this->data->query = $model->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function save() {
            $Role = new Role($this->data->Role);
            $Role->save();
            $go = '>auth/Role/formObject/' . $Role->getId();
            $this->renderPrompt('information','OK',$go);
    }

    public function delete() {
            $Role = new Role($this->data->id);
            $Role->delete();
            $go = '>auth/Role/formFind';
            $this->renderPrompt('information',"Role [{$this->data->name}] removido.", $go);
    }

}