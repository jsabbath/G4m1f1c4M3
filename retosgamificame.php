<?php 

include('header.php'); 

function preguntas(){
	$usrname = $_SESSION['nvchusername'];
	$consulta_mysql="
	SELECT *  from tb_pregunta where tb_pregunta.chrhabilitado  = 'A'
	";
	$resultado_consulta_mysql=mysql_query($consulta_mysql);
	while($registro = mysql_fetch_array($resultado_consulta_mysql)){
		echo "
	    <div class='col-md-4'>
	    	<div class='card cmnt' style='background-color:#2196F3; color:white;'>
	    		<div class='content'>
	    			<div class='horacmt'>
	    				<form action='vrrspt.php' method='POST'>
		    				<input class='hidden' style='color:black' type='text' value='".$registro['intidpregunta']."' name='intidpregunta'>
		    				<i class='pe-7s-help1' style='margin:0 auto;font-size:25px; background-color:yellow; margin-bottom;20px; padding:10px; color:gray; border-radius: 50%'>
		    				</i>
		    				<br>
		    				<label style='color:white; margin-top:20px'>".$registro['nvchdescripcion'].":</label>
		    				<input class='hidden' style='color:black' type='text' value='".$registro['nvchdescripcion']."' name='nvchdescripcion'>
		    				<br>
			    			<p style='color:white; font-size: 20px; text-transform:uppercase'>".$registro['nvchpregunta']."</p>
			    			<input class='hidden' style='color:black' type='text' value='".$registro['nvchpregunta']."' name='nvchpregunta'>
			    			<input style='background-color:#E91E63' class='btn btn-fill pull-right' type='submit' value='SE LA RESPUESTA'>
			    			<div class='clearfix'></div>
			    		</form>
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
			    	<?php 
			    		preguntas();
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