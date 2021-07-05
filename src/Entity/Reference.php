<?php


namespace App\Entity;


class Reference
{
    public $className;

    public $refName;

    public $isArray;

    /**
     * Reference constructor.
     * @param $className
     * @param $refName
     * @param $isArray
     */
    public function __construct($className, $refName, $isArray)
    {
        $this->className = $className;
        $this->refName = $refName;
        $this->isArray = $isArray;
    }


    /**
     * @return mixed
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param mixed $className
     */
    public function setClassName($className): void
    {
        $this->className = $className;
    }

    /**
     * @return mixed
     */
    public function getRefName()
    {
        return $this->refName;
    }

    /**
     * @param mixed $refName
     */
    public function setRefName($refName): void
    {
        $this->refName = $refName;
    }

    /**
     * @return mixed
     */
    public function getIsArray()
    {
        return $this->isArray;
    }

    /**
     * @param mixed $isArray
     */
    public function setIsArray($isArray): void
    {
        $this->isArray = $isArray;
    }





}