<?php 
//obtenemos el id de la pregunta 
	$ntdprgnt = $_SESSION['idpregunta'] = htmlspecialchars($_GET["intidpregunta"]);
	echo 'El codigo de la pregunta es: '.$_SESSION['idpreg']=$ntdprgnt;
 ?>