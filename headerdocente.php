 <?php  
    session_start();
    ob_start(); 

    $usrname = $_SESSION['nvchusername'];

    require_once('include/funciones.php');
    conectar('localhost', 'root', '', 'db_gamificame');

    $consulta_mysql='SELECT * FROM persona INNER JOIN tb_user ON persona.nvchidpersona = tb_user.intidpersona WHERE tb_user.nvchusername = "'.$usrname.'"';
    $resultado_consulta_mysql=mysql_query($consulta_mysql);

    while($registro = mysql_fetch_array($resultado_consulta_mysql)){
         $usuario_alias = $registro["nvchalias"];
         $usuario_name = $registro["nvchnombre"];
         $usuario_lastname = $registro["nvchapellido"];
         $usuario_description = $registro["nvchintereses"];
         $usuario_imgperfil = $registro["vchimg"];
         $usuario_banner = $registro["vchimgbanner"];
         $usuario_id = $registro['intidpersona'];
         //echo $usuario_name." ".$usuario_lastname;
    }

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
    <link href="assets/css/estilosgmctn.css" rel="stylesheet" />
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
    <div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">
        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Control panel
                </a>
            </div>     
            <ul class="nav">
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
                        <p>Dar puntos</p>
                    </a>        
                </li>
                <li>
                    <a href='pnlrspslmns.php'>
                        <i class='pe-7s-chat'></i> 
                        <p>Reconocimientos</p>
                    </a>        
                </li>
            </ul> 
        </div>
    </div>  