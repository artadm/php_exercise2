<?php

namespace App\Traits;

use Exception;

trait ExtractorTrait
{
	static function extractTransaction(array $transaction = []) 
	{
		if($transaction != null) {
		[$transitioned_at, $check_number, $transaction_desc, $amount] = $transaction;
		$amount = (float)str_replace(['$', ','], '', $amount);
		$transitioned_at = date('Y-m-d H:i:s', strtotime($transitioned_at));
		return [
			'transitioned_at' => $transitioned_at,
			'check_number' => $check_number,
			'transaction_desc' => $transaction_desc,
			'amount' => $amount,
		];
	} 
	else {
		throw new Exception('No array given');
	}
}
}