<?php
/**
 * Created by PhpStorm.
 * User: Butterfly
 * Date: 10/25/2017
 * Time: 12:05 PM
 */

namespace chabibnr\docblock;


class GetClass
{
    /** @var null|\ReflectionClass */
    private $_reflector = null;
    /** @var null|\phpDocumentor\Reflection\DocBlockFactory */
    private $_factory = null;

    public $identity;

    /**
     * GetClass constructor.
     * @param $reflector \ReflectionClass
     * @param $factory \phpDocumentor\Reflection\DocBlockFactory
     */
    public function __construct($reflector, $factory)
    {
        $this->_reflector = $reflector;
        $this->_factory = $factory;
        $this->_identity();
    }

    public function getName()
    {
        return $this->_reflector->getName();
    }

    public function getSubclasses()
    {
        $parent = $this->_reflector->getParentClass();
        return $parent ? $parent->getName() : '';
    }

    private function _identity()
    {
        $getDocument = $this->_reflector->getDocComment();
        if (empty($getDocument)) {
            throw new \Exception("Can't find doc block in class " . $this->getName());
        }
        $document = $this->_factory->create($getDocument);
        $this->identity = Document::tags($document);
    }
}