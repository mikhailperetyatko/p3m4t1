<?php
	
require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$app = new \Symfony\Component\Console\Application('Console commands');

$app->add(new \App\CommandFirst());

$app->add(new \App\CommandSecond());

$app->add(new \App\CommandThird());

$app->run();
