<?php 
class Generate
{	
	function reward($range){
		$num = explode(' - ', $range);
		$reward = rand($num[0], $num[1]);
		return $reward;
	}

	function balance($balance, $reward){
		return $balance - $reward;
	}
}
?>