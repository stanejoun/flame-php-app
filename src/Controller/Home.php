<?php

namespace App\Controller;

use Stanejoun\OPFramework\Authentication;
use Stanejoun\OPFramework\Controller;
use Stanejoun\OPFramework\JsonResponse;
use Stanejoun\OPFramework\Route;

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