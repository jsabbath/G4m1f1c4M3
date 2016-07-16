<?php 

include('header.php'); 

function damecomentariosmios(){
	$usrname = $_SESSION['nvchusername'];
	$consulta_mysql="
	SELECT
	  tb_estado.intidestado,
	  persona.nvchidpersona,
	  persona.nvchnombre,
	  persona.nvchapellido,
	  persona.nvchalias,
	  tb_estado.nvchestado,
	  tb_estado.dtfecha,
	  tb_estado.nvchhora,

	  tb_estado.nvchdia,
	  tb_estado.nvchdatedia,
	  tb_estado.nvchmes,
	  tb_estado.nvchhoraind,
	  tb_estado.nvchminuto 
	FROM
	  tb_estado
	INNER JOIN
	  persona ON tb_estado.intidpersona = persona.nvchidpersona
	INNER JOIN tb_user ON persona.nvchidpersona = tb_user.intidpersona
	 ORDER BY `tb_estado`.`intidestado` DESC
	";
	$resultado_consulta_mysql=mysql_query($consulta_mysql);
	while($registro = mysql_fetch_array($resultado_consulta_mysql)){
		echo "
	    <div class='col-md-4'>
	    	<div class='card cmnt' style='background-color:#e91e63; color:white;'>
	    		<div class='header ccabecera'>
	    			<div class='contenidocmt'>
	    				<input class='hidden' style='color:black' type='text' value='".$registro['intidestado']."' name='idestado'>
	    				<h5 class='title'>
	    					<label style='color:white'>".$registro['nvchnombre']." ".$registro['nvchapellido']." (".$registro['nvchalias'].")
	    					</label>
	    				</h5>
	    				<br>
	    			</div>
	    		</div>
	    		<div class='content'>
	    			<div class='texto'>
	    				<h5>
	    				".$registro['nvchestado']."
	    				</h5>
	    			</div>
	    			<div class='horacmt'>
		    			<label style='color:white'>".$registro['nvchdia']." / ".$registro['nvchdatedia']." de ".$registro['nvchmes']." / ".$registro['nvchhoraind'].":".$registro['nvchminuto']."</label>
		    		</div>
	    		</div>
	    	</div>
	    </div>
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
				    <div class="col-md-6">
				        <div class="card">
				            <div class="header">
				                <h4 class="title">Expresate...</h4>
				                <br>
				                <label>Todos tenemos derecho a expresarnos, pero con educación y respeto hacia el projimo... ;)</label>
				            </div>
				            <div class="content">
				                <form action="regcoment.php" method="POST">
				                    <div class="row">
				                        <div class="col-md-12">
				                        	<div class="hidden">
				                        		<label>El id del usuario es: </label>
				                        		<input type="text" value="<?php echo $usuario_id; ?>" name='txtalumno' required>
				                        	</div>
				                            <div class="form-group">
				                                <label>Que estoy pensado justo ahora? </label>
				                                <textarea rows="2" minlength="10" class="form-control" placeholder="expresate" value='' name='txtestado' required>
				                                </textarea>
				                            </div>        
				                        </div>
				                    </div>
				                    <button type="submit" class="btn btn-info btn-fill pull-right">Publicar</button>
				                    <button type='reset' class="btn btn-info btn-fill pull-right" style="margin-right: 7px">Nuevo</button>
				                    <div class="clearfix"></div>
				                </form>
				            </div>
				        </div>
				    </div>
				</div>
			    <div class="row">
			    	<?php 
			    		damecomentariosmios();
			    	 ?>
			    </div>
			</div>
		</div>

<style>
	h5 strong{
		/*margin-left: 10px;*/
	}
	.texto{
		margin-bottom: 10px;
		margin-top:0px;
	}
	.horacmt{
		text-align: right;
	}
	.cmnt{
		padding: 15px;
	}
	.card .header{
		border-bottom: 2px solid white;
	}
	html{
      margin-top: -20px;
    }
</style>      
<?php include('footer.php'); ?>