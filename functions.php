<?php
	function redirect($location = NULL) {
		if($location != NULL){
			header("Location: {$location}");
			exit;
		}
	}