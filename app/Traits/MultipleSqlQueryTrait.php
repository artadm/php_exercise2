<?php

namespace App\Traits;

use App\DB;

trait MultipleSqlQueryTrait
{


	public static function executeMultipleTransactions(array $array, $stmt, DB $db)
	{
		// var_dump($array);
			$insertQuery = [];
			$insertData = [];
			$n = 0;
			foreach ($array as $row) 
			{
					$insertQuery[] = '(:transitioned_at' . $n . ', :check_number' . $n . ', :transaction_desc' . $n . ', :amount' . $n . ')';
					$insertData['transitioned_at' . $n] = $row['transitioned_at'];
					$insertData['check_number' . $n] = $row['check_number']?   $row['check_number']:null;
					$insertData['transaction_desc' . $n] = $row['transaction_desc'];
					$insertData['amount' . $n] = $row['amount'];
					$n++;
			}
	
			if (!empty($insertQuery)) {
					$stmt .= implode(', ', $insertQuery);
					substr($stmt, 0, -1);
					$stmt = $db->prepare($stmt);
					$stmt->execute($insertData);
			}
	}

	// static function transactionsMultipleQuery(array $transactionsArray ) 
	// {
	// 	$transactionsValues = '';
	// 	for($i = 0; $i<count($transactionsArray); $i++) 
	// 	{
	// 		$transaction = $transactionsArray[$i];
	// 		if($i !== count($transactionsArray) - 1) {
	// 			$transactionsValues.= '("' . $transaction['transitioned_at'] . '", ' . ($transaction['check_number'] ? $transaction['check_number'] : 'null') . ', "' . $transaction['transaction_desc'] . '", ' . $transaction['amount'] . '), ';
	// 		} else {
	// 			$transactionsValues.= '("' . $transaction['transitioned_at'] . '", ' . ($transaction['check_number'] ? $transaction['check_number'] : 'null') . ', "' . $transaction['transaction_desc'] . '", ' . $transaction['amount'] . ') ';
	// 		}
	// 	};
		
	// 	return $transactionsValues;
	// }
}