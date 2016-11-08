<?php

namespace Mailer;
/**
 * Created by JetBrains PhpStorm.
 * User: Серёга
 * Date: 06.11.16
 * Time: 1:40
 * To change this template use File | Settings | File Templates.
 */
class SimpleMailer
{
	protected $reader;
	public function __construct(\Reader\IReader $reader)
	{
		$this->reader = $reader;
	}

	public function send()
	{
		print_r($this->reader->getContent());
	}

	public function getReader()
	{
		return $this->reader;
	}
}
