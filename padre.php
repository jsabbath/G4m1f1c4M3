<?php

include('headeradmin.php');

require_once 'padre.entidad.php';
require_once 'padre.model.php';

$buttonname = 'Registrar';

// Logica
$pad = new Padre();
$model = new PadreModel();

  if(isset($_REQUEST['action']))
  {
    switch($_REQUEST['action'])
    {
      case 'actualizar':
        $pad->__SET('intidpadre',$_REQUEST['intidpadre']);
        $pad->__SET('intdnipadre',$_REQUEST['intdnipadre']);
        $pad->__SET('nvchnombre',$_REQUEST['nvchnombre']);
        $pad->__SET('nvchapellidos',$_REQUEST['nvchapellidos']);
        $pad->__SET('nvchcorreo',$_REQUEST['nvchcorreo']);
        $pad->__SET('nvchcelular',$_REQUEST['nvchcelular']);
        $pad->__SET('intidhijo',$_REQUEST['intidhijo']);

        $model->Actualizar($pad);
        header('Location: padre.php');
        break;

      case 'registrar':
        $buttonname = 'Registrar';

        $pad->__SET('intidpadre',$_REQUEST['intidpadre']);
        $pad->__SET('intdnipadre',$_REQUEST['intdnipadre']);
        $pad->__SET('nvchnombre',$_REQUEST['nvchnombre']);
        $pad->__SET('nvchapellidos',$_REQUEST['nvchapellidos']);
        $pad->__SET('nvchcorreo',$_REQUEST['nvchcorreo']);
        $pad->__SET('nvchcelular',$_REQUEST['nvchcelular']);
        $pad->__SET('intidhijo',$_REQUEST['intidhijo']);

        $model->Registrar($pad);
        header('Location: padre.php');
        break;

      case 'eliminar':
        echo "<script>alert('Registro Eliminado con exito!!!');</script>";
        $model->Eliminar($_REQUEST['intidpadre']);
        header('Location: padre.php');
        break;

      case 'editar':
        $buttonname = 'Actualizar';
        $pad = $model->Obtener($_REQUEST['intidpadre']);
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
    <form action="?action=<?php echo $pad->intidpadre > 0 ? 'actualizar' : 'registrar'; ?>" method="post">
      <div class="content">
          <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Registro de padres</h4>
                    </div>
                    <div class="content">
                        <form>
                            <div class="row">
                                <input type="hidden" name="intidpadre" value="<?php echo $pad->__GET('intidpadre'); ?>" />
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DNI/Padre</label>
                                        <input type="text" class="form-control" id="" name="intdnipadre" value="<?php echo $pad->__GET('intdnipadre'); ?>" required>
                                    </div>        
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombres</label>
                                        <input type="text" class="form-control" id="" name="nvchnombre" value="<?php echo $pad->__GET('nvchnombre'); ?>" required>
                                    </div>        
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input type="text" class="form-control" id="" name="nvchapellidos" value="<?php echo $pad->__GET('nvchapellidos'); ?>" required>
                                    </div>        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Correo</label>
                                        <input type="text" class="form-control" id="" name="nvchcorreo" value="<?php echo $pad->__GET('nvchcorreo'); ?>" required>
                                    </div>        
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Celular</label>
                                        <input type="text" class="form-control" id="" name="nvchcelular" value="<?php echo $pad->__GET('nvchcelular'); ?>" required>
                                    </div>        
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>DNI hijo</label>
                                        <input type="text" class="form-control" id="" name="intidhijo" value="<?php echo $pad->__GET('intidhijo'); ?>" required>
                                    </div>        
                                </div>
                            </div>
                                
                            <button type="submit" class="btn btn-info btn-fill pull-right"><?php echo $buttonname; ?></button>
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
                              <h4 class="title">Tabla de Padres</h4>
                          </div>
                          <div class="content">
                              <div class="container-fluid">
                                  <div class="row">    
                                      <div class="col-md-12">
                                          <div class="card card-plain">
                                              <div class="content table-responsive table-full-width">
                                                  <table class="table table-hover">
                                                      <thead>
                                                          <th>ID</th>
                                                          <th>DNI padre</th>
                                                          <th>Nombre/Apellidos</th>
                                                          <th>Correo</th>
                                                          <th>Celular</th>
                                                          <th>DNI HIJO</th>
                                                      </thead>
                                                      <?php foreach($model->Listar() as $r): ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $r->__GET('intidpadre'); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $r->__GET('intdnipadre'); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $r->__GET('nvchnombre'); ?> 
                                                                <?php echo $r->__GET('nvchapellidos'); ?>
                                                            </td>
                                                            <td><?php echo $r->__GET('nvchcorreo'); ?></td>
                                                            <td><?php echo $r->__GET('nvchcelular'); ?></td>
                                                            <td>
                                                                <?php echo $r->__GET('intidhijo'); ?>
                                                            </td>
                                                            <td>
                                                                <a href="?action=editar&intidpadre=<?php echo $r->intidpadre; ?>">Editar</a>
                                                                <br>
                                                                <a href="?action=eliminar&intidpadre=<?php echo $r->intidpadre; ?>">Eliminar</a>
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
      </div>
    </form>
    <style>
      html{
        margin-top:-20px;
      }
    </style>
<?php include('footer.php'); ?>