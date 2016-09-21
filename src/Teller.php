<?php

namespace Bank;

class Teller
{
	private $cash_slot;

	public function __construct(CashSlot $cash_slot)
	{
		$this->cash_slot = $cash_slot;
	}

	public function withdrawFrom(Account $account, $amount)
	{
		$this->cash_slot->dispense($amount);
	}
}
