<?php 
session_start();
ob_start(); 

require_once('funciones.php'); //invoca
conectar('localhost','root', '', 'db_gamificame'); //declara

	$idyo = $_POST["idyo"];
	$idtu = $_POST["idtu"];
	$mensaje = $_POST["msj"];

	$consul = "INSERT INTO tb_chat(intidyo,intidtu,nvchmsj) VALUES ('$idyo','$idtu','$mensaje')";
	mysql_query($consul); 
	if($consul)
		{
			echo "	
			<!--form class='' action='chatroom.php' method='POST'>
				<input type='text' value='".$idyo."' name='idyo'>
				<input type='text' value='".$idtu."' name='idtu'>
			</form-->
			";

			echo "<script>
				alert('Mensaje enviado..!! :)');
			</script>";
			echo "<script>window.location='docentes.php'</script>";

		}else 
			echo "Hubo un error en el registro.";	
?>