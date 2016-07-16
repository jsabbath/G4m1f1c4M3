<?php
  include('headerdocente.php');
//include_once('varprgnt.php');

//dame tareas para el combobox
function damepregunta(){
    $consulta_mysql="SELECT tb_pregunta.intidpregunta,tb_pregunta.nvchdescripcion,tb_pregunta.nvchpregunta from tb_pregunta";
    $resultado_consulta_mysql=mysql_query($consulta_mysql);
    while($registro = mysql_fetch_array($resultado_consulta_mysql)){
        echo "
            <option style='font-size:15px; margin:5px' value='".$registro['intidpregunta']."'>
              ".$registro['nvchdescripcion']."-".$registro['nvchpregunta']."
            </option>
        ";
    }
}
//end dame tareas para el combobox



//definiendo la estructura del mvc
require_once 'respuesta.entidad.php';
require_once 'respuesta.model.php';

$buttonname = 'Registrar';
// Logica
$rsp = new Respuesta();
$model = new RespuestaModel();

if(isset($_REQUEST['action']))
{
  switch($_REQUEST['action'])
  {
    case 'actualizar':
      $rsp->__SET('intidrespuesta',$_REQUEST['intidrespuesta']);
      $rsp->__SET('intidpregunta',$_REQUEST['intidpregunta']);
      $rsp->__SET('nvchrespuesta',$_REQUEST['nvchrespuesta']);
      $rsp->__SET('chrvf',$_REQUEST['chrvf']);

      $model->Actualizar($rsp);
      header('Location: respuesta.php');
      break;

    case 'registrar':
      //$preg->__SET('intidpregunta',$_REQUEST['intidpregunta']);
      $rsp->__SET('intidpregunta',$_REQUEST['intidpregunta']);
      $rsp->__SET('nvchrespuesta',$_REQUEST['nvchrespuesta']);
      $rsp->__SET('chrvf',$_REQUEST['chrvf']);

      $model->Registrar($rsp);
      header('Location: respuesta.php');
      break;

    case 'eliminar':
      $model->Eliminar($_REQUEST['intidrespuesta']);
      header('Location: respuesta.php');
      break;

    case 'editar':
      $rsp = $model->Obtener($_REQUEST['intidrespuesta']);
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
    <form action="?action=<?php echo $rsp->intidrespuesta > 0 ? 'actualizar' : 'registrar'; ?>" method="post">
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
                        <form action="?action=<?php echo $rsp->intidrespuesta > 0 ? 'actualizar' : 'registrar'; ?>" method="post">
                            <div class="row">
                                <input type="hidden" name="intidrespuesta" value="<?php echo $rsp->__GET('intidrespuesta'); ?>" />
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>ID pregunta</label>
                                        <!--input type="text" class="form-control" id="" name="intidpregunta" value="<?php echo $rsp->__GET('intidpregunta'); ?>" required-->
                                        <select name="intidpregunta" class="form-control">
                                          <?php damepregunta(); ?>
                                        </select>
                                    </div>        
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Respuesta</label>
                                        <input type="text" class="form-control" id="" name="nvchrespuesta" value="<?php echo $rsp->__GET('nvchrespuesta'); ?>" required>
                                    </div>        
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Valor</label>

                                        <select class='form-control' name="chrvf" style="width:100%;" required>
                                            <option value="1" <?php echo $rsp->__GET('chrvf') == 1 ? 'selected' : ''; ?>>Correcto</option>
                                            <option value="0" <?php echo $rsp->__GET('chrvf')== 0 ? 'selected' : ''; ?>>Errado</option>
                                        </select>
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right"><?php echo $buttonname; ?>
                            </button>
                            <a type="submit" href="pregunta.php" class="btn btn-info btn-fill pull-right">limpiar
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
                                                        <th>ID pregunta</th>
                                                        <th class="hidden">ID respuesta</th>
                                                        <th>respuesta</th>
                                                        <th>Correcto/Falso</th>
                                                        <th>Opciones</th>
                                                      </tr>
                                                    </thead>
                                                      <?php foreach($model->Listarall() as $r): ?>
                                                        <tr>
                                                            <td>
                                                              <?php echo $r->__GET('intidpregunta'); ?>
                                                            </td>
                                                            <td class="hidden">
                                                            <?php echo $r->__GET('intidrespuesta'); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $r->__GET('nvchrespuesta'); ?>
                                                            </td>
                                                            <td>
                                                                <?php 

                                                                  $rsptvar = $r->__GET('chrvf'); 

                                                                  if ($rsptvar == '1') {
                                                                    echo "Correcto";
                                                                  } else 
                                                                  if ($rsptvar == '0') {
                                                                    echo "Falso";
                                                                  }
                                                                  
                                                                 ?>
                                                            </td>
                                                            <td>
                                                                <label for="">
                                                                  <a class="label label-success" style ='font-size: 10px' href="?action=editar&intidrespuesta=<?php echo $r->intidrespuesta; ?>">Editar</a>
                                                                </label>
                                                                <label for="">
                                                                  <a class="label label-danger" style ='font-size: 10px' href="?action=eliminar&intidrespuesta=<?php echo $r->intidrespuesta; ?>">Eliminar</a>
                                                                </label>
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
    margin-top:0px !important;
  }
</style>
<?php include('footer.php'); ?>