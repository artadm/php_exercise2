<?php 

namespace App\Models;

use App\Model;
use App\Traits\MultipleSqlQueryTrait;
use PDO;

class TransactionsModel extends Model
{
use MultipleSqlQueryTrait;
	
	public function create(array $transactionsArray) 
	{
		$newTransactionsStmt = 
		'INSERT INTO transactions (transitioned_at, check_number, transaction_desc, amount) 
				VALUES';
		MultipleSqlQueryTrait::executeMultipleTransactions($transactionsArray, $newTransactionsStmt, $this->db);
	}

	public function getTransactions(): array
	{
		$newTransactionsStmt = $this->db->prepare(
			'SELECT * FROM transactions');
			$newTransactionsStmt->execute();
			return $newTransactionsStmt->fetchAll(PDO::FETCH_ASSOC);
	}

	



}