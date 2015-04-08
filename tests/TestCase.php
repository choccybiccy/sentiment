<?php

namespace Choccybiccy\Sentiment;

/**
 * Class TestCase
 * @package Choccybiccy\Sentiment
 */
class TestCase extends \PHPUnit_Framework_TestCase
{

    /**
     * @param array|null $methods
     * @param bool $abstract
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockSelf($methods = null, $abstract = false)
    {

        $className = preg_replace("/(Test)\$/", "", get_called_class());
        $builder = $this->getMockBuilder($className)
            ->setMethods($methods)
            ->disableOriginalConstructor();

        if ($abstract) {
            return $builder->getMockForAbstractClass();
        }

        return $builder->getMock();

    }

    /**
     * Runs a protected method using the ReflectionClass functionality
     *
     * @param      $object
     * @param      $method
     * @param null $args
     *
     * @return mixed
     */
    protected function runProtectedMethod($object, $method, $args = null)
    {
        $rflClass = new \ReflectionClass(get_class($object));
        $rflMethod = $rflClass->getMethod($method);
        $rflMethod->setAccessible(true);
        if ($args) {
            return $rflMethod->invokeArgs($object, $args);
        } else {
            return $rflMethod->invoke($object);
        }
    }

    /**
     * Gets the value of a protected or private property using ReflectionClass functionality
     *
     * @param $object
     * @param $property
     *
     * @return mixed
     */
    protected function getProtectedProperty($object, $property)
    {
        $rflClass = new \ReflectionClass(get_class($object));
        $rflParam = $rflClass->getProperty($property);
        $rflParam->setAccessible(true);
        return $rflParam->getValue($object);
    }

    /**
     * Sets the value of a protected or private property using ReflectionClass functionality
     *
     * @param $object
     * @param $property
     * @param $value
     */
    protected function setProtectedProperty($object, $property, $value)
    {
        $rflClass = new \ReflectionClass(get_class($object));
        $rflParam = $rflClass->getProperty($property);
        $rflParam->setAccessible(true);
        $rflParam->setValue($object, $value);
    }
}
