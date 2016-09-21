<?php

namespace Bank;

class Account
{
	private $balance;

	public function __construct()
	{
	}

	public function __get($property)
	{
		if (in_array($property, ['balance'])) {
			return $this->$property;
		}
	}

	public function deposit($amount)
	{
		$this->balance = $amount;
	}
}
