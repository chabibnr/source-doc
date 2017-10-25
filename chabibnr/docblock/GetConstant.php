<?php
/**
 * Created by PhpStorm.
 * User: Butterfly
 * Date: 10/25/2017
 * Time: 12:05 PM
 */

namespace chabibnr\docblock;


class GetConstant
{
    /** @var null|\ReflectionClass  */
    private $_reflector = null;
    /** @var null|\phpDocumentor\Reflection\DocBlockFactory  */
    private $_factory = null;

    private $_constants;
    public function __construct($reflector, $factory)
    {
        $this->_reflector = $reflector;
        $this->_factory = $factory;
        $this->_allConstants();
    }

    public function all(){
        return $this->_constants;
    }

    private function _allConstants(){
        foreach ($this->_reflector->getConstants() as $constantKey => $constantValue){
            //$docComment = $this->reflector->getMethod($constant->getName())->getDocComment();
            //$document = $this->factory->create($docComment);
            $this->_constants[$constantKey] = [
                'name' => $constantKey,
                'value' => $constantValue
                //'identity' => Document::tags($document)
            ];
        }
    }
}