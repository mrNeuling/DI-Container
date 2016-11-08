<?php
require('./vendor/autoload.php');

$container = new \DIContainer\Container\Container([
	'mailer' => [
		'class' => '\DIContainer\Mailer\SimpleMailer',
		'args' => ['%reader%']
	],
	'html_mailer' => [
		'class' => '\DIContainer\Mailer\HTMLMailer',
		'args' => ['%reader%']
	],
	'reader' => [
		'class' => '\DIContainer\Reader\XMLReader'
	]
]);

/* @var $reader \DIContainer\Reader\IReader */
$reader = $container->get('reader');
print_r($reader->getContent());
echo PHP_EOL;
/* @var $mailer \DIContainer\Mailer\SimpleMailer */
$mailer = $container->get('mailer');
$mailer->send();
echo PHP_EOL;
/* @var $html_mailer \DIContainer\Mailer\SimpleMailer */
$html_mailer = $container->get('html_mailer');
$html_mailer->send();
echo PHP_EOL;
print_r($reader === $mailer->getReader());
echo PHP_EOL;
print_r($reader === $mailer->getReader());
echo PHP_EOL;
print_r($reader === $html_mailer->getReader());