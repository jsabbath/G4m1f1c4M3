<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registrar Padre/Docente/Alumno</title>
</head>
<body>
	<!--form action="<?php //echo $_SERVER["PHP_SELF"];?>" method='post' enctype="multipart/form-data"-->
	<div>
		<h1>registrando CSV</h1>
		<p>Mediante esta interfaz te permitimos registrar por medio de un archivo en excel, solo tienes que seguir las indicaciones dadas.</p>
	</div>
	<form action="archivocsv.php" method='post' enctype="multipart/form-data">
	Importar Archivo : 
		<input type='file' name='sel_file' size='20'>
		<input type='submit' name='submit' value='submit'>
	</form>
</body>
</html>