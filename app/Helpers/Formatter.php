<?php
namespace App\Helpers;

class Formatter 
{

	public function __construct()
	{

	}

	public static function formatAmount(string|float $amount): string
	{
			if($amount > 0) 
			{
				$amount = '<span style="color: blue">' . '+$' . $amount . '</span>';
			} elseif($amount < 0) {
				$amount = '<span style="color: red">' . '-$' . abs($amount) . '</span>';
			} else {
				$amount = '<span style="color: gray">' . '$' . $amount . '</span>';
			}
			return $amount;
	}

	public static function formatDate(string $date): string
	{
			return date('M j, Y', strtotime( $date));
	}
}