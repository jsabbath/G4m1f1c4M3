<?php 
include('header.php'); 

/*
SELECT
  persona.nvchnombre,
  persona.chrtipopersona,
  persona.nvchapellido,
  SUM(tb_pers_resp.punto) AS punto,
  SUM(tb_pers_resp.moro) AS moro,
  SUM(tb_pers_resp.mplata) AS mplata,
  SUM(tb_pers_resp.mbronce) AS mbronce,
  SUM(tb_pers_resp.toro) AS toro,
  SUM(tb_pers_resp.tplata) AS tplata,
  SUM(tb_pers_resp.tbronce) AS tbronce
FROM
  `tb_pers_resp`
INNER JOIN
  persona ON persona.nvchidpersona = tb_pers_resp.inpers
WHERE
  persona.chrtipopersona = '1'
AND tb_pers_resp.inpers = '1'
GROUP BY
  tb_pers_resp.inpers
ORDER BY
  tb_pers_resp.punto DESC
*/

    $usuario_id2 = $usuario_id;
    $consulta_mysql="
    SELECT
      persona.nvchnombre,
      persona.chrtipopersona,
      persona.nvchapellido,
      SUM(tb_pers_resp.punto) AS punto,
      SUM(tb_pers_resp.moro) AS moro,
      SUM(tb_pers_resp.mplata) AS mplata,
      SUM(tb_pers_resp.mbronce) AS mbronce,
      SUM(tb_pers_resp.toro) AS toro,
      SUM(tb_pers_resp.tplata) AS tplata,
      SUM(tb_pers_resp.tbronce) AS tbronce
    FROM
      tb_pers_resp
    INNER JOIN
      persona ON persona.nvchidpersona = tb_pers_resp.inpers
    WHERE
      persona.chrtipopersona = '1'
    AND 
        tb_pers_resp.inpers = '$usuario_id2'
    GROUP BY
      tb_pers_resp.inpers
    ORDER BY
      tb_pers_resp.punto DESC
    ";
    $resultado_consulta_mysql=mysql_query($consulta_mysql);
    while($registro = mysql_fetch_array($resultado_consulta_mysql)){
        echo $medalor = $registro["moro"];
        echo $medalpl = $registro["mplata"];
        echo $medalbr = $registro["mbronce"];
        echo $trofor = $registro["toro"];
        echo $trofpl = $registro["tplata"];
        echo $trofbr = $registro["tbronce"];
    }

