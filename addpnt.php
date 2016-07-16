<?php 
session_start();
ob_start(); 

require_once('funciones.php'); //invoca
conectar('localhost','root', '', 'db_gamificame'); //declara

	$idpersona = $_POST["cdlmn"];
	$punto = $_POST["pnts"];
	$medoro = $_POST["mdllr"];
	$medplata = $_POST["mdllplt"];
	$medbronce = $_POST["mdllbrnc"];
	$troro = $_POST["trfr"];
	$trofplata = $_POST["trfplt"];
	$trofbronce = $_POST["trfbrnc"];

	$consul = "INSERT INTO `tb_pers_resp` (`inpers`, `punto`, `moro`, `mplata`, `mbronce`, `toro`, `tplata`, `tbronce`) VALUES ('$idpersona', '$punto', '$medoro', '$medplata', '$medbronce', '$troro', '$trofplata', '$trofbronce');";
	mysql_query($consul); 
	if($consul)
		{
			echo "<script>
					alert('Registro exitoso..!! :)');
				</script>";
			echo "<script>window.location='rglrpnts.php'</script>";

		}else 
			echo "<script>
					alert('Algo sucedio mal...!! :)');
				</script>";	
			echo "<script>window.location='rglrpnts.php'</script>";
?>