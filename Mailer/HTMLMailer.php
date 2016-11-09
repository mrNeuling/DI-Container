<?php

namespace DIContainer\Mailer;

class HTMLMailer extends SimpleMailer
{
	public function send()
	{
		print_r('<p>' . $this->reader->getContent() . '</p>');
	}
}
