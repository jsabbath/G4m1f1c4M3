<?php 
    include('header.php'); 

    function damedocentes(){
        $consulta_mysql="
        SELECT 
        persona.nvchnombre,
        persona.chrtipopersona,
        persona.nvchapellido,
        sum(tb_pers_resp.punto) AS punto,
        sum(tb_pers_resp.moro) AS moro,
        sum(tb_pers_resp.mplata) AS mplata,
        sum(tb_pers_resp.mbronce) AS mbronce,
        sum(tb_pers_resp.toro) AS toro,
        sum(tb_pers_resp.tplata) AS tplata, 
        sum(tb_pers_resp.tbronce) AS tbronce
        FROM `tb_pers_resp` 
        inner join persona on persona.nvchidpersona = tb_pers_resp.inpers
        where persona.chrtipopersona ='1' 
        GROUP by tb_pers_resp.inpers 
        ORDER BY tb_pers_resp.punto DESC
        ";
        $resultado_consulta_mysql=mysql_query($consulta_mysql);
        while($registro = mysql_fetch_array($resultado_consulta_mysql)){
            echo "
                <tr>
                    <td><label>".$registro['nvchnombre']." ".$registro['nvchapellido']."</label></td>
                    <td><label>".$registro['punto']."</label></td>
                    <td><label>".$registro['moro']."</label></td>
                    <td><label>".$registro['mplata']."</label></td>
                    <td><label>".$registro['mbronce']."</label></td>
                    <td><label>".$registro['toro']."</label></td>
                    <td><label>".$registro['tplata']."</label></td>
                    <td><label>".$registro['tbronce']."</label></td>
                    <!--td>
                        <label>
                          <a class='label label-success' href=''>Escribirle un mensaje</a>
                        </label>
                    </td-->
                </tr>
            ";
        }
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
                    <a class="navbar-brand" href="#">El ranking Gamificame</a>
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
                                <!--li><a href="#">Notification 1</a></li-->
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
                    <div class="col-md-12"><div class="card">
                            <div class="header" style="padding-top:30px; text-align:center">
                                <label for=""><h4 class="title">Los pesopesado gamificame</h4></label>
                                <!--p class="category">Here is a subtitle for this table</p-->
                            </div>
                            <div class="content">
                                  <div class="container-fluid">
                                      <div class="row">    
                                          <div class="col-md-12">
                                              <div class="card card-plain">
                                                  <div class="content table-responsive table-full-width">
                                                      <table class="table table-hover">
                                                          <thead>
                                                              <tr>
                                                                  <th>Nombre/Apellido</th>
                                                                  <th>puntos</th>
                                                                  <th>Med. oro</th>
                                                                  <th>Med. plata</th>
                                                                  <th>Med. plata</th>
                                                                  <th>trof. oro</th>
                                                                  <th>trof. plata</th>
                                                                  <th>trof. bronce</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                                <?php damedocentes(); ?>
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
                                 
                </div>                    
            </div>
        </div>

        <style>
            html{
                margin-top: -20px;
            }
        </style>
  <?php include('footer.php'); ?>
