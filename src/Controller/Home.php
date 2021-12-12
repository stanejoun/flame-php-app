<?php

namespace App\Controller;

use App\DataValidator\FileValidator;
use App\DataValidator\SampleValidator;
use Stanejoun\OPFramework\Authentication;
use Stanejoun\OPFramework\Controller;
use Stanejoun\OPFramework\DataValidator;
use Stanejoun\OPFramework\Exceptions\BusinessException;
use Stanejoun\OPFramework\File;
use Stanejoun\OPFramework\JsonResponse;
use Stanejoun\OPFramework\Route;
use Stanejoun\OPFramework\Router;
use Stanejoun\OPFramework\Validator;
use Stanejoun\OPFramework\ValidatorHelper;

class Home extends Controller
{
	#[Route('homeAction', '/', null, 'USER')]
	public function homeAction(): void
	{
		$this->render('home', Authentication::GetAuthenticatedUser());
	}

	#[Route('getDateTimeAction', '/api/home/datetime', 'GET', 'USER')]
	public function getDateTimeAction(): JsonResponse
	{
		return new JsonResponse(['datetime' => date('Y-m-d H:i:s')]);
	}
}
