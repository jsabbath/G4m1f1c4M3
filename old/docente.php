<?php

include('headeradmin.php');

require_once 'docente.entidad.php';
require_once 'docente.model.php';

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
  <div class="templatemo-content-wrapper">
    <div class="templatemo-content">
      <h1>Registro Registro Docentes</h1>
      <p>Panel de control de registros de Clinica, rellene los campos requeridos para poder crear un evento, considere que un evento p.</p>
      <div class="templatemo-panels">
        <form action="?action=<?php echo $doc->intiddocente > 0 ? 'actualizar' : 'registrar'; ?>" method="post">
          <div class="row">
             <input type="hidden" name="intiddocente" value="<?php echo $doc->__GET('intiddocente'); ?>" />
              <div class="col-md-7 margin-bottom-15">
                <label for="" class="control-label">nvchnombre</label>
                <input type="text" class="form-control" id="" name="nvchnombre" value="<?php echo $doc->__GET('nvchnombre'); ?>" required>
              </div>
          </div>
          <div class="row">
            <div class="col-md-6 margin-bottom-15">
                <label for="" class="control-label">nvchapellido</label>
                <input type="text" class="form-control" id="" name="nvchapellidos" value="<?php echo $doc->__GET('nvchapellidos'); ?>" required>
              </div>
              <div class="col-md-6 margin-bottom-15">
                <label for="" class="control-label">telef</label>
                <input type="text" class="form-control" id="" name="nvchcelular" value="<?php echo $doc->__GET('nvchcelular'); ?>" required>
              </div>
          </div>
          <div class="row">
                <div class="col-md-6 margin-bottom-15">
                  <label for="firstName" class="control-label">nvchcorreo</label>
                  <input type="text" class="form-control" id="" name="nvchcorreo" value="<?php echo $doc->__GET('nvchcorreo'); ?>" required>
                </div>                
          </div>
          <div class="row">

          <div class="row">
            <div class="col-md-6 margin-bottom-15">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a href="docente.php" class="btn btn-primary">limpiar</a>
            </div>
          </div>
        </form>
        
        <!--tabla-->
        <div class="row">  
          <div class="col-md-12 col-sm-12 margin-bottom-30">
            <div class="panel panel-primary">
              <div class="panel-heading">Tabla de Docentes</div>
              <div class="panel-body">
                <table class="table table-striped">
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
            <span class="btn btn-primary"><a href="tables.html">Mas resultados</a></span>
          </div>       
        </div>
        <!--tabla-->
    </div>
  </div>
<?php include('footer.php'); ?>