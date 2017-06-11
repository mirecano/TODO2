<?php 

	include 'lib/config.php';
	include 'lib/BD.php';

	$db = connecta($dbhost,$dbuser,$dbpass,$dbname);
	
	if($db->connect_errno){
		die('Error de connexió');
	}else{ 
		$sql = 'DELETE FROM tasks WHERE id_task = '.$_GET['id'];
		$db->query($sql);
		$db->close();
	}

	header('Location:lista.php');

 ?>