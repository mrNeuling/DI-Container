<?php

namespace DIContainer\Mailer;

class SimpleMailer
{
	protected $reader;
	public function __construct(\DIContainer\Reader\IReader $reader)
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
