<?php
/**
 * Created by PhpStorm.
 * User: Butterfly
 * Date: 10/25/2017
 * Time: 12:05 PM
 */

namespace chabibnr\docblock;


class GetProperty
{
    /** @var null|\ReflectionClass  */
    private $_reflector = null;
    /** @var null|\phpDocumentor\Reflection\DocBlockFactory  */
    private $_factory = null;

    private $_properties = [];
    public function __construct($reflector, $factory)
    {
        $this->_reflector = $reflector;
        $this->_factory = $factory;
        $this->_allProperties();
    }

    public function all(){
        return $this->_properties;
    }

    private function _allProperties(){
        foreach ($this->_reflector->getProperties() as $property){
            $docComment = $this->_reflector->getProperty($property->getName())->getDocComment();
            if(empty($docComment)){
                $docComment = '/**  */';
            }
            $document = $this->_factory->create($docComment);
            $this->_properties[$property->getName()] = [
                'name' => $property->getName(),
                'defined' => $property->getDeclaringClass()->name,
                'identity' => Document::tags($document)
            ];
        }
    }
}