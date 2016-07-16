<?php
session_start();
$hoy = getdate(time());

require_once('funciones.php');
conectar('localhost', 'root', '', 'db_lucho');

echo $vchusername = strip_tags($_POST['vchusername']);
echo '<br>'.$vchpassword = strip_tags(sha1($_POST['vchpassword'])); //encriptacion sha1
//datos adicionales
echo '<br>'.$dtfecharegistro = $hoy["year"]."-0".$hoy["mon"]."-0".$hoy["mday"];
echo '<br>'.$vchip = $_SERVER['REMOTE_ADDR'];
echo '<br>'.$vchdetalles = "Corroboracion de fecha: ".date("c")." La maquina posee estos navegadores: ".$_SERVER["HTTP_USER_AGENT"]; 

	$query = @mysql_query('SELECT * FROM tbusuario WHERE vchusername="'.mysql_real_escape_string($vchusername).'"');
		if ($existe = @mysql_fetch_object($query))
		{
			//echo 'El Usuario "'.$user.'""ya existe elregistro';
			//echo "<script>alert('El Usuario '.$user.''ya existe elregistro');</script>";
			echo '<div>El registro ya existe</div>';
		}else{
			$meter = @mysql_query('INSERT INTO tbusuario (vchusername, vchpassword, dtfecharegistro, vchip, vchdetalles) values ("'.mysql_real_escape_string($vchusername).'","'.mysql_real_escape_string($vchpassword).'","'.mysql_real_escape_string($dtfecharegistro).'","'.$vchip.'","'.$vchdetalles.'")');

			if($meter)
				{
					$_SESSION['vchusername'] = $vchusername;
					//echo '<div>Registro existoso</div>';
					echo '<script>window.location="panel.php"</script>';
					//echo "Usuario registrado con exito";
					//echo "<script type='text/javascript'>alert('$message');</script>";
				}else 
					
					//echo "Hubo un error en el registro.";	
					//echo "<script type='text/javascript'>alert('$message2');</script>";
					echo '<div>Ocurrio un error</div>';
			}	


?>