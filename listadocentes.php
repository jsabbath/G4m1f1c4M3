<?php 
	require_once("dompdf/dompdf_config.inc.php");
	$conexion = mysql_connect("localhost","root","");
	mysql_select_db("db_gamificame",$conexion);

$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista</title>
</head>

<body>
<div>
  <h1>Lista de Docentes</h1>
</div>
<div align="center">
    <table style="text-align: center">
      <thead>
        <tr>
          <td bgcolor="#0099FF"><strong>DNI</strong></td>
          <td bgcolor="#0099FF"><strong>Nombres</strong></td>
          <td bgcolor="#0099FF"><strong>Apellidos</strong></td>
          <td bgcolor="#0099FF"><strong>Correo</strong></td>
        </tr>
      </thead>
    <tbody>';
        $consulta=mysql_query("SELECT * FROM persona where chrtipopersona = '3'");
        while($dato=mysql_fetch_array($consulta)){
        $codigoHTML.='
              <tr>
                <td>'.$dato['nvchdni'].'</td>
                <td>'.$dato['nvchnombre'].'</td>
                <td>'.$dato['nvchapellido'].'</td>
                <td>'.$dato['nvchcorreo'].'</td>
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

$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("registroPadre.pdf");
?>