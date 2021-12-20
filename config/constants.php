<?php

namespace config;

use Stanejoun\OPFramework;

define('DOCUMENT_ROOT', filter_input(INPUT_SERVER, 'DOCUMENT_ROOT'));
define('ROOT', DOCUMENT_ROOT . '../');
define('APPS', ROOT . 'apps/');
define('TEMPLATES', ROOT . 'templates/');
define('VAR', ROOT . 'var/');
define('CACHES', ROOT . 'var/caches/');
define('FILES', ROOT . 'var/files/');
define('LOGS', ROOT . 'var/logs/');
define('BASE_URL', OPFramework\Config::Get('protocol') . '://' . OPFramework\Config::Get('host'));

// DEV|PROD|TEST
OPFramework\Config::$ENVIRONMENT = OPFramework\Config::DEV_ENVIRONMENT;
//OPFramework\Config::$ENVIRONMENT = OPFramework\Config::PROD_ENVIRONMENT;

// User property
//OPFramework\User::$USER_IDENTIFIER_PROPERTY = 'username';
OPFramework\User::$USER_IDENTIFIER_PROPERTY = 'email';