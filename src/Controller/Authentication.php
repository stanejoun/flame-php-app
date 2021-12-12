<?php

namespace App\Controller;

use App\Model\User;
use Stanejoun\OPFramework\Config;
use Stanejoun\OPFramework\Controller;
use Stanejoun\OPFramework\exceptions\BusinessException;
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
				$data = $loginForm->getData();
				/** @var User $user */
				$user = \Stanejoun\OPFramework\Authentication::Authenticate($data['email'], $data['password']);
				\Stanejoun\OPFramework\Authentication::Register($user);
				$redirect = Request::Get('redirect');
				if ($redirect) {
					Router::Redirect($redirect);
				} else {
					Router::Redirect(Router::GetUrl('homeAction'));
				}
			} catch (\Exception $e) {
				$this->render('login', (object)[
					'error_message' => _('Email and/or password isn\'t right.'),
					'input_errors' => (object)[
						'email' => _("Maybe it's the wrong email."),
						'password' => _("Maybe it's the wrong password."),
					]
				]);
			}
		}
		$this->render('login');
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
			$data = $this->dataValidator->login()->validate()->getData();
			/** @var User $user */
			$user = \Stanejoun\OPFramework\Authentication::Authenticate($data['email'], $data['password']);
		} catch (\Exception $e) {
			throw new BusinessException(_('Invalid email and/or password!'));
		}
		return new JsonResponse(\Stanejoun\OPFramework\Authentication::GetJSONWebToken($user));
	}

	#[Route('refresh_token', '/api/authentication/refresh-token', 'POST')]
	public function refreshToken(): JsonResponse
	{
		/** @var RefreshToken $refreshToken */
		$refreshToken = RefreshToken::FindOneBy('token', $this->dataValidator->getRefreshToken());
		if (null !== $refreshToken) {
			$currentTimestamp = time();
			$currentFingerprint = Security::GetFingerprint();
			if ($currentTimestamp <= $refreshToken->getExpiredAt() && $currentFingerprint === $refreshToken->getFingerprint()) {
				$userId = $refreshToken->getUserId();
				$refreshToken->delete();
				/** @var User $user */
				$user = User::FindOneById($userId);
				if ($user !== null) {
					return new JsonResponse(\Stanejoun\OPFramework\Authentication::GetJSONWebToken($user));
				}
			}
		}
		throw new BusinessException('Invalid refresh token!');
	}

	#[Route('delete_refresh_token', '/api/authentication/refresh-token/{userUid}', 'DELETE', 'ADMIN')]
	public function deleteRefreshToken(string $userUid)
	{
		/** @var User $user */
		$user = User::FindOneBy('uid', $userUid);
		if ($user === null) {
			throw new BusinessException('Invalid user!');
		}
		\Stanejoun\OPFramework\Authentication::DeleteRefreshToken($user);
		return new jsonResponse(['message' => 'success']);
	}

	#[Route('revoke_access_token', '/api/authentication/access-token/{userUid}', 'DELETE', 'ADMIN')]
	public function revokeAccessToken(string $userUid): JsonResponse
	{
		/** @var User $user */
		$user = User::FindOneBy('uid', $userUid);
		if ($user === null) {
			throw new BusinessException('Invalid user!');
		}
		\Stanejoun\OPFramework\Authentication::RevokeAccessToken($user);
		return new jsonResponse(['message' => 'success']);
	}
}