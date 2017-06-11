<?php

	//Connecta a la Base de dades
	function connecta($dbhost, $dbuser, $dbpass, $dbname){
		try{
			$mysqli = new mysqli ($dbhost, $dbuser, $dbpass, $dbname);
			return $mysqli;

		}catch(mysqli_sql_exception $error){
			throw $error;
		}
	}
?>