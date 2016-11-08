<?php

namespace DIContainer\Container;
/**
 * Created by JetBrains PhpStorm.
 * User: Серёга
 * Date: 06.11.16
 * Time: 1:28
 * To change this template use File | Settings | File Templates.
 */
interface IContainer
{
	public function get($name);
	public function has($name);
}
