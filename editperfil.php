	<?php include('header.php'); ?>

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
	                <a class="navbar-brand" href="#">Editar Perfil</a>
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
            <div class="col-md-5">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style="text-align:center; margin-top:20px; margin-bottom:10px">Editar Perfil</h4>
                    </div>
                    <div class="content">
                        <form action="pdtdtsr.php" method="POST">
                            <div class="hidden">
                                <label>El id del usuario es: </label>
                                <input type="text" minlength="2" value="<?php echo $usuario_id; ?>" name='txtalumno' required>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Seudonimo</label>
                                        <input type="text" minlength="2" name='nvchalias' class="form-control" placeholder="Quiero que me llamen..." required>
                                    </div>        
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sobre mi </label>
                                        <textarea rows="5" name='nvchintereses' class="form-control" placeholder="Me describo como una persona..." required></textarea>
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
     </div> 

<style>
    html{
        margin-top: -20px;
    }
</style>

     <?php include('footer.php'); ?>r