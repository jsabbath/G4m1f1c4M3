<?php 

include('header.php'); 
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
                    <div class="col-md-5">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Instrucciones</h4>
                                <!--p class="category">Here is a subtitle for this table</p-->
                            </div>
                            <div class="content">
                                  <div class="container-fluid">
                                      <div class="row">    
                                          <div class="col-md-12">
                                              <div class="card card-plain">
                                                  <div class="content table-responsive table-full-width">
                                                      <label>Te encuentras en la seccion de chat con el padre, en esta interfaz puedes conversar con el Dr.</label>
                                                      <ul>
                                                          <li>Al lado derecho tienes la lista de padres de las diferentes clases de los cursos dentro de gamificame.</li>
                                                          <li>Selecciona el padre con el que deses conversar o preguntarle algo, dando click sobre 'DEJAR MENSAJE'</li>
                                                          <li>Eso es todo, el profesor revisara tu mensaje ni bien ingrese</li>
                                                      </ul>
                                                  </div>
                                              </div>
                                          </div>   
                                      </div>                    
                                  </div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tabla Padres</h4>
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
                                                              <th>Nombre/Apellido</th>
                                                              <!--th>Fecha registro</th-->
                                                              <th>Opciones</th>
                                                          </thead>
                                                          <tbody>
                                                                <?php foreach($model->Listarpadres() as $r): ?>
                                                                    <tr>
                                                                        <td>
                                                                          <label for="">
                                                                            <?php echo $r->__GET('nvchnombre'); ?> <?php echo $r->__GET('nvchapellido'); ?>
                                                                          </label>
                                                                        </td>
                                                                        <!--td>
                                                                           
                                                                        </td-->
                                                                        <td>
                                                                            <form action="chatroom.php" method="POST">
                                                                                <input class="hidden" type="text" value="<?php echo $r->nvchidpersona; ?>" name='idtu'>
                                                                                <input class="hidden" type="text" value="<?php echo $usuario_id ?>" name='idyo'>
                                                                                <!--input class='btn btn-info btn-xs'  type="submit" value='Dejar mensaje'-->
                                                                                <button style="background-color:#33b339; color:white"  type="submit" rel="tooltip" title="" class="btn btn-simple btn-xs" data-original-title="Mensajear a <?php echo $r->__GET('nvchnombre'); ?>">
                                                                                    <i class="pe-7s-chat" style='margin-right: 5px'> MENSAJE</i>
                                                                                </button>
                                                                            </form>
                                                                        </td>
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