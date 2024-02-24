<?php

// Configurações do banco de dados
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '2yk7');
define('DB_NAME', 'winne');

// Configurações da API
define('API_IS_ACTIVE', true);
define('API_EXGIR_KEY', false);
define('API_VERSION', '1.0.0');
define('API_KEY', '4bnsx6efOzz4u5FBQEfR');

// Configurações da rota
define('PREFIX_URI', path(__DIR__));
define('ALLOWED_METHODS', ['GET', 'POST', 'PUT', 'DELETE', 'UPDATE']);

// Informações do projeto
define('AUTHOR', 'Miqueias Rodrigues');
define('PROJECT_NAME', 'Winne');


// Funções auxiliares
function path($uri)
{
    $pathArray = array_slice(explode('\\', $uri), -5);
    return '/' . $pathArray[0] . '/' . $pathArray[1] . '/' . $pathArray[2] ;
}