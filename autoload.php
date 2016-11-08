<?php
spl_autoload_register(function ($className) {
	$filePath = __DIR__ . '/' . preg_replace('/\\\\/', '/', $className) . '.php';
	if (!is_file($filePath)) {
		throw new Exception('File ' . $filePath . ' not found');
	}
	require_once($filePath);
});