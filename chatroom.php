<?php 
    include('header.php'); 

    $idtu = $_SESSION['intidtu'] = $_POST["idtu"];    
    $idyo = $_SESSION['intidyo'] = $_POST["idyo"];

    function damealdocente(){
    	$receptor = $_SESSION['intidtu'];
        $consulta_mysql='SELECT nvchnombre,nvchapellido from persona WHERE persona.nvchidpersona = "'.$receptor.'"';

        $resultado_consulta_mysql=mysql_query($consulta_mysql);
        while($registro = mysql_fetch_array($resultado_consulta_mysql)){
            echo " ".$registro['nvchnombre']." ".$registro['nvchapellido']."";
        }
    }

    function historialchat(){
    	$receptor = $_SESSION['intidtu'];
    	$emisor =  $_SESSION['intidyo'];

		$consulta_mysql='SELECT * FROM tb_chat where intidyo = "'.$emisor.'" AND intidtu = "'.$receptor.'" OR intidyo = "'.$receptor.'" AND intidtu = "'.$emisor.'"';

        $resultado_consulta_mysql=mysql_query($consulta_mysql);
        while($registro = mysql_fetch_array($resultado_consulta_mysql)){
            if ($registro['intidyo'] == $emisor) {
					echo "
					<div style='text-align: right;'>
						<label style='margin:5px; width:auto ; max-width: 80%; padding:10px ;background-color:#03A9F4; color: white; border-radius:10px 0px 10px 0px;'>
						".$registro['nvchmsj']."
						</label>
					</div>
					";

            } else {
            	echo "<div style='text-align: left;'>
						<label style=' margin:5px; width:auto ; max-width: 80%; padding:10px ;background-color:#e4e2e2; color: black; border-radius:10px 0px 10px 0px;'>
						".$registro['nvchmsj']."
						</label>
					</div>";
            }
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
                    <a class="navbar-brand" href="#">Dejar mensaje al Docente</a>
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
                    <div class="col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">
                                	<label>Chat con docente: </label> 
                                	<label for="" style="font-family:18px"><u><strong><?php  damealdocente();  ?></strong></u></label>
                                </h4>
                                <!--p class="category">Here is a subtitle for this table</p-->
                            </div>
                            <div class="content">
                                  <div class="container-fluid">
                                      <div class="row"> 
                                      	<form action="regchat.php" method="POST">
                                          <div class="col-md-12" style="">
                                              <div class="card card-plain">
                                                  <div class="content table-responsive table-full-width">
                                                      <div class="row">
                                                      <?php historialchat() ?>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <input class='hidden' type='text' value='<?php echo $_POST["idyo"]; ?>' name='idyo'>
                                          <input  class='hidden'  type='text' value='<?php echo $_POST["idtu"]; ?>' name='idtu'>
                                          <input class='form-control' type="text" placeholder='ingresa tu mensaje' name='msj' required="" minlength="2">
                                          <input style="background-color:#33b339; margin-top:10px; padding:5px; color:white" class='btn btn-xs'  type="submit" value='ENVIAR'>
                                        </form>   
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
            margin-top:0px;
        }
    </style>

    <script>
        $('#identifier').modal(options)    
    </script>

  <?php include('footer.php'); ?>