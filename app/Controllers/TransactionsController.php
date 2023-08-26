<?php

namespace App\Controllers;

use App\Exceptions\FileNotFound;
use App\Helpers\ReadFiles;
use App\Helpers\StoreFiles;
use App\Helpers\Total;
use App\Models\TransactionsModel;
use App\View;

class TransactionsController 
{
	protected array $transactionsData = [];

	public function __construct()
	{
		$this->transactionsData = (new TransactionsModel())->getTransactions();
	}

	public function index() 
	{
		
		return View::make('transactions', ['transactions' => $this->transactionsData, 'totals' => (new Total($this->transactionsData))->totals()]);
	}


	public function upload() 
	{
		$transactions = [];
        $filesPaths = StoreFiles::storeMultipleFiles('transactions_files');
        foreach($filesPaths as $filePath) {
            $transactions = array_merge($transactions,ReadFiles::readFile($filePath, 'extractTransaction'));
        }				
		(new TransactionsModel())->create($transactions);
		header('Location: /transactions');
	}


	
}