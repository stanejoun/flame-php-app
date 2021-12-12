<?php

namespace config;

use Stanejoun\OPFramework;

define('DOCUMENT_ROOT', filter_input(INPUT_SERVER, 'DOCUMENT_ROOT'));
define('ROOT', DOCUMENT_ROOT . '../');
define('TEMPLATES', ROOT . 'templates/');
define('CACHES', ROOT . 'var/caches/');
define('FILES', ROOT . 'var/files/');
define('JOBS', ROOT . 'var/jobs/');
define('LOGS', ROOT . 'var/logs/');

define('BASE_URL', OPFramework\Config::Get('protocol') . '://' . OPFramework\Config::Get('host'));

// DEV|PROD|TEST
OPFramework\Config::$ENVIRONMENT = OPFramework\Config::DEV_ENVIRONMENT;