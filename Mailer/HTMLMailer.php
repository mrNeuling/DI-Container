<?php

namespace DIContainer\Mailer;
/**
 * Created by JetBrains PhpStorm.
 * User: Серёга
 * Date: 06.11.16
 * Time: 1:47
 * To change this template use File | Settings | File Templates.
 */
class HTMLMailer extends SimpleMailer
{
	public function send()
	{
		print_r('<p>' . $this->reader->getContent() . '</p>');
	}
}
