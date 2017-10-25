<?php
/**
 * Created by PhpStorm.
 * User: Butterfly
 * Date: 10/25/2017
 * Time: 12:05 PM
 */

namespace chabibnr\docblock;


class GetMethod
{
    /** @var null|\ReflectionClass  */
    private $reflector = null;
    /** @var null|\phpDocumentor\Reflection\DocBlockFactory  */
    private $factory = null;

    private $methods = [];

    public function __construct($reflector, $factory)
    {
        $this->reflector = $reflector;
        $this->factory = $factory;

        $this->_allMethods();
    }

    public function all(){
        return $this->methods;
    }

    private function _allMethods(){
        foreach ($this->reflector->getMethods() as $method){
            $docComment = $this->reflector->getMethod($method->getName())->getDocComment();
            $document = $this->factory->create($docComment);
            $this->methods[$method->getName()] = [
                'test' => $document,
                'defined' => $method->getDeclaringClass()->name,
                'identity' => Document::tags($document)
            ];
        }
    }
}