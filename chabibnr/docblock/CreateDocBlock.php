<?php
namespace chabibnr\docblock;
require_once 'vendor/autoload.php';

class CreateDocBlock
{

    /** @var null|ReflectionClass  */
    private $reflector = null;
    /** @var null|\phpDocumentor\Reflection\DocBlockFactory  */
    private $factory = null;

    protected $createObject = [];

    public function __construct($className)
    {
        $this->reflector = new \ReflectionClass($className);
        $this->factory = \phpDocumentor\Reflection\DocBlockFactory::createInstance();
    }

    public function getClass(){
        return new GetClass($this->reflector, $this->factory);
    }

    public function getMethod(){
        return new GetMethod($this->reflector, $this->factory);
    }

    public function getConstant(){
        return new GetConstant($this->reflector, $this->factory);
    }

    public function getProperty(){
        return new GetProperty($this->reflector, $this->factory);
    }
}