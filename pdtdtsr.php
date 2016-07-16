<?php 

//End obteniendo fecha
require_once('funciones.php'); //invoca
conectar('localhost','root', '', 'db_gamificame'); //declara

$idpers = $_POST['txtalumno'];
$alias = $_POST['nvchalias'];
$seudonimo = $_POST['nvchintereses'];
//echo $name.' '.$seudonimo;
    $consul = "UPDATE persona SET persona.nvchalias = '$alias', persona.nvchintereses = '$seudonimo' WHERE persona.nvchidpersona = $idpers";
	mysql_query($consul); 

	if (mysql_query($consul)) {
		//echo "registro exitoso";
		echo "<script>alert('registro exitoso');</script>";
		echo "<script>window.location='user.php'</script>";
		//echo $consul;
	} else {
		//echo "registro fallo";
		echo "<script>alert('Revisa tus datos');</script>";
		echo "<script>window.location='editperfil.php'</script>";
		//echo $consul;
	}
	
?>