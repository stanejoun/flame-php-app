<?php

namespace App\Model;

use Stanejoun\OPFramework\ModelDescription;

#[ModelDescription([
	'table' => 'user',
	'soft_delete' => true,
	'encrypted_fields' => [
		'email',
		'username',
		'civility',
		'first_name',
		'last_name',
		'birth_date',
		'address',
		'additional_address',
		'postal_code',
		'city',
		'country',
		'phone',
		'lang'
	]
])]
class User extends \Stanejoun\OPFramework\User
{
	protected ?string $username = null;
	protected ?string $civility = null;
	protected ?string $first_name = null;
	protected ?string $last_name = null;
	protected ?string $birth_date = null;
	protected ?string $address = null;
	protected ?string $additional_address = null;
	protected ?string $postal_code = null;
	protected ?string $city = null;
	protected ?string $country = null;
	protected ?string $phone = null;
	protected ?string $lang = null;
	protected ?int $picture_id = null;

	public function getCivility(): ?string
	{
		return $this->civility;
	}

	public function setCivility(?string $civility): User
	{
		$this->civility = $civility;
		return $this;
	}

	public function getFirstName(): ?string
	{
		return $this->first_name;
	}

	public function setFirstName(?string $first_name): User
	{
		$this->first_name = $first_name;
		return $this;
	}

	public function getLastName(): ?string
	{
		return $this->last_name;
	}

	public function setLastName(?string $last_name): User
	{
		$this->last_name = $last_name;
		return $this;
	}

	public function getBirthDate(): ?string
	{
		return $this->birth_date;
	}

	public function setBirthDate(?string $birth_date): User
	{
		$this->birth_date = $birth_date;
		return $this;
	}

	public function getAddress(): ?string
	{
		return $this->address;
	}

	public function setAddress(?string $address): User
	{
		$this->address = $address;
		return $this;
	}

	public function getAdditionalAddress(): ?string
	{
		return $this->additional_address;
	}

	public function setAdditionalAddress(?string $additional_address): User
	{
		$this->additional_address = $additional_address;
		return $this;
	}

	public function getCity(): ?string
	{
		return $this->city;
	}

	public function setCity(?string $city): User
	{
		$this->city = $city;
		return $this;
	}

	public function getCountry(): ?string
	{
		return $this->country;
	}

	public function setCountry(?string $country): User
	{
		$this->country = $country;
		return $this;
	}

	public function getPostalCode(): ?string
	{
		return $this->postal_code;
	}

	public function setPostalCode(?string $postal_code): User
	{
		$this->postal_code = $postal_code;
		return $this;
	}

	public function getPhone(): ?string
	{
		return $this->phone;
	}

	public function setPhone(?string $phone): User
	{
		$this->phone = $phone;
		return $this;
	}

	public function getLang(): ?string
	{
		return $this->lang;
	}

	public function setLang(?string $lang): User
	{
		$this->lang = $lang;
		return $this;
	}

	public function getUsername(): ?string
	{
		return $this->username;
	}

	public function setUsername(?string $username): User
	{
		$this->username = $username;
		return $this;
	}

	public function getPictureId(): ?int
	{
		return $this->picture_id;
	}

	public function setPictureId(?int $picture_id): User
	{
		$this->picture_id = $picture_id;
		return $this;
	}

	public function beforeInsert(): void
	{
		$this->uid = md5('uid-' . uniqid() . '-' . time());
		$this->salt = md5('salt-' . uniqid() . '-' . time());
	}

	public function getPublicData(): array
	{
		$roles = [];
		foreach ($this->roles as $role) {
			$roles[] = str_replace('_', '-', strtolower($role));
		}
		return [
			'uid' => $this->uid,
			'roles' => $roles
		];
	}
}