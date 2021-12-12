<?php

namespace public;

use Stanejoun\OPFramework;

require_once '../vendor/autoload.php';
require_once '../config/constants.php';

try {
	OPFramework\Router::Request();
} catch (\Exception $exception) {
	OPFramework\Error::Get($exception);
}