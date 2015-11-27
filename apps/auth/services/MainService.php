<?php
use auth\models\map\UserMap;
use auth\models\User;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\CachedReader;
use Doctrine\Common\Cache\Cache;
use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;


class MainService extends \Maestro\MVC\MService
{
    public function main(){

    }

    public function createUser($login,$password,$email){
        try {

            $user = new User();
            $user->setLogin($login);
            $user->setEmail($email);
            $salt = time();
            $user->setPasswordSalt($salt);
            $user->setPassword($password);
            $user->save();
            $result = "ok";
        }catch(Exception $e){
            $result = $e->getMessage();
        }

        return $result;
    }

    public function retrieveUser($login){
        try{
            /*
            $info = new ClassMetadata(UserMap::class);
            //mdump($info);
            $builder = new ClassMetadataBuilder($info);
            mdump($builder->getClassMetadata());
            return;
            */
            $user = new User();
            $reader = new AnnotationReader();
            /*
            mdump($meta);
            foreach($meta->fieldMappings as $key=>$value){
                $type = \Maestro\Types\MType::getType($value['type']);
                $column = new \Maestro\Persistence\DBAL\MColumn($value['columnName'],$type,$value);
                //mdump($column);
                //mdump($meta->getFieldMapping($key));
            }
*/
            //mdump($meta);
            $user->byLogin($login);

            return $user->getData();
        }catch (Exception $e){
            $result = $e->getMessage();
        }
        return $result;
    }
}