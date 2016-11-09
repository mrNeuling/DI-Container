<?php

namespace DIContainer\Container;

interface IContainer
{
	/**
	 * Getter for services
	 * @param string $name Service name
	 * @return mixed
	 */
	public function get($name);

	/**
	 * Check exist service in container
	 * @param string $name Service name
	 * @return boolean
	 */
	public function has($name);
}
