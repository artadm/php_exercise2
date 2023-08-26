<?php 

namespace App\Models;

use App\Model;
use App\Traits\MultipleSqlQueryTrait;
use PDO;

class TransactionsModel extends Model
{
use MultipleSqlQueryTrait;
	

	private array $transactions;
	public function create(array $transactionsArray) 
	{
		$newTransactionsStmt = $this->db->prepare(
		'INSERT INTO transactions (transitioned_at, check_number, transaction_desc, amount)
				VALUES' . MultipleSqlQueryTrait::transactionsMultipleQuery($transactionsArray));
		$newTransactionsStmt->execute();
	}

	public function getTransactions(): array
	{
		$newTransactionsStmt = $this->db->prepare(
			'SELECT * FROM transactions');
			$newTransactionsStmt->execute();
			$this->transactions = $newTransactionsStmt->fetchAll(PDO::FETCH_ASSOC);
		return $this->transactions;
	}

	



}