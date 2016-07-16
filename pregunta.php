<?php
  include('headerdocente.php');

require_once 'pregunta.entidad.php';
require_once 'pregunta.model.php';

$buttonname = 'Registrar';
// Logica
$preg = new Pregunta();
$model = new PreguntaModel();


//dame tareas para el combobox
function dametarea(){
    $consulta_mysql="
    SELECT
      tb_tarea.intidtarea,
      tb_tarea.nvchtarea
    FROM
      tb_tarea
    ";
    $resultado_consulta_mysql=mysql_query($consulta_mysql);
    while($registro = mysql_fetch_array($resultado_consulta_mysql)){
        echo "
              <option value='".$registro['intidtarea']."'>
                ".$registro['nvchtarea']."
              </option>
        ";
    }
}
//end dame tareas para el combobox

if(isset($_REQUEST['action']))
{
  switch($_REQUEST['action'])
  {
    case 'actualizar':
      $preg->__SET('intidpregunta',$_REQUEST['intidpregunta']);
      $preg->__SET('intidtarea',$_REQUEST['intidtarea']);
      $preg->__SET('nvchpregunta',$_REQUEST['nvchpregunta']);
      $preg->__SET('nvchdescripcion',$_REQUEST['nvchdescripcion']);
      $preg->__SET('chrhabilitado',$_REQUEST['chrhabilitado']);

      $model->Actualizar($preg);
      header('Location: pregunta.php');
      break;

    case 'registrar':
      //$preg->__SET('intidpregunta',$_REQUEST['intidpregunta']);
      $preg->__SET('intidtarea',$_REQUEST['intidtarea']);
      $preg->__SET('nvchpregunta',$_REQUEST['nvchpregunta']);
      $preg->__SET('nvchdescripcion',$_REQUEST['nvchdescripcion']);
      $preg->__SET('chrhabilitado',$_REQUEST['chrhabilitado']);

      $model->Registrar($preg);
      header('Location: pregunta.php');
      break;

    case 'eliminar':
      $model->Eliminar($_REQUEST['intidpregunta']);
      header('Location: pregunta.php');
      break;

    case 'editar':
      $preg = $model->Obtener($_REQUEST['intidpregunta']);
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
    <form action="?action=<?php echo $preg->intidpregunta > 0 ? 'actualizar' : 'registrar'; ?>" method="post">
      <div class="content">
          <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div style="margin-top:10px">
                    </div>
                    <div class="header">
                        <h4 class="title">Registro de preguntas del tema: </h4>
                    </div>
                    <div class="content">
                        <form action="?action=<?php echo $preg->intidpregunta > 0 ? 'actualizar' : 'registrar'; ?>" method="post">
                            <div class="row">
                                <input type="hidden" name="intidpregunta" value="<?php echo $preg->__GET('intidpregunta'); ?>" />
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Id tarea</label>
                                        <!--input type="text" class="form-control" id="" name="intidtarea" value="<?php echo $preg->__GET('intidtarea'); ?>"-->
                                        <select name="intidtarea" class="form-control" id="">
                                          <?php dametarea(); ?>
                                        </select>
                                    </div>        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pregunta</label>
                                        <input type="text" class="form-control" id="" name="nvchpregunta" value="<?php echo $preg->__GET('nvchpregunta'); ?>" placeholder='Ingrese la pregunta' required>
                                    </div>        
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">descripción</label>
                                        <input type="text" placeholder='Ingrese una descripción opcional' class="form-control" id="" name="nvchdescripcion" value="<?php echo $preg->__GET('nvchdescripcion'); ?>" required>
                                    </div>        
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>estado</label>
                                        <select class='form-control' name="chrhabilitado" style="width:100%;" required>
                                            <option value="A" <?php echo $preg->__GET('chrhabilitado') == 'A' ? 'selected' : ''; ?>>Habilitado</option>
                                            <option value="D" <?php echo $preg->__GET('chrhabilitado') == 'D' ? 'selected' : ''; ?>>Desabilitado</option>
                                        </select>
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right"><?php echo $buttonname; ?>
                            </button>
                            <a style='margin-right: 10px' type="submit" href="pregunta.php" class="btn btn-success btn-fill pull-right">LIMPIAR
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
                              <h4 class="title">Tabla de Preguntas</h4>
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
                                                          <th style="text-align:left;">tarea</th>
                                                          <th style="text-align:left;">descripcion</th>
                                                          <th style="text-align:left;">Pregunta</th>
                                                          <th style="text-align:left;">Estado</th>
                                                          <th style="text-align:left;">Opciones</th>
                                                        </tr>
                                                      </thead>
                                                        <?php foreach($model->Listar() as $r): ?>
                                                          <tr>
                                                              <td>
                                                                <label for="">
                                                                  <?php echo $r->__GET('intidtarea'); ?>
                                                                </label>
                                                              </td>
                                                              <td>
                                                                <label for="">
                                                                  <?php echo $r->__GET('nvchdescripcion'); ?>
                                                                </label>
                                                              </td>
                                                              <td>
                                                                <label for="">
                                                                  <?php echo $r->__GET('nvchpregunta'); ?>
                                                                </label>
                                                              </td>
                                                              
                                                              <td>

                                                                  <?php $bthbltd = $r->__GET('chrhabilitado');
                                                                      if ($bthbltd == 'a' || $bthbltd == 'A') {
                                                                          echo "<label> Activado</label>";
                                                                      } else
                                                                      if ($bthbltd == 'd' || $bthbltd == 'D') {
                                                                          echo "<label>Desactivado</label>";
                                                                      } else{
                                                                          echo "-";
                                                                      }
                                                                  ?>
                                                              </td>
                                                              <td>
                                                                  <label for="">
                                                                    <a class="label label-success" style ='font-size: 10px' href="?action=editar&intidpregunta=<?php echo $r->intidpregunta; ?>">Editar</a>
                                                                  </label>
                                                                  <label for="">
                                                                    <a class="label label-danger" style ='font-size: 10px' href="?action=eliminar&intidpregunta=<?php echo $r->intidpregunta; ?>">Eliminar</a>
                                                                  </label>
                                                                  <label for="">
                                                                    <a class="label label-info" style ='font-size: 10px' href="respuesta.php?intidpregunta=<?php echo $r->intidpregunta; ?>">+ 
                                                                    respuesta(s)</a>
                                                                  </label>
                                                                  <?php //echo $r->__GET('intidpregunta'); ?>
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
    margin-top:0;
  }
</style>
<?php include('footer.php'); ?>