?>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">    
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Mi perfil</a>
                </div>
                <div class="collapse navbar-collapse">       
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <span class="notification">5</span>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li> 
                    </ul>
                    <?php include('salir.php'); ?>
                </div>
            </div>
        </nav> 
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image"> 
                                <?php 
                                    if($usuario_banner){
                                        echo "<img src='assets/img/banner/".$usuario_banner."'/>";
                                    }else
                                        echo "<img src='assets/img/banner/defaultbanner.jpg'/>";
                                ?>

                            </div>
                            <div class="content">
                                <div class="author">
                                     
                                     <?php 
                                        if($usuario_imgperfil){
                                            echo "<img class='avatar' src='assets/img/faces/".$usuario_imgperfil."'/>";
                                        }else
                                        echo "<img class='avatar' src='assets/img/faces/perfildefault.png'/>";
                                      ?>
                                   
                                      <h2 class="title">
                                        <?php 
                                            if($usuario_alias){
                                                echo "<h4 style='text-transform:uppercase;'> ".$usuario_alias." </h2>";
                                                //echo $usuario_id2 ;
                                            }else
                                                echo "sin seudonimo";
                                        ?>
                                         <label style='text-transform:uppercase;'>
                                             <?php 
                                                echo $usuario_name.' '.$usuario_lastname;
                                             ?>
                                         </label>
                                      </h2> 
                                </div>

                                <br>
                                <p class="description text-center"> 
                                    Un poco sobre mi: <br>
                                    <?php    
                                        if($usuario_description){
                                            echo $usuario_description; 
                                        }else
                                        echo "Soy nuevo aun...";
                                     ?>
                                </p>
                                <div class="editperil">
                                    <a href="editperfil.php" class="btn btn-info btn-fill pull-center">Editar perfil</a>
                                    <style>
                                        .editperil{
                                            text-align: center;                
                                            margin-top:5px;
                                            margin-bottom:5px;
                                        }
                                    </style>
                                </div> 
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title" style="text-align:center; margin-bottom:10px">Mis Medallas</h4>
                            </div>
                                <div class="row" style='margin-bottom:20px'>
                                    <div class="col-md-4" style="padding: 7px;text-align: center;">
                                        <div class="col-md-12 col-sm-6">
                                            <label style="display:inline-block ;margin-top:10px">
                                                listo
                                            </label>
                                            <p style="display:inline-block ;background-color: red;margin: 0 auto;width: 25px;color: white;height: 25px;border-radius: 50%;">
                                                <?php echo $trofor; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <img src="assets/img/premios/Medal2.png" alt="" width='150' style="align:center;">
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding: 7px;text-align: center;">
                                        <div class="col-md-12 col-sm-6">
                                            <label style="display:inline-block ;margin-top:10px">
                                                curioso
                                            </label>
                                            <p style="display:inline-block ;background-color: red;margin: 0 auto;width: 25px;color: white;height: 25px;border-radius: 50%;">
                                                <?php echo $trofpl; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <img src="assets/img/premios/Medal5.png" alt="" width='150' style="align:center;">
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding: 7px;text-align: center;">
                                        <div class="col-md-12 col-sm-6">
                                            <label style="display:inline-block ;margin-top:10px">
                                                Participador
                                            </label>
                                            <p style="display:inline-block ;background-color: red;margin: 0 auto;width: 25px;color: white;height: 25px;border-radius: 50%;">
                                                <?php echo $trofbr; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <img src="assets/img/premios/Medal9.png" alt="" width='150' style="align:center;">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title" style="text-align:center; margin-bottom:10px">Mis Trofeos</h4>
                            </div>
                            <div class="content">
                                <div class="row" style='margin-bottom:20px'>
                                    <div class="col-md-4" style="padding: 7px;text-align: center;">
                                        <div class="col-md-12 col-sm-6">
                                            <label style="display:inline-block ;margin-top:10px">
                                                ORO 
                                            </label>
                                            <p style="display:inline-block ;background-color: red;margin: 0 auto;width: 25px;color: white;height: 25px;border-radius: 50%;">
                                                <?php echo $medalor; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <img src="assets/img/premios/Medal8.png" alt="" width='150' style="align:center;">
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding: 7px;text-align: center;">
                                        <div class="col-md-12 col-sm-6">
                                            <label style="display:inline-block ;margin-top:10px">
                                                PLATA 
                                            </label>
                                            <p style="display:inline-block ;background-color: red;margin: 0 auto;width: 25px;color: white;height: 25px;border-radius: 50%;">
                                                <?php echo $medalpl; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <img src="assets/img/premios/Medal8.png" alt="" width='150' style="align:center;">
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding: 7px;text-align: center;">
                                        <div class="col-md-12 col-sm-6">
                                            <label style="display:inline-block ;margin-top:10px">
                                                BRONCE 
                                            </label>
                                            <p style="display:inline-block ;background-color: red;margin: 0 auto;width: 25px;color: white;height: 25px;border-radius: 50%;">
                                                <?php echo $medalbr; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <img src="assets/img/premios/Medal8.png" alt="" width='150' style="align:center;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Mis Cursos</h4>
                            </div>
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-plain">
                                                <div class="content table-responsive table-full-width">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <th>Curso</th>
                                                            <th>Puntos</th>
                                                            <th>Medallas</th>
                                                            <th>Docente</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>word intermedio</td>
                                                                <td>86,738</td>
                                                                <td>--</td>
                                                                <td>carlos pantoja</td>
                                                            </tr>
                                                            <tr>
                                                                <td>mi primera web</td>
                                                                <td>23,789</td>
                                                                <td>Platino</td>
                                                                <td>Inuyasha</td>
                                                            </tr>
                                                            <tr>
                                                                <td>dibujo</td>
                                                                <td>96,142</td>
                                                                <td>Safiro</td>
                                                                <td>Carlin carlos</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Soceidad actual</td>
                                                                <td>$38,735</td>
                                                                <td>ORO</td>
                                                                <td>Overland Park</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                       
                                                </div>
                                            </div>
                                        </div>         
                                    </div>                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div-->
                <?php //include_once('pblcrmstd.php'); ?>               
            </div>
        </div>

    <style>
        html{
            margin-top: -20px;
        }
    </style>
<?php include('footer.php'); ?>