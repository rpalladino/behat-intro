<?php

namespace Bank;

class CashSlot
{
	public $contents;

	public function dispense($amount)
	{
		$this->contents = $amount;
	}
}
