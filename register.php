<?php

$fecha=date("Y-m-d");
if (isset($_POST['registrar'])) 
{
	if ($_POST['email'] == "" && $_POST['contraseña']== "" && $_POST['r-contraseña']=="") 
	{
		echo "<script type='text/javascript'>alert('Por favor llene todos los campos');</script>";
	}
	else
	{
		include 'conexion.php';

		$email =$_POST['email'];
		$password =$_POST['contraseña'];
		$rep_password =$_POST['r-contraseña'];

		$buscaremail=mysqli_query($con,"SELECT * FROM usuarios WHERE email= '$email'");
		
		if ($resultado=mysqli_fetch_array($buscaremail)>0) 
		{
			echo "<script type='text/javascript'>alert('Email ya registrado');</script>";
		}
		else
		{
			if ($password == $rep_password) 
			{
				$sql = "INSERT INTO usuarios (email,password,fechaRegistro) 
				VALUES ('$email','$password','$fecha')";
				$result=mysqli_query($con,$sql);
				if ($result)
				{
					header ("Location: login.php");
				}
				else
				{
					echo "<script type='text/javascript'>alert('ERROR AL CREAR USUARIO');</script>";
				}		
			}
			else
			{
				echo "<script type='text/javascript'>alert('Las contraseñas no coinciden');</script>";
			}
		}
		
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
</head>
<body>
<center>
	<h1>Registrarse es Simple</h1>
	<form action="" method="POST">
		<input type="email" name="email" placeholder="Email" checked>
		<br>
		<input type="password" name="contraseña" placeholder="Contraseña" checked>
		<br>
		<input type="password" name="r-contraseña" placeholder="Repetir Contraseña" checked>
		<br>
		<input type="submit" name="registrar" value="Registrar">
	</form>
</center>
</body>
</html>