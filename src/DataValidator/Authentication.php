<?php

namespace App\DataValidator;

use Stanejoun\OPFramework\DataValidator;

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
		$data = $validator->getData();
		return $data['refresh_token'];
	}
}
