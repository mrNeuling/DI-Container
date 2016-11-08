<?php
require('./autoload.php');

$container = new \Container\Container([
	'mailer' => [
		'class' => '\Mailer\SimpleMailer',
		'args' => ['%reader%']
	],
	'html_mailer' => [
		'class' => '\Mailer\HTMLMailer',
		'args' => ['%reader%']
	],
	'reader' => [
		'class' => '\Reader\XMLReader'
	]
]);

/* @var $reader \Reader\IReader */
$reader = $container->get('reader');
print_r($reader->getContent());
echo PHP_EOL;
/* @var $mailer \Mailer\SimpleMailer */
$mailer = $container->get('mailer');
$mailer->send();
echo PHP_EOL;
/* @var $html_mailer \Mailer\SimpleMailer */
$html_mailer = $container->get('html_mailer');
$html_mailer->send();
echo PHP_EOL;
print_r($reader === $mailer->getReader());
echo PHP_EOL;
print_r($reader === $mailer->getReader());
echo PHP_EOL;
print_r($reader === $html_mailer->getReader());