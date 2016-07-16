<?php
  include('headerdocente.php');
//include_once('varprgnt.php');
    function dametop(){
        $consulta_mysql="
        SELECT 
        persona.nvchnombre,
        persona.chrtipopersona,
        persona.nvchapellido,
        sum(tb_pers_resp.punto) AS punto,
        sum(tb_pers_resp.moro) AS moro,
        sum(tb_pers_resp.mplata) AS mplata,
        sum(tb_pers_resp.mbronce) AS mbronce,
        sum(tb_pers_resp.toro) AS toro,
        sum(tb_pers_resp.tplata) AS tplata, 
        sum(tb_pers_resp.tbronce) AS tbronce
        FROM `tb_pers_resp` 
        inner join persona on persona.nvchidpersona = tb_pers_resp.inpers
        where persona.chrtipopersona ='1' 
        GROUP by tb_pers_resp.inpers 
        ORDER BY tb_pers_resp.punto DESC
        ";
        $resultado_consulta_mysql=mysql_query($consulta_mysql);
        while($registro = mysql_fetch_array($resultado_consulta_mysql)){
            echo "
                <tr>
                    <td><label>".$registro['nvchnombre']." ".$registro['nvchapellido']."</label></td>
                    <td><label>".$registro['punto']."</label></td>
                    <td><label>".$registro['moro']."</label></td>
                    <td><label>".$registro['mplata']."</label></td>
                    <td><label>".$registro['mbronce']."</label></td>
                    <td><label>".$registro['toro']."</label></td>
                    <td><label>".$registro['tplata']."</label></td>
                    <td><label>".$registro['tbronce']."</label></td>
                    <!--td>
                        <label>
                          <a class='label label-success' href=''>Escribirle un mensaje</a>
                        </label>
                    </td-->
                </tr>
            ";
        }
    }
//dame tareas para el combobox
function damealumnos(){
    $consulta_mysql="SELECT persona.nvchidpersona,persona.nvchdni,persona.nvchapellido,persona.nvchnombre from persona where persona.chrtipopersona = '1'";
    $resultado_consulta_mysql=mysql_query($consulta_mysql);
    while($registro = mysql_fetch_array($resultado_consulta_mysql)){
        echo "
            <option style='font-size:15px; margin:5px; text-transform:uppercase;' value='".$registro['nvchidpersona']."'>
              ".$registro['nvchdni']." - ".$registro['nvchapellido'].", ".$registro['nvchnombre']."
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
    <form action="addpnt.php"  method="post">
      <div class="content">
          <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div style="margin-top:10px">
                    </div>
                    <div class="header" style="text-transform:uppercase; text-align:center;margin-bottom:10px;margin-top:10px">
                        <h4 class="title" style='margin-top: 20px'>Premios y reonocimientos por ezfuerzo </h4>
                    </div>
                    <div class="content">
                        <form action="addpnt.php" method="POST">
                            <div class="row">
                                <!--input type="hidden" name="intidrespuesta" value="<?php //echo $rsp->__GET('intidrespuesta'); ?>" /-->
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>DNI - Apellido, Nombres del Alumno</label>
                                        <!--input type="text" class="form-control" id="" name="intidpregunta" value="<?php //echo $rsp->__GET('intidpregunta'); ?>" required-->
                                        <select style="text-transform:uppercase" name="cdlmn" class="form-control">
                                          <?php damealumnos(); ?>
                                        </select>
                                    </div>        
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>(+) Puntos XP</label>
                                        <input type="number" class="form-control" id="" name="pnts" value="0" required>
                                    </div>        
                                </div>
                            </div>
                            
                            <div class="row">
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>(+) Medalla Alumno Listo</label>
                                        <input type="number" class="form-control" id="" name="trfr" value="0" required>
                                    </div>        
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>(+) Medalla Alumno Curioso</label>
                                        <input type="number" class="form-control" id="" name="trfplt" value="0" required>
                                    </div>        
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>(+) Medalla Alumno Participador</label>
                                        <input type="number" class="form-control" id="" name="trfbrnc" value="0" required>
                                    </div>        
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>(+) Trofeo regalo de oro</label>
                                        <input type="number" class="form-control" id="" name="mdllr" value="0" required>
                                    </div>        
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>(+) trofeo regalo de plata</label>
                                        <input type="number" class="form-control" id="" name="mdllplt" value="0" required>
                                    </div>        
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>(+) trofeo regalo de bronce</label>
                                        <input type="number" class="form-control" id="" name="mdllbrnc" value="0" required>
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">agregar
                            </button>
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
                              <h4 class="title" style="text-align:center; margin-top:20px">Tabla de alumnos</h4>
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
                                                                  <th>puntos</th>
                                                                  <th>Trof. Oro</th>
                                                                  <th>Trof. Plata</th>
                                                                  <th>Trof. Bronce</th>
                                                                  <th>Med. Listo</th>
                                                                  <th>Med. Curioso</th>
                                                                  <th>Med. PAricipador</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                                <?php dametop(); ?>
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
    </form>
<style>
  html{
    margin-top:0px !important;
  }
</style>
<?php include('footer.php'); ?>