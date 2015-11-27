<?php
/* Copyright [2011, 2012, 2013] da Universidade Federal de Juiz de Fora
 * Este arquivo é parte do programa Framework Maestro.
 * O Framework Maestro é um software livre; você pode redistribuí-lo e/ou 
 * modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada 
 * pela Fundação do Software Livre (FSF); na versão 2 da Licença.
 * Este programa é distribuído na esperança que possa ser  útil, 
 * mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer
 * MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL 
 * em português para maiores detalhes.
 * Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título
 * "LICENCA.txt", junto com este programa, se não, acesse o Portal do Software
 * Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a 
 * Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA
 * 02110-1301, USA.
 */
namespace Maestro\Utils;

use Maestro;
use Nette\Neon\Exception;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class MDataValidator {

    private $object;
    private $validators;

    public function __construct(Maestro\MVC\MBusinessModel $object) {
        $this->object = $object;
        foreach($object->getAttributesMap() as $attribute=>$definition){
            $this->validators[$attribute] = $definition['validators'];
        }
        //mdump($this->validators);
    }

    public function validate(){
        $errors = [];
        foreach($this->validators as $attribute=>$validators){
            try {
                $respect = v::create();
                $value = $this->object->{'get' . $attribute}();
                foreach ($validators as $name => $condition) {
                    if (!$condition) {
                        continue;
                    }

                    if ($name == "method") {
                        if (!$this->object->{$condition}()) {
                            mdump("Method validation failed");
                        }
                    } elseif ($name == "class") {
                        $validateObj = new $condition($value);
                        if(!$validateObj->validate()){
                            $errors[] = $validateObj->getValidationFailedMessage();
                        }
                    } elseif ($name == "rules") {
                        foreach ($condition as $ruleName=>$rule) {
                            if(is_array($rule)){
                                call_user_func_array([$respect,$ruleName],$rule);
                            }else {
                                $respect = $respect::$rule();
                            }
                        }

                    }
                }
                $respect->assert($value);
            }catch(NestedValidationException $e){
                $errors[] = $e->getFullMessage();
            }
        }
        mdump($errors);
    }
}