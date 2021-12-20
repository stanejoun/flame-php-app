<?php

namespace App\DataValidator;

use Stanejoun\OPFramework\DataValidator;
use Stanejoun\OPFramework\Exceptions\BusinessException;
use Stanejoun\OPFramework\Request;

class Authentication
{
	public function login(): DataValidator
	{
		$validator = new DataValidator();
		$validator->setPropertiesDefinitions([
			$validator
				->add('email')
				->setType('email')
				->setRequired(true),
			$validator
				->add('password')
				->setType('password')
				->setRequired(true)
		]);
		return $validator;
	}

	public function getRefreshToken(): string
	{
		$validator = new DataValidator();
		$validator->setPropertiesDefinitions([
			$validator
				->add('refresh_token')
				->setType('string')
				->setRequired(true)
		]);
		$validator->validate();
		return $validator->getValue('refresh_token');
	}

	public function getCreateUser(): mixed
	{
		$validator = new DataValidator();
		$validator->setPropertiesDefinitions([

			$validator
				->add('username')
				->setType('string')
				->setRequired(true),

			$validator
				->add('email')
				->setType('email')
				->setRequired(true),

			$validator
				->add('phone')
				->setType('phone')
				->setRequired(true),

			$validator
				->add('civility')
				->setType('string')
				->setRequired(true),

			$validator
				->add('first_name')
				->setType('string')
				->setRequired(true),

			$validator
				->add('last_name')
				->setType('string')
				->setRequired(true),

			$validator
				->add('age')
				->setType('string')
				->setRequired(true),

			$validator
				->add('address')
				->setType('string')
				->setRequired(true),

			$validator
				->add('additional_address')
				->setType('string')
				->setRequired(false),

			$validator
				->add('postal_code')
				->setType('number')
				->setRequired(true),

			$validator
				->add('city')
				->setType('string')
				->setRequired(true),

			$validator
				->add('country')
				->setType('string')
				->setRequired(true),

			$validator
				->add('lang')
				->setType('string')
				->setRequired(true),

			$validator
				->add('password')
				->setType('password')
				->setRequired(true)
				->setConstraints(function ($password) {
					$confirmPassword = Request::Data('confirm_password');
					if ($password !== $confirmPassword) {
						throw new BusinessException('The passwords do not match.');
					}
				})
		]);
		$validator->validate();
		return $validator->getData();
	}
}