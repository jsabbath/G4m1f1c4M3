<?php
  include('headeradmin.php');

require_once 'persona.entidad.php';
require_once 'persona.model.php';

/*para el pdf*/
$conexion = mysql_connect("localhost","root","");
  mysql_select_db("db_gamificame",$conexion);
/*END pdf*/

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
    <form action="?action=<?php echo $per->nvchidpersona > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked">
      <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                  <div class="card">
                    <div style="margin-top:10px">
                    </div>
                    <div class="header">
                        <h4 class="title">Registro de Alumnos/docente/director/padre</h4>
                    </div>
                    <div class="content">
                        <form>
                            <div class="row">
                                <input type="hidden" name="nvchidpersona" value="<?php echo $per->__GET('nvchidpersona'); ?>" />
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>DNI</label>
                                        <input type="number" maxlength='8' minlength="8" placeholder ='Ingresar DNI' class='form-control' name="nvchdni" value="<?php echo $per->__GET('nvchdni'); ?>" style="width:100%;" required />
                                    </div>        
                                </div>
                                <div class="col-md-3">
                                <label>Registro colectivo</label>
                                    <a href="archivocsv.php" class="btn btn-info btn-fill">Importar CSV</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Nombres</label>
                                        <input class='form-control' type="text" name="nvchnombre" value="<?php echo $per->__GET('nvchnombre'); ?>" placeholder='Ingrese  nombres completos' required />
                                    </div>        
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Apellido</label>
                                        <input class='form-control' type="text" name="nvchapellido" value="<?php echo $per->__GET('nvchapellido'); ?>" placeholder='Ingrese Sapellidos completos' required/>
                                    </div>        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Correo electrónico</label>
                                        <input class='form-control' type="email"  placeholder='Ingrese  correo electrónico' name="nvchcorreo" value="<?php echo $per->__GET('nvchcorreo'); ?>" style="width:100%;" required/>
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
                                        <input  maxlength='8'  placeholder='Ingrese DNI del menor hijo'  minlength="8"  class='form-control' type="number" class='' name="nvchdnihijo" value="<?php echo $per->__GET('nvchdnihijo'); ?>"/>
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
          </div>
          <!--TABLA-->
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                          <h4 class="title" style="text-align:center">Tabla de Registros</h4>
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
                                                      <th>Opciones</th>
                                                  </thead>
                                                  <tbody>
                                                    <?php foreach($model->Listar() as $r): ?>
                                                        <tr>
                                                            <td>
                                                                <label ><?php echo $r->__GET('nvchdni'); ?></td></label>
                                                            <td>    
                                                                <label ><?php echo $r->__GET('nvchnombre'); ?> <?php echo $r->__GET('nvchapellido'); ?></label >
                                                            </td>
                                                            <td>
                                                                <label><?php echo $r->__GET('nvchcorreo'); ?></label>
                                                            </td>
                                                            <td>
                                                                <label><?php echo $r->__GET('chrgenero') == 1 ? 'Varon' : 'Mujer'; ?></label>
                                                            </td>
                                                            <td>
                                                                <label>
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
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label><?php $dnihijo = $r->__GET('nvchdnihijo'); 
                                                                    if ($dnihijo) {
                                                                        echo $dnihijo;
                                                                    } else {
                                                                        echo "--";
                                                                    }
                                                                    
                                                                ?></label>
                                                            </td>
                                                            <td><label><?php echo $r->__GET('dtnacimiento'); ?></label></td>
                                                            <!--td><?php //echo $r->__GET('dtregistro'); ?></td-->
                                                            <td>
                                                                <label>
                                                                  <a class="label label-success" style ='font-size: 10px' href="?action=editar&nvchidpersona=<?php echo $r->nvchidpersona; ?>">Editar</a>
                                                                </label>
                                                                <!--label>  
                                                                  <a  class="label label-danger" style ='font-size: 10px' href="?action=eliminar&nvchidpersona=<?php echo $r->nvchidpersona; ?>">Eliminar</a>
                                                                </label-->
                                                                <label>
                                                                  <a  class="label label-info" style ='font-size: 10px' href="perfil.php?id=<?php echo $r->nvchidpersona; ?>">Ver Perfil</a>
                                                                </label>
                                                                  
                                                            </td>
                                                            <td>
                                                                <!--p>id=<?php echo $r->nvchidpersona; ?></p-->
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div>   
                              </div>
                              <div class="row" style="margin-bottom:20px">
                                  <div class="col-md-12">
                                    <a href="listaalumnos.php" class="btn btn-info btn-fill pull-right" >
                                      <i class='pe-7s-download'></i> PDF Alumnos</a>
                                    <a href="listapadres.php"  style='margin-right: 5px' class="btn btn-alert btn-fill pull-right" >
                                      <i class='pe-7s-download'></i> PDF Padres </a>
                                    <a href="listadocentes.php"  style='margin-right: 5px' class="btn btn-danger btn-fill pull-right" >
                                      <i class='pe-7s-download'></i> PDF Docentes </a>
                                  </div>
                              </div>                  
                          </div>
                      </div>
                  </div>
              </div>
          </div>      
      </div>
    </form>
    <style>
        html{
            margin-top: -20px;
        }
    </style>
<?php include('footer.php'); ?>
