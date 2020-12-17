<?php
include 'conexion.php';
session_start();
$idUser = $_SESSION['idUsuario'];
 $query = "SELECT idWeb,idUsuario , dominio,fechaCreacion" .
      "FROM webs " .
	  "WHERE idUsuario = $idUser ";
  $result = mysqli_query($query);
  echo "<table>";
  echo "<tr>";
while($row = mysqli_fetch_array($result))
  {
    echo "<tr>" ."<td>". 
	    $row["idWeb"] . "</td>";
	  echo "<td>". 
	    $row["idUsuario"] . "</td>";
	     echo "<td>". 
	    $row["dominio"] . "</td>";
	     echo "<td>". 
	    $row["fechaCreacion"] . "</td>";
  }
  echo "</tr>";
 ?>
 <!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Panel</title>
	<?php
echo "<p>Bienvenido $idUser</p>";
echo "<a href='logout.php'>Salir</a>";
$fecha=date("Y-m-d");
if (isset($_POST['ingresar'])) 
{
	if ($_POST['dominio'] == "") 
	{
		echo "<script type='text/javascript'>alert('Ingrese nombre de la web');</script>";
	}
	else
	{
		include 'conexion.php';
		$dominio =$_POST['dominio'];
		$buscardom=mysqli_query($con,"SELECT * FROM webs WHERE dominio= '$dominio'");
		if ($resultado=mysqli_fetch_array($buscardom)>0) 
		{
			echo "<script type='text/javascript'>alert('Sitio Web ya existente');</script>";
		}
		else
		{
                $dominio=$dominio.$idUser;
				$sql = "INSERT INTO webs (idUsuario,dominio,fechaCreacion) 
				VALUES ('$idUser','$dominio','$fecha')";
				$result=mysqli_query($con,$sql);
				if ($result)
				{
					$cmd=shell_exec("./wix.sh $dominio");
					
					echo "<pre>".$cmd."</pre>";

				}
				else
				{
					echo "<script type='text/javascript'>alert('ERROR AL CREAR SITIO WEB');</script>";
				}		
			
			
		}
		
	}
	
}
?>

<form action="" method="POST">
	<legend>Crear web de:</legend>
		<input type="text" name="dominio" placeholder="nombre de la web">
		<br>
		<input type="submit" value="Crear web" name="ingresar">
		<br>
</form>
</table>
</head>
<body>
</body>
</html>