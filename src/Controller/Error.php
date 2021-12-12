<?php

namespace App\Controller;

use Stanejoun\OPFramework\Config;
use Stanejoun\OPFramework\Controller;
use Stanejoun\OPFramework\ResponseErrorDTO;
use Stanejoun\OPFramework\Route;
use Stanejoun\OPFramework\Session;

class Error extends Controller
{
	#[Route('page_not_found', '/error/page-not-found')]
	public function pageNotFound()
	{
		$this->render('errors/page-not-found');
	}

	#[Route('forbidden', '/error/forbidden')]
	public function forbidden()
	{
		$this->render('errors/forbidden');
	}

	#[Route('default_error', '/error')]
	public function defaultError()
	{
		$responseErrorDTO = null;
		if (Config::$ENVIRONMENT !== Config::PROD_ENVIRONMENT) {
			/** @var ResponseErrorDTO|null $errorData */
			$responseErrorDTO = Session::GetFlashErrors();
		}
		$this->render('errors/default-error', $responseErrorDTO);
	}
}