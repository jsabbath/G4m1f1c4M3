<?php 
	require_once("dompdf/dompdf_config.inc.php");
	$conexion = mysql_connect("localhost","root","");
	mysql_select_db("db_gamificame",$conexion);


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
    echo "no se dfinio correctamente";
    break;
}


$fechadoc = $diadelmes.' '.$mesdelanio1.' a las '.$time; 


$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte alumnos</title>
</head>
<body>
<div style="text-align:right; font-size:11px">
'.
$fechadoc.'
</div>
<div>
  <h1>Lista de Alumnos</h1>
</div>
<div align="center">
    <table style="text-align: center; width:100%">
      <thead>
        <tr>
          <td bgcolor="#0099FF"><strong>DNI</strong></td>
          <td bgcolor="#0099FF"><strong>Nombres y Apellidos</strong></td>
          <td bgcolor="#0099FF"><strong>Correo</strong></td>
          <td bgcolor="#0099FF"><strong>Modificado</strong></td>
        </tr>
      </thead>
    <tbody>';
        $consulta=mysql_query("SELECT * FROM persona where chrtipopersona = '1'");
        while($dato=mysql_fetch_array($consulta)){
        $codigoHTML.='
              <tr style="text-transform:uppercase">
                <td>'.$dato['nvchdni'].'</td>
                <td>'.$dato['nvchnombre'].' '.$dato['nvchapellido'].'</td>
                <td>'.$dato['nvchcorreo'].'</td>
                <td>'.$dato['dtregistro'].'</td>
              </tr>';
              } 
        $codigoHTML.='
  </tbody>
  </table>
</div>
</body>
</html>
 <style>
  *{
    font-family: "century gothic";
  }
  h1{
    text-align: center;
    font-size:15px;
  }
  table{
    margin: 5px;
    padding: 5px;
    font-size:12px;
  }

  thead tr td{
    background-color: #00BCD4;
    text-align: center;
    padding: 5px;
    color: white;
  }
  tbody tr td{
    padding: 5px;
  }
 </style>';


//random para nombre
$nmrndm = 'registroAlumnos';
$namedoc = $nmrndm.'_00001213'.'.pdf';

$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream($namedoc);
?>