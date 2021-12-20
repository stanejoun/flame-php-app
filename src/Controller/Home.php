<?php

namespace App\Controller;

use App\Renderer\PhantomJsRenderer;
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
}
