<?php


namespace App\Helpers ;
class StoreFiles 
{
	public function __construct()
	{
		
	}


	public static function storeMultipleFiles(string $inputName): array
	{
		$filesPath=[];
		$total = count($_FILES[$inputName]['name']);
		for($i = 0; $i < $total; $i++) 
		{
				$filesPath[$i] = STORAGE_PATH . '/' . $_FILES[$inputName]['name'][$i];
						move_uploaded_file(
								$_FILES[$inputName]['tmp_name'][$i],
								$filesPath[$i],
						);
		}
		return $filesPath;
	}

	public static function storeFile(string $inputName): string
	{
		$filePath=[];
		$total = count($_FILES[$inputName]['name']);
		for($i = 0; $i < $total; $i++) 
		{
				$filePath = STORAGE_PATH . '/' . $_FILES[$inputName]['name'][$i];
						move_uploaded_file(
								$_FILES[$inputName]['tmp_name'][$i],
								$filePath,
						);
		}
		return $filePath;
	}
}