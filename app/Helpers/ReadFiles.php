<?php


namespace App\Helpers;

use App\Exceptions\FileNotFound;
use App\Traits\ExtractorTrait;
class ReadFiles 
{
	use ExtractorTrait;
	public static function readFile(string $filePath, ?string $handler = null) 
	{
		$data = [];
		if(file_exists($filePath)) 
			{
				$file = fopen($filePath, 'r');
			
				fgetcsv($file);
				while(($line = fgetcsv($file)) !== false ) 
				{
					if($handler != null) {
						$data[] = ExtractorTrait::$handler($line);
					} else {
						$data[] = $line;
					}
					}
				return $data;
				fclose($file);
			} 
			else 
			{
				throw new FileNotFound();
			}
	}
}