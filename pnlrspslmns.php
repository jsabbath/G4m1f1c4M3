<?php 
include('headerdocente.php'); 

    function damedocentes(){
        $consulta_mysql="
        SELECT
		  persona.nvchnombre,
		  persona.chrtipopersona,
		  persona.nvchapellido,
		  tb_pregunta.nvchpregunta AS prg,
		  tb_pers_resp.nvchrspt AS cdnrspt
		FROM
		  `tb_pers_resp`
		INNER JOIN persona 
		ON persona.nvchidpersona = tb_pers_resp.inpers
		INNER JOIN tb_pregunta
		on tb_pers_resp.ispreg = tb_pregunta.intidpregunta
		WHERE
		  persona.chrtipopersona = '1'
        ";
        $resultado_consulta_mysql=mysql_query($consulta_mysql);
        while($registro = mysql_fetch_array($resultado_consulta_mysql)){
            echo "
                <tr>
                    <td><label>".$registro['nvchnombre']." ".$registro['nvchapellido']."</label></td>
                    <td><label>".$registro['prg']."</label></td>
                    <td><label>".$registro['cdnrspt']."</label></td>
                    <td>
                        <label>
                          <a class='label label-success' href='rglrpnts.php'>Premiarlo</a>
                        </label>
                    </td>
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
                    <div class="col-md-12"><div class="card">
                            <div class="header" style="padding-top:30px; text-align:center">
                                <label for=""><h4 class="title">Intervenciones en Clases</h4></label><br>
                                <label for="">(respuestas desarrolladas)</label>
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
                                                                  <th>Pregunta</th>
                                                                  <th>Respondio</th>
                                                                  <th>Opciones</th>
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
      margin-top: 0px;
    }
</style>      
<?php include('footer.php'); ?>