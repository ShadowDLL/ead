<?php

require 'environment.php';
define("BASE_URL", "http://painel.ead:81/");
define("BASE_URL_EAD", "http://ead:81/");
global $config;
$config = array();

if(ENVIRONMENT == 'development')
{
    $config['dbname'] = 'ead';
    $config['host']   = '127.0.0.1';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}
else
{
    $config['dbname'] = 'u125275386_chat';
    $config['host']   = 'mysql.hostinger.com.br';
    $config['dbuser'] = 'u125275386_root';
    $config['dbpass'] = '123456';
}

