<?php
  include('headeradmin.php');

require_once 'docente.entidad.php';
require_once 'docente.model.php';

$buttonname = 'Registrar';
// Logica
$doc = new Docente();
$model = new DocenteModel();



if(isset($_REQUEST['action']))
{
  switch($_REQUEST['action'])
  {
    case 'actualizar':
      $doc->__SET('intiddocente',$_REQUEST['intiddocente']);
      $doc->__SET('nvchnombre',$_REQUEST['nvchnombre']);
      $doc->__SET('nvchapellidos',$_REQUEST['nvchapellidos']);
      $doc->__SET('nvchcelular',$_REQUEST['nvchcelular']);
      $doc->__SET('nvchcorreo',$_REQUEST['nvchcorreo']);

      $model->Actualizar($doc);
      header('Location: docente.php');
      break;

    case 'registrar':
      $doc->__SET('intiddocente',$_REQUEST['intiddocente']);
      $doc->__SET('nvchnombre',$_REQUEST['nvchnombre']);
      $doc->__SET('nvchapellidos',$_REQUEST['nvchapellidos']);
      $doc->__SET('nvchcelular',$_REQUEST['nvchcelular']);
      $doc->__SET('nvchcorreo',$_REQUEST['nvchcorreo']);


      $model->Registrar($doc);
      header('Location: docente.php');
      break;

    case 'eliminar':
      $model->Eliminar($_REQUEST['intiddocente']);
      header('Location: docente.php');
      break;

    case 'editar':
      $doc = $model->Obtener($_REQUEST['intiddocente']);
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
    <form action="?action=<?php echo $alum->intidalumno > 0 ? 'actualizar' : 'registrar'; ?>" method="post">
      <div class="content">
          <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div style="margin-top:10px">
                    </div>
                    <div class="header">
                        <h4 class="title">Registro de docente</h4>
                    </div>
                    <div class="content">
                        <form action="?action=<?php echo $doc->intiddocente > 0 ? 'actualizar' : 'registrar'; ?>" method="post">
                            <div class="row">
                                <input type="hidden" name="intiddocente" value="<?php echo $doc->__GET('intiddocente'); ?>" />
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombres</label>
                                        <input type="text" class="form-control" id="" name="nvchnombre" value="<?php echo $doc->__GET('nvchnombre'); ?>" required>
                                    </div>        
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input type="text" class="form-control" id="" name="nvchapellidos" value="<?php echo $doc->__GET('nvchapellidos'); ?>" required>
                                    </div>        
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">telefono</label>
                                        <input type="text" class="form-control" id="" name="nvchcelular" value="<?php echo $doc->__GET('nvchcelular'); ?>" required>
                                    </div>        
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Correo</label>
                                        <input type="text" class="form-control" id="" name="nvchcorreo" value="<?php echo $doc->__GET('nvchcorreo'); ?>" required>
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right"><?php echo $buttonname; ?>
                            </button>
                            <a type="submit" href="docente.php" class="btn btn-info btn-fill pull-right">limpiar
                            </a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">Tabla de Docente</h4>
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
                                                          <th style="text-align:left;">Id</th>
                                                          <th style="text-align:left;">Nombres/apellidos</th>
                                                          <th style="text-align:left;">Celular</th>
                                                          <th style="text-align:left;">Correo</th>
                                                          <th style="text-align:left;">Opciones</th>
                                                        </tr>
                                                      </thead>
                                                        <?php foreach($model->Listar() as $r): ?>
                                                          <tr>
                                                              <td><?php echo $r->__GET('intiddocente'); ?></td>
                                                              <td>
                                                                  <?php echo $r->__GET('nvchnombre'); ?>/
                                                                  <?php echo $r->__GET('nvchapellidos'); ?>
                                                              </td>
                                                              <td><?php echo $r->__GET('nvchcelular'); ?></td>
                                                              <td><?php echo $r->__GET('nvchcorreo'); ?></td>
                                                              <td>
                                                                  <a href="?action=editar&intiddocente=<?php echo $r->intiddocente; ?>">Editar</a>
                                                                  <br>
                                                                  <a href="?action=eliminar&intiddocente=<?php echo $r->intiddocente; ?>">Eliminar</a>
                                                                  <?php echo $r->__GET('intiddocente'); ?>
                                                              </td>

                                                          </tr>
                                                        <?php endforeach; ?>
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
    </form>
<?php include('footer.php'); ?>