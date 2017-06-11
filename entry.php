<?php
	
	$db = connecta($dbhost, $dbuser, $dbpass, $dbname);

	//creo la sessió

	if(!empty($_POST)){
		if(!empty($_POST['email']) && !empty($_POST['password'])){
			$email = $_POST['email'];
			$password = $_POST['password'];

			if($db->connect_errno){
				die('Error de connexió');
			}else{
				$sql = 'select * from users';
				$result=$db->query($sql);
				$db->close();
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="estils/css/bootstrap.min.css">
	<title>TODO LIST</title>
</head>

<body>
	<div class="container">
		<div class="jumbotron">
			<h1>TODO LIST!!!</h1>
		</div>
		<form method="POST" action="<?= $_SERVER['PHP_SELF'];?>">
			Email: <input type="text" name="email">
			Password:<input type="text" name="password">
			<input type="submit" name="Send">
		</form>

		<?php

			if(isset($result)){
				$inici = 0;

				while ($rows = $result->fetch_array()) {
					if($email == $rows['email'] && $password == $rows['password']){
						$_SESSION['email'] = $email;
						$_SESSION['id'] = $rows['id'];

						$inici = 1;

						header('Location:lista.php');
						exit();
					}
				}

				if($inici == 0){
					echo "<h3> El email ".$email." no es correcte. Torna a intentar-ho</h3>";
				}
			}
		?>
	</div>
</body>
</html>