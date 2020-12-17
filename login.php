<?php 
session_start();
if (isset($_POST['ingresar'])) 
{
	if ($_POST['email']=="" && $_POST['password']=="") 
	{
		echo '<script language="javascript">alert("Ingrese todos los datos");</script>';
	}
	else
	{
		include 'conexion.php';

		$email =$_POST['email'];
		$password =$_POST['password'];
		$sql = "SELECT * FROM usuarios WHERE email= '$email' AND password='$password'";
		if ($result = mysqli_query($con, $sql)) 
		{
		  	while ($row = mysqli_fetch_row($result)) 
		  	{
		    	$_SESSION['idUsuario'] = $row[0];
				header ("Location: panel.php");	
  			}
  			mysqli_free_result($result);
		}
			echo '<script language="javascript">alert("Campos inconrrectos");</script>';
		
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title></title>
</head>
<body>
<center>
	<h1>Webgenerator</h1>
	<form action="" method="POST">
		<div class="alert">
		</div>
		<input type="email" name="email" placeholder="Email">
		<br>
		<input type="password" name="password" placeholder="Contraseña">
		<br>
		<input type="submit" value="Ingresar" name="ingresar">
		<br>
		<a href="register.php">Registrate</a>
	</form>
</center>
</body>
</html>