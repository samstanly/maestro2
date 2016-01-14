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
namespace Maestro\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Maestro\Manager;
use Nette\NotImplementedException;

abstract class MType
{
    const MCPF = 'mcpf';
    const MDate = 'mdate';
    const MPASSWORD = 'mpassword';
    const MTIMESTAMP = 'mtimestamp';
    /**
     * @var array Maestro default Types mappings
     */
    private static $_MaestroTypesMap = array(
        self::MCPF => 'Maestro\Types\MCPF',
        self::MPASSWORD => 'Maestro\Types\MPassword',
        self::MData => 'Maestro\Types\MDate',
        self::MTIMESTAMP => 'Maestro\Types\MTimestamp'
    );

    /**
     * {@inheritdoc}
     */
    public static function getType($name)
    {
        if(Type::hasType($name)) {
            return Type::getType($name);
        }else if(MType::hasType($name)){
            return new MType::$_MaestroTypesMap[$name]();
        }
        return false;
    }

    public static function hasType($name){
        if(Type::hasType($name)) {
            return true;
        }else{
            if(self::$_MaestroTypesMap[$name]) {
                Type::addType($name, self::$_MaestroTypesMap[$name]);
                return true;
            }
        }
        return false;
    }

    public abstract function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform);

    public abstract function convertToPHPValue($value, AbstractPlatform $platform);

    public abstract function convertToDatabaseValue($value, AbstractPlatform $platform);

    public abstract function getName();
}

