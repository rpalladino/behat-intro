<?php

use Bank\Account;
use Bank\CashSlot;
use Bank\Teller;

trait KnowsTheDomain
{
	private $my_account;
	private $cash_slot;
	private $teller;

	public function myAccount()
	{
		if (! isset($this->my_account)) {
			$this->my_account = new Account;
		}

		return $this->my_account;
	}

	public function cashSlot()
	{
		if (! isset($this->cash_slot)) {
			$this->cash_slot = new CashSlot();
		}

		return $this->cash_slot;
	}

	public function teller()
	{
		if (! isset($this->teller)) {
			$this->teller = new Teller($this->cashSlot());
		}

		return $this->teller;
	}
}
