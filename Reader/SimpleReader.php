<?php

namespace Reader;
/**
 * Created by JetBrains PhpStorm.
 * User: Серёга
 * Date: 06.11.16
 * Time: 1:43
 * To change this template use File | Settings | File Templates.
 */
class SimpleReader implements IReader
{
	public function getContent()
	{
		return 'Simple reader';
	}
}
