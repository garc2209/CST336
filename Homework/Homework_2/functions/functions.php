<?php


$Lotto = array();



for ($i = 0; $i < 5; $i++) {

	

	$randValue = 0;

	

	do {

		$randValue = rand(1, 47);

	} while(isDuplicate($randValue, $Lotto));

	

	array_push($Lotto, $randValue);

}


function isDuplicate($currentNum, $lottoArray) {

	foreach ($lottoArray as $num) {

		if ($currentNum == $num) {

			return TRUE;

		}

	}

	return FALSE;

}



?>