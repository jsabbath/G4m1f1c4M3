<?php
  include('headerdocente.php');

require_once 'tarea.entidad.php';
require_once 'tarea.model.php';

$buttonname = 'Registrar';


// Logica
$tar = new Tarea();
$model = new TareaModel();

  if(isset($_REQUEST['action']))
  {
    switch($_REQUEST['action'])
    {
      case 'actualizar':
        $tar->__SET('intidtarea',$_REQUEST['intidtarea']);
        $tar->__SET('nvchtarea',$_REQUEST['nvchtarea']);
        $tar->__SET('vchmaterial',$_REQUEST['vchmaterial']);
        $tar->__SET('nvchdescripciontarea',$_REQUEST['nvchdescripciontarea']);

        $model->Actualizar($tar);
        header('Location: tarea.php');
        break;

      case 'registrar':
        $buttonname = 'Registrar';
        $tar->__SET('nvchtarea',$_REQUEST['nvchtarea']);
        $tar->__SET('vchmaterial',$_REQUEST['vchmaterial']);
        $tar->__SET('nvchdescripciontarea',$_REQUEST['nvchdescripciontarea']);

        $model->Registrar($tar);
        header('Location: tarea.php');
        break;

      case 'eliminar':
        echo "<script>alert('Registro Eliminado con exito!!!');</script>";
        $model->Eliminar($_REQUEST['intidtarea']);
        header('Location: tarea.php');
        break;

      case 'editar':
        $buttonname = 'Actualizar';
        $tar = $model->Obtener($_REQUEST['intidtarea']);
        break;
    }
  }
?>
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
    <form action="?action=<?php echo $tar->intidtarea > 0 ? 'actualizar' : 'registrar'; ?>" method="post">
      <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                  <div class="card">
                    <div style="margin-top:10px">
                    </div>
                    <div class="header">
                        <h4 class="title">Registro de Tareas</h4>
                    </div>
                    <div class="content">
                        <form>
                            <div class="row">
                                <input type="hidden" name="intidtarea" value="<?php echo $tar->__GET('intidtarea'); ?>" />
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tarea</label>
                                        <input type="text" placeholder='Titulo de la tarea' class="form-control" id="" name="nvchtarea" value="<?php echo $tar->__GET('nvchtarea'); ?>" required>
                                    </div>        
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Material</label>
                                        <input type="url" class="form-control" placeholder='Ingrese URL del recurso/material' id="" name="vchmaterial" value="<?php echo $tar->__GET('vchmaterial'); ?>" required>
                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>descripción</label>
                                        <input type="text" class="form-control" placeholder="Ingrese una descripción de a tarea" id="" name="nvchdescripciontarea" value="<?php echo $tar->__GET('nvchdescripciontarea'); ?>" required>
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
                          <h4 class="title">Lista de Tareas</h4>
                      </div>
                      <div class="content">
                          <div class="container-fluid">
                              <div class="row">    
                                  <div class="col-md-12">
                                      <div class="card card-plain">
                                          <div class="content table-responsive table-full-width">
                                              <table class="table table-hover">
                                                      <thead>
                                                          <th>id</th>
                                                          <th>tarea</th>
                                                          <th>materal</th>
                                                          <th>descripcion</th>
                                                          <th>Opciones</th>
                                                      </thead>
                                                      <?php foreach($model->Listar() as $r): ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $r->__GET('intidtarea'); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $r->__GET('nvchtarea'); ?>
                                                            </td>
                                                            <td> 
                                                              <a href="<?php echo $r->__GET('vchmaterial'); ?>"><?php echo $r->__GET('vchmaterial'); ?></a>
                                                            </td>

                                                            <td class="truncado">
                                                              <?php echo $r->__GET('nvchdescripciontarea'); ?>
                                                              <style>
                                                              </style>     
                                                            </td>
                                                            <td>
                                                                <label>
                                                                  <a class="label label-success" style ='font-size: 10px' href="?action=editar&intidtarea=<?php echo $r->intidtarea; ?>">Editar</a>
                                                                </label>
                                                                <label>
                                                                  <a class="label label-danger" style ='font-size: 10px' href="?action=eliminar&intidtarea=<?php echo $r->intidtarea; ?>">Eliminar</a>
                                                                </label>
                                                                <?php //echo $r->__GET('intidalumno'); ?>
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
    </form>

    <style>
      html{
        margin-top:0px;
      }
    </style>
<?php include('footer.php'); ?>
