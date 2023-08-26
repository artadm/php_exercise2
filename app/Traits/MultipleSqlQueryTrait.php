<?php

namespace App\Traits;
trait MultipleSqlQueryTrait
{
	static function transactionsMultipleQuery(array $transactionsArray ) 
	{
		$transactionsValues = '';
		for($i = 0; $i<count($transactionsArray); $i++) 
		{
			$transaction = $transactionsArray[$i];
			if($i !== count($transactionsArray) - 1) {
				$transactionsValues.= '("' . $transaction['transitioned_at'] . '", ' . ($transaction['check_number'] ? $transaction['check_number'] : 'null') . ', "' . $transaction['transaction_desc'] . '", ' . $transaction['amount'] . '), ';
			} else {
				$transactionsValues.= '("' . $transaction['transitioned_at'] . '", ' . ($transaction['check_number'] ? $transaction['check_number'] : 'null') . ', "' . $transaction['transaction_desc'] . '", ' . $transaction['amount'] . ') ';
			}
		};
		
		return $transactionsValues;
	}
}