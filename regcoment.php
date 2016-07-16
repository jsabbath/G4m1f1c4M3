<?php
session_start();
ob_start(); 

//obteniendo fecha
date_default_timezone_set('America/Lima');
$dia = date("N"); //dia en numeros
$mesdelanio = date("m"); //mes del anio en numero
$diadelmes = date("j"); //dia del mes
$anio = date("Y"); //anio en 4 digitos

$time = date("H:i:s"); //time formato Hor/minuto/segundo

$timehora = date("g");
$timeminuto = date("i");
$timeminuto2 = date("a");

switch ($dia) {
    case '1':
        $diadelmes1 = "Lunes";
        break;
    case '2':
        $diadelmes1 = "Martes";
        break;
    case '3':
        $diadelmes1 = "Miercoles";
        break;
    case '3':
        $diadelmes1 = "Jueves";
        break;
    case '5':
        $diadelmes1 = "Viernes";
        break;
    case '6':
        $diadelmes1 = "Sabado";
        break;
    case '7':
        $diadelmes1 = "Domingo";
        break;
    default: 
        $diadelmes1 = '--';
        break;
}
switch ($mesdelanio) {
	case '1':
		$mesdelanio1 = "Enero";
		break;
	case '2':
		$mesdelanio1 = "Febrero";
		break;
	case '3':
		$mesdelanio1 = "Marzo";
		break;
	case '4':
		$mesdelanio1 = "Abril";
		break;
	case '5':
		$mesdelanio1 = "Mayo";
		break;
	case '6':
		$mesdelanio1 = "Junio";
		break;
	case '7':
		$mesdelanio1 = "Julio";
		break;
	case '8':
		$mesdelanio1 = "Agosto";
		break;
	case '9':
		$mesdelanio1 = "septiembre";
		break;
	case '10':
		$mesdelanio1 = "Octubre";
		break;
	case '11':
		$mesdelanio1 = "Noviembre";
		break;
	case '12':
		$mesdelanio1 = "Diciembre";
		break;
	default:
		# code...
		break;
}
//End obteniendo fecha
require_once('funciones.php'); //invoca
conectar('localhost','root', '', 'db_gamificame'); //declara

	if ($estado = null) {
		echo "Tu celda estado esta vacia...!!";
		echo "<script>window.location='publicaciones.php'</script>";

	} else {
		$idalumno = $_POST['txtalumno'];
		$estado = $_POST['txtestado'];
		$fecha = $anio."-".$mesdelanio."-".$diadelmes;
			$hora = $time;
			$timeminuto3 = $timeminuto." ".$timeminuto2;

			$consul = "INSERT INTO tb_estado(intidpersona, nvchestado, dtfecha, nvchhora, nvchdia, nvchdatedia, nvchmes, nvchhoraind, nvchminuto) VALUES ('$idalumno','$estado','$fecha','$hora','$diadelmes1','$diadelmes','$mesdelanio1','$timehora','$timeminuto3')";
			mysql_query($consul); 
			if($consul)
				{
					echo "<script>window.location='publicaciones.php'</script>";
					//echo "Usuario registrado con exito";
					echo $idalumno.'</br>';
					echo $estado.'</br>';
					echo $fecha.'</br>';
					echo $hora;
					echo $consul;
					//echo "<script type='text/javascript'>alert('registro exitoso');</script>";
				}else 
					//echo "Hubo un error en el registro.";	
					//echo "<script type='text/javascript'>alert('$message2');</script>";
					//echo "<script type='text/javascript'>alert('ocurrio un error');</script>";
					echo "algo ocurrio mal".'</br>';
					echo $idalumno.'</br>';
					echo $estado.'</br>';
					echo $fecha.'</br>';
					echo $hora;
					echo $consul;

	}
	


	
?>
