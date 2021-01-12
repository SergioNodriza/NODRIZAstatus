<?php

namespace ContainerKCUYlKB;
include_once \dirname(__DIR__, 4).'/vendor/theofidry/alice-data-fixtures/src/LoaderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/theofidry/alice-data-fixtures/src/Persistence/PersisterAwareInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/nelmio/alice/src/IsAServiceTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/theofidry/alice-data-fixtures/src/Loader/PersisterLoader.php';

class PersisterLoader_c8a8e24 extends \Fidry\AliceDataFixtures\Loader\PersisterLoader implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Fidry\AliceDataFixtures\Loader\PersisterLoader|null wrapped object, if the proxy is initialized
     */
    private $valueHoldera1fd8 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializere3996 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties7ed0d = [
        
    ];

    public function withPersister(\Fidry\AliceDataFixtures\Persistence\PersisterInterface $persister) : \Fidry\AliceDataFixtures\Loader\PersisterLoader
    {
        $this->initializere3996 && ($this->initializere3996->__invoke($valueHoldera1fd8, $this, 'withPersister', array('persister' => $persister), $this->initializere3996) || 1) && $this->valueHoldera1fd8 = $valueHoldera1fd8;

        return $this->valueHoldera1fd8->withPersister($persister);
    }

    public function load(array $fixturesFiles, array $parameters = [], array $objects = [], ?\Fidry\AliceDataFixtures\Persistence\PurgeMode $purgeMode = null) : array
    {
        $this->initializere3996 && ($this->initializere3996->__invoke($valueHoldera1fd8, $this, 'load', array('fixturesFiles' => $fixturesFiles, 'parameters' => $parameters, 'objects' => $objects, 'purgeMode' => $purgeMode), $this->initializere3996) || 1) && $this->valueHoldera1fd8 = $valueHoldera1fd8;

        return $this->valueHoldera1fd8->load($fixturesFiles, $parameters, $objects, $purgeMode);
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Fidry\AliceDataFixtures\Loader\PersisterLoader $instance) {
            unset($instance->loader, $instance->persister, $instance->logger, $instance->processors);
        }, $instance, 'Fidry\\AliceDataFixtures\\Loader\\PersisterLoader')->__invoke($instance);

        $instance->initializere3996 = $initializer;

        return $instance;
    }

    public function __construct(\Fidry\AliceDataFixtures\LoaderInterface $decoratedLoader, \Fidry\AliceDataFixtures\Persistence\PersisterInterface $persister, ?\Psr\Log\LoggerInterface $logger = null, array $processors = [])
    {
        static $reflection;

        if (! $this->valueHoldera1fd8) {
            $reflection = $reflection ?? new \ReflectionClass('Fidry\\AliceDataFixtures\\Loader\\PersisterLoader');
            $this->valueHoldera1fd8 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Fidry\AliceDataFixtures\Loader\PersisterLoader $instance) {
            unset($instance->loader, $instance->persister, $instance->logger, $instance->processors);
        }, $this, 'Fidry\\AliceDataFixtures\\Loader\\PersisterLoader')->__invoke($this);

        }

        $this->valueHoldera1fd8->__construct($decoratedLoader, $persister, $logger, $processors);
    }

    public function & __get($name)
    {
        $this->initializere3996 && ($this->initializere3996->__invoke($valueHoldera1fd8, $this, '__get', ['name' => $name], $this->initializere3996) || 1) && $this->valueHoldera1fd8 = $valueHoldera1fd8;

        if (isset(self::$publicProperties7ed0d[$name])) {
            return $this->valueHoldera1fd8->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Fidry\\AliceDataFixtures\\Loader\\PersisterLoader');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera1fd8;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHoldera1fd8;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializere3996 && ($this->initializere3996->__invoke($valueHoldera1fd8, $this, '__set', array('name' => $name, 'value' => $value), $this->initializere3996) || 1) && $this->valueHoldera1fd8 = $valueHoldera1fd8;

        $realInstanceReflection = new \ReflectionClass('Fidry\\AliceDataFixtures\\Loader\\PersisterLoader');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera1fd8;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHoldera1fd8;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializere3996 && ($this->initializere3996->__invoke($valueHoldera1fd8, $this, '__isset', array('name' => $name), $this->initializere3996) || 1) && $this->valueHoldera1fd8 = $valueHoldera1fd8;

        $realInstanceReflection = new \ReflectionClass('Fidry\\AliceDataFixtures\\Loader\\PersisterLoader');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera1fd8;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHoldera1fd8;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializere3996 && ($this->initializere3996->__invoke($valueHoldera1fd8, $this, '__unset', array('name' => $name), $this->initializere3996) || 1) && $this->valueHoldera1fd8 = $valueHoldera1fd8;

        $realInstanceReflection = new \ReflectionClass('Fidry\\AliceDataFixtures\\Loader\\PersisterLoader');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera1fd8;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHoldera1fd8;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializere3996 && ($this->initializere3996->__invoke($valueHoldera1fd8, $this, '__clone', array(), $this->initializere3996) || 1) && $this->valueHoldera1fd8 = $valueHoldera1fd8;

        $this->valueHoldera1fd8 = clone $this->valueHoldera1fd8;
    }

    public function __sleep()
    {
        $this->initializere3996 && ($this->initializere3996->__invoke($valueHoldera1fd8, $this, '__sleep', array(), $this->initializere3996) || 1) && $this->valueHoldera1fd8 = $valueHoldera1fd8;

        return array('valueHoldera1fd8');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Fidry\AliceDataFixtures\Loader\PersisterLoader $instance) {
            unset($instance->loader, $instance->persister, $instance->logger, $instance->processors);
        }, $this, 'Fidry\\AliceDataFixtures\\Loader\\PersisterLoader')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializere3996 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializere3996;
    }

    public function initializeProxy() : bool
    {
        return $this->initializere3996 && ($this->initializere3996->__invoke($valueHoldera1fd8, $this, 'initializeProxy', array(), $this->initializere3996) || 1) && $this->valueHoldera1fd8 = $valueHoldera1fd8;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHoldera1fd8;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHoldera1fd8;
    }
}

if (!\class_exists('PersisterLoader_c8a8e24', false)) {
    \class_alias(__NAMESPACE__.'\\PersisterLoader_c8a8e24', 'PersisterLoader_c8a8e24', false);
}
