<?php 
	
session_start();
ob_start(); 

require_once('funciones.php'); //invoca
conectar('localhost','root', '', 'db_gamificame'); //declara

$codpreg = $_POST['$id'];
$coduser = $_POST['txtalumno'];
$rspt = $_POST['txtrspt'];

	$consul = "INSERT INTO `tb_pers_resp` (`inpers`, `ispreg`, `nvchrspt`) VALUES ('$coduser', '$codpreg', '$rspt');";
	mysql_query($consul); 
	if($consul)
		{
			echo "<script>
					alert('Felicitaciones, acabas de responder esta pregunta!! :)');
				</script>";
			echo "<script>window.location='retosgamificame.php'</script>";

		}else 
			echo "<script>
					alert('upss!!! Algo sucedio mal, intentalo de nuevo :)');
				</script>";	
			echo "<script>window.location='retosgamificame.php'</script>";


?>
