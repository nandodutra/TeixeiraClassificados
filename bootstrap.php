<?php
/**
 * @author  Fernando Dutra <fernando@inova2b.com.br>
 *
 * Arquivos com as principais configurações necessárias
 * para o funcionamento do sistema.
 */

require 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml,
    View\View,
    Slim\Slim;

//define uma constante para ROOTPATH
define('ROOT', realpath(__DIR__).'/');

//Carregando configurações básicas da aplicação
$config = Yaml::parse(file_get_contents(ROOT . 'config/app.yml'));

//Configurando PHPActiveRecord
$dbconfig = $config['database'];

ActiveRecord\Config::initialize(function($cfg) use ($dbconfig)
{
    $cfg->set_model_directory(ROOT . 'models');
    $cfg->set_connections(array(
        'development' => 'mysql://'.$dbconfig['username'].':'.$dbconfig['password'].'@'.$dbconfig['host'].'/'.$dbconfig['dbname']));
});


//Configurando o Slim PHP e a Twig Extension para trabalharem juntos
$app = new Slim();

$twigView = new View();

$app->view($twigView);

$app->config(array(
    'debug' => true,
    'templates.path' => ROOT . 'templates'
));