<?php

namespace App\Model;

use Stanejoun\OPFramework\ModelDescription;

#[ModelDescription([
	'table' => 'user',
	'soft_delete' => true
])]
class User extends \Stanejoun\OPFramework\User
{
	protected string $username = '';
	protected string $civility = '';
	protected string $first_name = '';
	protected string $last_name = '';
	protected string $address = '';
	protected string $additional_address = '';
	protected string $postal_code = '';
	protected string $city = '';
	protected string $country = '';
	protected string $phone = '';
	protected string $lang = '';

	public function getCivility(): string
	{
		return $this->civility;
	}

	public function setCivility(string $civility): User
	{
		$this->civility = $civility;
		return $this;
	}

	public function getAddress(): string
	{
		return $this->address;
	}

	public function setAddress(string $address): User
	{
		$this->address = $address;
		return $this;
	}

	public function getCountry(): string
	{
		return $this->country;
	}

	public function setCountry(string $country): User
	{
		$this->country = $country;
		return $this;
	}

	public function getUsername(): string
	{
		return $this->username;
	}

	public function setUsername(string $username): User
	{
		$this->username = $username;
		return $this;
	}

	public function getFirstName(): string
	{
		return $this->first_name;
	}

	public function setFirstName(string $first_name): User
	{
		$this->first_name = $first_name;
		return $this;
	}

	public function getLastName(): string
	{
		return $this->last_name;
	}

	public function setLastName(string $last_name): User
	{
		$this->last_name = $last_name;
		return $this;
	}

	public function getPhone(): string
	{
		return $this->phone;
	}

	public function setPhone(string $phone): User
	{
		$this->phone = $phone;
		return $this;
	}

	public function getLang(): string
	{
		return $this->lang;
	}

	public function setLang(string $lang): User
	{
		$this->lang = $lang;
		return $this;
	}

	public function getAdditionalAddress(): string
	{
		return $this->additional_address;
	}

	public function setAdditionalAddress(string $additional_address): User
	{
		$this->additional_address = $additional_address;
		return $this;
	}

	public function getCity(): string
	{
		return $this->city;
	}

	public function setCity(string $city): User
	{
		$this->city = $city;
		return $this;
	}

	public function getPostalCode(): string
	{
		return $this->postal_code;
	}

	public function setPostalCode(string $postal_code): User
	{
		$this->postal_code = $postal_code;
		return $this;
	}

	public function beforeInsert(): void
	{
		$this->uid = md5('user-uid-' . uniqid() . '-' . uniqid());
		$this->salt = md5('user-salt-' . uniqid() . '-' . uniqid());
	}

	public function getPublicData(): array
	{
		return [
			'uid' => $this->uid,
			'email' => $this->email,
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,
			'roles' => $this->roles
		];
	}
}