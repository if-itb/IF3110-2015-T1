<?php 
	function shorten_string($oldstring, $wordsreturned)
	{
	  
	  $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $oldstring);
	  $string = str_replace("\n", " ", $string);
	  $array = explode(" ", $string);
	  if (count($array)<=$wordsreturned)
	  {
		$retval = $string;
	  }
	  else
	  {
		array_splice($array, $wordsreturned);
		$retval = implode(" ", $array)." ...";
	  }
	  return $retval;
	}
?>