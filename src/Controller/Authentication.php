<?php

namespace App\Controller;

use App\Model\User;
use Stanejoun\OPFramework\Config;
use Stanejoun\OPFramework\Controller;
use Stanejoun\OPFramework\Exceptions\BusinessException;
use Stanejoun\OPFramework\Exceptions\MaxLoginAttemptsException;
use Stanejoun\OPFramework\Helper;
use Stanejoun\OPFramework\JsonResponse;
use Stanejoun\OPFramework\RefreshToken;
use Stanejoun\OPFramework\Request;
use Stanejoun\OPFramework\Route;
use Stanejoun\OPFramework\Router;
use Stanejoun\OPFramework\Security;

class Authentication extends Controller
{
	private \App\DataValidator\Authentication $dataValidator;

	public function __construct()
	{
		$this->dataValidator = new \App\DataValidator\Authentication();
	}

	#[Route('login', '/auth/login')]
	public function login(): void
	{
		$loginForm = $this->dataValidator->login();
		if ($loginForm->hasSubmittedData()) {
			try {
				if (!$loginForm->isValid()) {
					throw new BusinessException(_('Bad credentials!'));
				}
				/** @var User $user */
				$user = \Stanejoun\OPFramework\Authentication::Authenticate($loginForm->getValue('email'), $loginForm->getValue('password'));
				\Stanejoun\OPFramework\Authentication::Register($user);
				$redirect = Request::Get('redirect');
				if ($redirect) {
					Router::Redirect($redirect);
				} else {
					Router::Redirect(Router::GetUrl('homeAction'));
				}
			} catch (MaxLoginAttemptsException $e) {
				$this->render('login', (object)[
					'available_db' => true,
					'error_message' => 'Sorry, your account is locked. There have been more than 10 unsuccessful login attempts. Please contact support to unblock your account.',
				]);
			} catch (\Exception $e) {
				$this->render('login', (object)[
					'available_db' => true,
					'users' => User::Find(),
					'error_message' => 'Sorry, your email and/or password isn\'t right. Please try again. Note that after 10 failed attempts, your account will be locked.',
					'input_errors' => (object)[
						'email' => "Maybe it's the wrong email.",
						'password' => "Maybe it's the wrong password.",
					]
				]);
			}
		} else {
			$availableDb = true;
			$users = [];
			try {
				$users = User::Find();
			} catch (\Exception $e) {
				$availableDb = false;
			}
			$this->render('login', (object)[
				'available_db' => $availableDb,
				'users' => $users
			]);
		}
	}

	#[Route('create_user', '/auth/create-user')]
	public function createUser(): void
	{
		try {
			/** @var User $user */
			$user = Helper::Instantiate(User::class, $this->dataValidator->getCreateUser());
			$user->setPassword(Security::HashPassword($user->getPassword()));
			$user->setRoles(['ADMIN']);
			$user->setTrusted(true);
			$user->save();
			\Stanejoun\OPFramework\Authentication::Register($user);
			Router::Redirect(Router::GetUrl('homeAction'));
		} catch (\Exception $e) {
			Router::Redirect(Router::GetUrl(Config::Get('default_routes')->login, [], '?error=1'));
		}
	}

	#[Route('logout', '/auth/logout')]
	public function logout(): void
	{
		\Stanejoun\OPFramework\Authentication::Logout();
		Router::Redirect(Router::GetUrl(Config::Get('default_routes')->login));
	}

	#[Route('access_token', '/api/authentication/access-token', 'POST')]
	public function accessToken(): JsonResponse
	{
		try {
			$loginForm = $this->dataValidator->login();
			$loginForm->validate();
			/** @var User $user */
			$user = \Stanejoun\OPFramework\Authentication::Authenticate($loginForm->getValue('email'), $loginForm->getValue('password'));
		} catch (MaxLoginAttemptsException $e) {
			throw new MaxLoginAttemptsException(_('Max login attempts!'));
		} catch (\Exception $e) {
			throw new BusinessException(_('Invalid email and/or password!'));
		}
		return new JsonResponse(\Stanejoun\OPFramework\Authentication::GetJSONWebToken($user));
	}
}