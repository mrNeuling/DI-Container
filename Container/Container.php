<?php

namespace Container;
/**
 * Created by JetBrains PhpStorm.
 * User: Серёга
 * Date: 06.11.16
 * Time: 1:29
 * To change this template use File | Settings | File Templates.
 */
class Container implements IContainer
{
	public $services;
	public $serviceStore;

	public function __construct(array $services)
	{
		$this->services = $services;
		$this->serviceStore = [];
	}

	public function has($serviceName)
	{
		return isset($this->services[$serviceName]);
	}

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

	protected function createService($serviceName)
	{
		$config = &$this->services[$serviceName];
		$service = new \ReflectionClass($config['class']);
		if (!isset($config['args']) || !is_array($config['args'])) {
			$config['args'] = [];
		}
		$this->resolveArguments($config['args']);
		return $service->newInstanceArgs($config['args']);
	}

	protected function resolveArguments(array &$arguments)
	{
		foreach($arguments as &$arg){
			if (is_string($arg) && preg_match('/^%(.*)%$/', $arg, $matches)) {
				$arg = $this->get($matches[1]);
			}
		}

	}
}