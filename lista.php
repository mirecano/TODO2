<?php 

	//Inici de sessió
	session_start();
	include 'lib/config.php';
	include 'lib/BD.php';

	
	$db = connecta($dbhost,$dbuser,$dbpass,$dbname);
		if($db->connect_errno){
			die('Error de connexió');
		} else { 
			$sql='select * from users inner join tasks on users.id = tasks.user';
			$result=$db->query($sql);
			$db->close();
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
			<h1>TODO LIST!</h1>	
		</div>
		
		<h1>
			<a href="afegirtasca.php"><span class="label label-info">Afegir tasca</span></a>
		</h1>
		<br>

 		<?php  

 		echo '<table class="table table-hover">';
 		echo '<th>Tasca</th><th>Usuari</th><th>Data</th><th>Estat</th><th>Esborrar</th>';

		while($rows=$result->fetch_array()){ 
			if($_SESSION['email']==$rows['email']){
				$_SESSION['id'] = $rows['user']; 
 				echo '<tr>';
				echo '<td>'.$rows['descripcio'].'</td>';
				echo '<td>'.$rows['email'].'</td>';
				echo '<td>'.$rows['data'].'</td>';

				if($rows['completed'] == 1){
					echo '<td>Finalitzada</td>';
				} else {
					echo '<td>Pendent</td>';
				}

				echo '<td><a href="esborrar.php?id='.$rows['id_task'].'" class= "btn btn-danger" role="button"> Esborrar
          			
        			</a></td>';

				echo '</tr>';
			}

		}

		echo '</table>';

		?>

	 	<h3>
		 	<form action="desconnectar.php">
		 		<input type="submit" value="Desconnectar">
		 	</form>
	 	</h3>

	</div> 	
</body>
</html>