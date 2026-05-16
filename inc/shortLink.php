<?php
	// function to shorten the link name inside the table
	function shortenLinkName($linkName, $maxLength=15){
		if (strlen($linkName) > $maxLength) {
			return substr($linkName, 0, $maxLength - 3) . "...";
		}else{
			return $linkName;
		}
	}
?>