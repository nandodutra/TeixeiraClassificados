<?php

require 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

define('ROOT', realpath(__DIR__).'/');

$config = Yaml::parse(file_get_contents(ROOT . 'config/app.yml'));


//Configurando PHPActiveRecord
$dbconfig = $config['database'];

ActiveRecord\Config::initialize(function($cfg) use ($dbconfig)
{
    $cfg->set_model_directory(ROOT . 'models');
    $cfg->set_connections(array(
        'development' => 'mysql://'.$dbconfig['username'].':'.$dbconfig['password'].'@'.$dbconfig['host'].'/'.$dbconfig['dbname']));
});

//Configurando o Slim PHP
$app = new \Slim\Slim([ 'view' => new \View\View() ]);

$app->config(array(
    'debug' => true,
    'templates.path' => ROOT . 'templates'
));


