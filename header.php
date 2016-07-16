 <?php  
    session_start();
    //ob_start(); 
    $usrname = $_SESSION['nvchusername'];
    
    function comment_show($usuario_id){
        $usuarioid = $usuario_id;
        $estado = $_POST['txtestado'];
        $fecha = '12/12/2012';
        $hora = '12:12';

        $meter = @mysql_query('
            INSERT INTO tb_estado (intidpersona, nvchestado, dtfecha, nvchhora) values ("'.$usuarioid.'","'.$estado.'","'.$fecha.'","'.$hora.'")
            ');
        if($meter)
            {
                echo '<div>Registro existoso</div>';
                echo '<script>window.location="user.php"</script>';
                //echo "Usuario registrado con exito";
                //echo "<script type='text/javascript'>alert('$message');</script>";
            }else 
                
                //echo "Hubo un error en el registro."; 
                //echo "<script type='text/javascript'>alert('$message2');</script>";
                echo '<div>Ocurrio un error</div>';
    }


require_once('include/funciones.php');
conectar('localhost', 'root', '', 'db_gamificame');

$consulta_mysql='SELECT * FROM persona INNER JOIN tb_user ON persona.nvchidpersona = tb_user.intidpersona WHERE tb_user.nvchusername = "'.$usrname.'"';
$resultado_consulta_mysql=mysql_query($consulta_mysql);

while($registro = mysql_fetch_array($resultado_consulta_mysql)){
     $usuario_alias = $registro["nvchalias"];
     $usuario_name = $registro["nvchnombre"];
     $usuario_lastname = $registro["nvchapellido"];
     $usuario_tipo = $registro["chrtipopersona"];
     $usuario_description = $registro["nvchintereses"];
     $usuario_imgperfil = $registro["vchimg"];
     $usuario_banner = $registro["vchimgbanner"];
     $usuario_id = $registro['intidpersona'];
     //echo $usuario_name." ".$usuario_lastname;
}
?>

<!doctype html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>PCGamificame | <?php echo $usuario_name." ".$usuario_lastname; ?></title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--link href="assets/css/estilosgmctn.css" rel="stylesheet" /-->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/junior.css">
    
    <!--Meta datatable-->
    <link id="bootstrap-style" href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="assets/css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="assets/css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!--END Meta datatable-->
</head>
<body> 
<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-5.jpg">
    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Gamficame Panel
                </a>
            </div>     
    
            <ul class="nav">   

                <?php
                    if ($usuario_tipo = '1') { 
                        # si es alumno
                        echo "
                        <li class='active'>
                            <a href='user.php'>
                                <i class='pe-7s-user'></i> 
                                <p>Mi perfil</p>
                            </a>
                        </li> 
                        <li class=''>
                            <a href='publicaciones.php'>
                                <i class='pe-7s-coffee'></i> 
                                <p>Zona Brake</p>
                            </a>
                        </li>
                        <li>
                            <a href='cursos.php'>
                                <i class='pe-7s-note2'></i> 
                                <p>Tareas</p>
                            </a>        
                        </li>
                        <li>
                            <a href='docentes.php'>
                                <i class='pe-7s-chat'></i> 
                                <p>Docentes</p>
                            </a>        
                        </li>
                        <li>
                            <a href='alumnos.php'>
                                <i class='pe-7s-chat'></i> 
                                <p>Alumnos</p>
                            </a>        
                        </li>
                        <li>
                            <a href='ranking.php'>
                                <i class='pe-7s-display1'></i> 
                                <p>Ranking Gamificame</p>
                            </a>        
                        </li>
                        <li>
                            <a href='meme.php'>
                                <i class='pe-7s-smile'></i> 
                                <p>Meme-ate</p>
                            </a>
                        </li>
                        <li>
                            <a href='retosgamificame.php'>
                                <i class='pe-7s-science'></i> 
                                <p>Retos gamificame</p>
                            </a>        
                        </li>
                        ";
                    } else 
                    if ($usuario_tipo = '2') {
                        # Padre
                        echo "
                            <li>
                                <a href='docentes.php'>
                                    <i class='pe-7s-chat'></i> 
                                    <p>Docentes</p>
                                </a>        
                            </li>
                            <li>
                                <a href='padres.php'>
                                    <i class='pe-7s-chat'></i> 
                                    <p>Padres</p>
                                </a>        
                            </li>
                            <li>
                                <a href='alumnos.php'>
                                    <i class='pe-7s-chat'></i> 
                                    <p>Alumnos</p>
                                </a>        
                            </li>
                            <li>
                                <a href='ranking.php'>
                                    <i class='pe-7s-display1'></i> 
                                    <p>Ranking Gamificame</p>
                                </a>        
                            </li>
                        ";
                    } else 
                    if($usuario_tipo = '3'){
                        # Docente
                        echo "
                            <li>
                                <a href='pregunta.php'>
                                    <i class='pe-7s-chat'></i> 
                                    <p>Pregunta</p>
                                </a>        
                            </li>
                            <li>
                                <a href='tarea.php'>
                                    <i class='pe-7s-chat'></i> 
                                    <p>Tarea</p>
                                </a>        
                            </li>
                            <li>
                                <a href='respuesta.php'>
                                    <i class='pe-7s-chat'></i> 
                                    <p>respuesta</p>
                                </a>        
                            </li>
                            <li>
                                <a href='rglrpnts.php'>
                                    <i class='pe-7s-chat'></i> 
                                    <p>Reconocimientos</p>
                                </a>        
                            </li>
                            <li>
                                <a href='pnlrspslmns.php'>
                                    <i class='pe-7s-chat'></i> 
                                    <p>Reconocimientos</p>
                                </a>        
                            </li>
                        ";
                    }else{
                        echo "
                           <li>
                                <a href='persona.php'>
                                    <i class='pe-7s-chat'></i> 
                                    <p>Persona</p>
                                </a>        
                            </li>
                        ";
                    }
                    
                ?>                
                <li>
                    <a href="index.php">
                        <i class="pe-7s-bell"></i> 
                        <p class="pull-rigth">Cerrar sesion</p>
                        <p>
                        </p>                        
                    </a>        
                </li>
                <!--li>
                    <a href="maps.php">
                        <i class="pe-7s-map-marker"></i> 
                        <p>Maps</p>
                    </a>        
                </li-->
                <!--li>
                    <a href="notifications.php">
                        <i class="pe-7s-bell"></i> 
                        <p>Notifications</p>
                    </a>        
                </li-->
                <!--li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i> 
                        <p>Dashboard</p>
                    </a>            
                </li-->
            </ul> 
    	</div>
    </div>  