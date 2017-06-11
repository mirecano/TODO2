<?php 

	session_start();
	include 'lib/config.php';
	include 'lib/BD.php';

	if(!empty($_POST)){

		$db = connecta($dbhost,$dbuser,$dbpass,$dbname);
		if($db->connect_errno){
			die('Error de connexió');
		}else{ 
			$sql = 'INSERT INTO tasks (descripcio,user,data,completed)
				VALUES ("'.$_POST['description'].'",1,now(),'.$_POST['completada'].')';

			$db->query($sql);
			$db->close();
			header('Location:lista.php');
		}
	}

 ?>

 <!DOCTYPE html>
 <html lang="ca">
 <head>
 	<meta charset="UTF-8">
 	<title>llista</title>
 	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 </head>
 <body>
 	<div class="container">
		<div class="jumbotron">
			<h1>Afegir Tasques!</h1>	
		</div>

 	<form method="POST" action="<?= $_SERVER['PHP_SELF'];?>">		
		Descripcio: <input type="text" name="description"><br><br>
		Finalitzada: <input type="radio" name="completada" value="1"> Si
  					<input type="radio" name="completada" value="0"> No
		<br><br><input type="submit" value="Afegir">
	</form>
 	
 </body>
 </html>