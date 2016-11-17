<?php

namespace DIContainer\Container;

/**
 * Dependency injection container
 */
class Container implements IContainer
{
	/**
	 * Configuration list of services
	 * @var array
	 */
	public $services;

	/**
	 * Services list
	 * @var array
	 */
	public $serviceStore;

	/**
	 * @param array $services List of service configuration
	 */
	public function __construct(array $services)
	{
		$this->services = $services;
		$this->serviceStore = [];
	}

	/**
	 * @inheritdoc
	 */
	public function has($serviceName)
	{
		return isset($this->services[$serviceName]);
	}

	/**
	 * @inheritdoc
	 */
	public function get($serviceName)
	{
		if (!$this->has($serviceName)) {
			throw new \Exception ('Service ' . $serviceName . ' not found');
		}
		if (!isset($this->serviceStore[$serviceName])) {
			$this->serviceStore[$serviceName] = $this->createService($serviceName);
		}
		return $this->serviceStore[$serviceName];
	}

	/**
	 * Make a service by name
	 * Get configuration from {services} property
	 * @param string $serviceName
	 * @return object
	 */
	protected function createService($serviceName)
	{
		$config = &$this->services[$serviceName];
		if (!isset($config['args']) || !is_array($config['args'])) {
			$config['args'] = [];
		}
		$this->resolveArguments($config['args']);
		return new $config['class'](...$config['args']);
	}

	/**
	 * Resolve service constructor arguments
	 * Replaced arguments matched by template '%SERVICE_NAME%' to service
	 * @param array $arguments Dependencies list of a service
	 */
	protected function resolveArguments(array &$arguments)
	{
		foreach($arguments as &$arg){
			if (is_string($arg) && preg_match('/^%(.*)%$/', $arg, $matches)) {
				$arg = $this->get($matches[1]);
			}
		}
	}
}