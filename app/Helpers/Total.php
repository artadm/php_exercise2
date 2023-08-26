<?php
namespace App\Helpers;
class Total
{
	private array $totals = ['income' => 0, 'expense' => 0, 'total' => 0];
	public function __construct(protected array $transactions)
	{
		foreach($transactions as $transaction) 
		{
			$amount = $transaction['amount'];
			if($amount >= 0) {
				$this->totals['income'] += $amount;
			} else {
				$this->totals['expense'] += $amount;
			}
		}
		$this->totals['total'] = $this->totals['income'] + 	$this->totals['expense'];
	}


	public function totals(): array
	{
		return $this->totals;
	}




}