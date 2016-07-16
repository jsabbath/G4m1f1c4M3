<?php 
include('header.php'); 
$id = $_POST['intidpregunta'] ;
$decr = $_POST['nvchdescripcion'] ;
$resp = $_POST['nvchpregunta'] ;

conectar('localhost','root', '', 'db_gamificame'); //declara
    function damerespuestas(){
    	$id = $_POST['intidpregunta'] ;
        $consulta_mysql='SELECT * FROM tb_respuesta WHERE tb_respuesta.intidpregunta = "'.$id.'"';
        $resultado_consulta_mysql=mysql_query($consulta_mysql);
        while($registro = mysql_fetch_array($resultado_consulta_mysql)){
            echo "<li>".$registro['nvchrespuesta']."</li>";
            //echo $consulta_mysql;
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
                    <div class="col-md-5">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">
                                <form action="rgstrrrspst.php" method="POST">
	                                <div class='hidden'>
	                                	<label>El id del pregunta es: </label>
	                                	<input class='' type="text" value='<?php echo $id; ?>' name='$id'>
	                                </div>
                                	<div class="hidden">
		                        		<label>El id del usuario es: </label>
		                        		<input type="text" value="<?php echo $usuario_id; ?>" name='txtalumno' required>
		                        	</div>
                                	<label>
                                		<strong><?php echo $decr; ?></strong>
                                	</label>
                                	<br>
                                	<p style='text-transform: uppercase;'>
                                		<?php echo $resp; ?>
                                	</p>
                                	<label for="" style="font-family:18px">
	                            		<strong>
		                            		<ul>
		                            			<?php  damerespuestas();  ?>
		                            		</ul>
	                            		</strong>
                                	</label>
                                	<input type="text" class="form-control" placeholder='Ingresa tu respuesta' name='txtrspt' required>
                                	<button type="submit" class="btn btn-info btn-fill pull-right">RESPONDER</button>
                                	<div class="clearfix"></div>
                                </form>
                                </h4>
                                <!--p class="category">Here is a subtitle for this table</p-->
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
