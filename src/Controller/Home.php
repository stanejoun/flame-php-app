<?php

namespace App\Controller;

use Stanejoun\OPFramework\Authentication;
use Stanejoun\OPFramework\Controller;

class Home extends Controller
{
	#[Route('homeAction', '/', null, 'USER')]
	public function homeAction(): void
	{
		$this->render('home', Authentication::GetAuthenticatedUser());
	}
}
