<?php
// Nama			: Ryan Yonata
// NIM			: 13513074
// Nama file 	: stringProcessing.php
// Keterangan	: kode php untuk pemrosesan string: pemotongan dan validasi

	function cutString($string)
	{
		if (strlen($string) > 160) {
			return substr(strip_tags($string), 0, 160) . '[...]';
		} else {
			return $string;
		}
	}

	function getValidString($string)
	{
		$tandabaca = array(",", ".", "/", "?", "!", "-", "+", "=", "_", "%", "$", "#", "@", "*", "&", "(", ")", "<", ">", "\\", "[", "]", "{", "}", ";", ":");
		$string = str_replace($tandabaca, "", $string);
		return $string;
	}
?>