<?php
include('headeradmin.php');


date_default_timezone_set('America/Lima');
$dia = date("l");
$hora = date("H:i:s");

switch ($dia) {
    case 'Monday':
        echo "Lunes ".$hora;
        break;
    case 'Tuesday':
        echo "Martes ".$hora;
        break;
    case 'Wednesday':
        echo "Miercoles ".$hora;
        break;
    case 'Thursday':
        echo "Jueves ".$hora;
        break;
    case 'Friday':
        echo "Viernes ".$hora;
        break;
    case 'saturday':
        echo "Sabado ".$hora;
        break;
    case 'sunday':
        echo "Domingo ".$hora;
        break;
    default: 
        echo 'nada';
        break;
}

require_once 'persona.entidad.php';
require_once 'persona.model.php';
// Logica
$buttonname = 'Registrar';
$per = new Persona();
$model = new PersonaModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$per->__SET('nvchidpersona',$_REQUEST['nvchidpersona']);
            $per->__SET('nvchdni',$_REQUEST['nvchdni']);
			$per->__SET('nvchnombre',$_REQUEST['nvchnombre']);
			$per->__SET('nvchapellido',$_REQUEST['nvchapellido']);
            $per->__SET('nvchcorreo',$_REQUEST['nvchcorreo']);
			$per->__SET('chrgenero',$_REQUEST['chrgenero']);
            $per->__SET('chrtipopersona',$_REQUEST['chrtipopersona']);
            $per->__SET('nvchdnihijo',$_REQUEST['nvchdnihijo']);
			$per->__SET('dtnacimiento', $_REQUEST['dtnacimiento']);
            $per->__SET('dtregistro', $_REQUEST['dtregistro']);
            //$alm->__SET('foto', $_REQUEST['foto']);
			$model->Actualizar($per);
			header('Location: persona.php');
			break;

		case 'registrar':
            $buttonname = 'Registrar';

			$per->__SET('nvchdni',$_REQUEST['nvchdni']);
            $per->__SET('nvchnombre',$_REQUEST['nvchnombre']);
			$per->__SET('nvchapellido',$_REQUEST['nvchapellido']);
            $per->__SET('nvchcorreo',$_REQUEST['nvchcorreo']);
			$per->__SET('chrgenero',$_REQUEST['chrgenero']);
            $per->__SET('chrtipopersona',$_REQUEST['chrtipopersona']);
            $per->__SET('nvchdnihijo',$_REQUEST['nvchdnihijo']);
			$per->__SET('dtnacimiento',$_REQUEST['dtnacimiento']);
            $per->__SET('dtregistro',$_REQUEST['dtregistro']);
            //$alm->__SET('foto', $_REQUEST['foto']);
			$model->Registrar($per);
			header('Location: persona.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['nvchidpersona']);
			header('Location: persona.php');
			break;

		case 'editar':
			$per = $model->Obtener($_REQUEST['nvchidpersona']);
			break;
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
    <form action="?action=<?php echo $per->nvchidpersona > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;" enctype="multipart/form-data">
      <div class="content">
          <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div style="margin-top:10px">
                            </div>
                            <div class="header">
                                <h4 class="title">Registro de alumnos</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <input type="hidden" name="nvchidpersona" value="<?php echo $per->__GET('nvchidpersona'); ?>" />
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>DNI</label>
                                                <input type="text" maxlength='8' minlength="8" placeholder ='Ingresar DNI' class='form-control' name="nvchdni" value="<?php echo $per->__GET('nvchdni'); ?>" style="width:100%;" required />
                                            </div>        
                                        </div>
                                        <div class="col-md-2">
                                        <label>Pulsar boton</label>
                                            <button type="submit" title='Buscar registro anterior con este DNI' class="btn btn-info btn-fill">Buscar Registro </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Nombres</label>
                                                <input  class='form-control' type="text" name="nvchnombre" value="<?php echo $per->__GET('nvchnombre'); ?>" style="width:100%;" required />
                                            </div>        
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Apellido</label>
                                                <input class='form-control' type="text" name="nvchapellido" value="<?php echo $per->__GET('nvchapellido'); ?>" style="width:100%;" required/>
                                            </div>        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Correo</label>
                                                <input class='form-control' type="email" name="nvchcorreo" value="<?php echo $per->__GET('nvchcorreo'); ?>" style="width:100%;" required/>
                                            </div>        
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Género</label>
                                                    <select class='form-control' name="chrgenero" style="width:100%;" required>
                                                        <option value="1" <?php echo $per->__GET('chrgenero') == 1 ? 'selected' : ''; ?>>Masculino</option>
                                                        <option value="2" <?php echo $per->__GET('chrgenero') == 2 ? 'selected' : ''; ?>>Femenino</option>
                                                    </select>
                                            </div>    
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Tipo persona</label>
                                                <select class='form-control'  id='slctprsn' name="chrtipopersona" style="width:100%;" required>
                                                    <option value="1" <?php echo $per->__GET('chrtipopersona') == 1 ? 'selected' : ''; ?>>Alumno</option>
                                                    <option value="2" <?php echo $per->__GET('chrtipopersona') == 2 ? 'selected' : ''; ?>>Padre</option>
                                                    <option value="3" <?php echo $per->__GET('chrtipopersona') == 3 ? 'selected' : ''; ?>>Docente</option>
                                                </select>
                                            </div>        
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>DNI hijo</label>
                                                <input  class='form-control' type="text" class='' name="nvchdnihijo" value="<?php echo $per->__GET('nvchdnihijo'); ?>"/>
                                            </div>        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nacimiento</label>
                                                <input class='form-control' type="date" name="dtnacimiento" value="<?php echo $per->__GET('dtnacimiento'); ?>" style="width:100%;" required/>
                                            </div>        
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Fecha Registro</label>
                                                <input class='form-control' type="date" name="dtregistro" value="<?php echo $per->__GET('dtregistro'); ?>" style="width:100%;" required/>
                                            </div>        
                                        </div>
                                        
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right"><?php echo $buttonname; ?></button>
                                    <div class="clearfix">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--div class="row">
                      <div class="col-md-12">
                          <div class="card">
                              <div class="header">
                                  <h4 class="title">Tabla de Alumnos</h4>
                              </div>
                              <div class="content">
                                  <div class="container-fluid">
                                      <div class="row">    
                                          <div class="col-md-12">
                                              <div class="card card-plain">
                                                  <div class="content table-responsive table-full-width">
                                                      <table class="table table-hover">
                                                          <thead>
                                                            <th>DNI</th>
                                                            <th>Nombre/Apellido</th>
                                                            <th>Correo</th>
                                                            <th>Sexo</th>
                                                            <th>Tipo</th>
                                                            <th>dnihijo</th>
                                                            <th>Nacimiento</th>
                                                            <!--th>Fecha registro</th-->
                                                            <!--th>Opciones</th>
                                                          </thead>
                                                          <tbody>
                                                            <?php foreach($model->Listar() as $r): ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $r->__GET('nvchdni'); ?></td>
                                                                    <td>    
                                                                        <?php echo $r->__GET('nvchnombre'); ?> <?php echo $r->__GET('nvchapellido'); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $r->__GET('nvchcorreo'); ?></td>
                                                                    <td>
                                                                        <?php echo $r->__GET('chrgenero') == 1 ? 'Varon' : 'Mujer'; ?></td>
                                                                    <td>
                                                                        <?php $tpprs = $r->__GET('chrtipopersona');
                                                                            if ($tpprs == 1) {
                                                                                echo "Alumno";
                                                                            } else
                                                                            if ($tpprs == 2) {
                                                                                echo "Padre";
                                                                            } else
                                                                            if ($tpprs == 3) {
                                                                                echo "Docente";
                                                                            }else{
                                                                                echo "-";
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php $dnihijo = $r->__GET('nvchdnihijo'); 
                                                                            if ($dnihijo) {
                                                                                echo $dnihijo;
                                                                            } else {
                                                                                echo "--";
                                                                            }
                                                                            
                                                                        ?>
                                                                    </td>
                                                                    <td><?php echo $r->__GET('dtnacimiento'); ?></td>
                                                                    <!--td><?php //echo $r->__GET('dtregistro'); ?></td-->
                                                                    <!--td>
                                                                        <a href="?action=editar&nvchidpersona=<?php echo $r->nvchidpersona; ?>">Editar</a>
                                                                        <a href="?action=eliminar&nvchidpersona=<?php echo $r->nvchidpersona; ?>">Eliminar</a>
                                                                        <a href="perfil.php?id=<?php echo $r->nvchidpersona; ?>">Ver Perfil</a>
                                                                    </td>
                                                                    <td>
                                                                        <!--p>id=<?php echo $r->nvchidpersona; ?></p-->
                                                                    <!--/td>
                                                                </tr>
                                                            <?php endforeach; ?>
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
          </div>
      </div>
    </form>


<?php include('footer.php'); ?>