<?php //This si hash crypt functions called from all page components

	function genBlowFish($plainText) { //This is BlowFish generator (10x)
		$hashFromat = "$2y$10$"; //This is specific BlowFish
		$salt = "123sbrznvdzvchpj8z5p5k"; //This is password salt
		$hashFromat_salt = $hashFromat.$salt; //This si for complete hash format and salt
		return crypt($plainText, $hashFromat_salt); //This is for create hash
	}

?>