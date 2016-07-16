<?php

require_once 'padre.entidad.php';
require_once 'padre.model.php';

// Logica
$pad = new Padre();
$model = new PadreModel();

if(isset($_REQUEST['action']))
{
  switch($_REQUEST['action'])
  {
    case 'actualizar':
      $pad->__SET('intidpadre',$_REQUEST['intidpadre']);
      $pad->__SET('nvchnombre',$_REQUEST['nvchnombre']);
      $pad->__SET('nvchapellidos',$_REQUEST['nvchapellidos']);
      $pad->__SET('nvchcorreo',$_REQUEST['nvchcorreo']);
      $pad->__SET('nvchcelular',$_REQUEST['nvchcelular']);
      $pad->__SET('intidhijo',$_REQUEST['intidhijo']);

      $model->Actualizar($pad);
      header('Location: padre.php');
      break;

    case 'registrar':
      $pad->__SET('intidpadre',$_REQUEST['intidpadre']);
      $pad->__SET('nvchnombre',$_REQUEST['nvchnombre']);
      $pad->__SET('nvchapellidos',$_REQUEST['nvchapellidos']);
      $pad->__SET('nvchcorreo',$_REQUEST['nvchcorreo']);
      $pad->__SET('nvchcelular',$_REQUEST['nvchcelular']);
      $pad->__SET('intidhijo',$_REQUEST['intidhijo']);

      $model->Registrar($pad);
      header('Location: padre.php');
      break;

    case 'eliminar':
      $model->Eliminar($_REQUEST['intidpadre']);
      header('Location: padre.php');
      break;

    case 'editar':
      $pad = $model->Obtener($_REQUEST['intidpadre']);
      break;
  }
}

?>
  <div class="templatemo-content-wrapper">
    <div class="templatemo-content">
      <h1>Registro Registro Padres</h1>
      <p>Panel de control de registros de Clinica, rellene los campos requeridos para poder crear un evento, considere que un evento p.</p>
      <div class="templatemo-panels">
      
        <form action="?action=<?php echo $pad->intidpadre > 0 ? 'actualizar' : 'registrar'; ?>" method="post">
          <div class="row">
             <input type="" name="intidpadre" value="<?php echo $pad->__GET('intidpadre'); ?>" />
                    
              <div class="col-md-7 margin-bottom-15">
                <label for="" class="control-label">Nombre</label>
                <input type="text" class="form-control" id="" name="nvchnombre" value="<?php echo $pad->__GET('nvchnombre'); ?>" required>
              </div>
          </div>
          <div class="row">
            <div class="col-md-6 margin-bottom-15">
                <label for="" class="control-label">nvchapellido</label>
                <input type="text" class="form-control" id="" name="nvchapellidos" value="<?php echo $pad->__GET('nvchapellidos'); ?>" required>
              </div>
              <div class="col-md-6 margin-bottom-15">
                <label for="" class="control-label">Correo</label>
                <input type="text" class="form-control" id="" name="nvchcorreo" value="<?php echo $pad->__GET('nvchcorreo'); ?>" required>
              </div>
          </div>
          <div class="row">
                <div class="col-md-6 margin-bottom-15">
                  <label for="firstName" class="control-label">celular</label>
                  <input type="text" class="form-control" id="" name="nvchcelular" value="<?php echo $pad->__GET('nvchcelular'); ?>" required>
                </div>                
          </div>
          <div class="row">
                <div class="col-md-6 margin-bottom-15">
                  <label for="firstName" class="control-label">hijo</label>
                  <input type="text" class="form-control" id="" name="intidhijo" value="<?php echo $pad->__GET('intidhijo'); ?>" required>
                </div>                
          </div>
          <div class="row">
            <div class="col-md-6 margin-bottom-15">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a href="padre.php" class="btn btn-primary">limpiar</a>
            </div>
          </div>
        </form>
        
        <!--tabla-->
        <div class="row">  
          <div class="col-md-12 col-sm-12 margin-bottom-30">
            <div class="panel panel-primary">
              <div class="panel-heading">Tabla de Padres</div>
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
                        <td><?php echo $r->__GET('intidpadre'); ?></td>
                        <td>
                            <?php echo $r->__GET('nvchnombre'); ?>/
                            <?php echo $r->__GET('nvchapellidos'); ?>
                        </td>
                        <td><?php echo $r->__GET('nvchcorreo'); ?></td>
                        <td><?php echo $r->__GET('nvchcelular'); ?></td>
                        <td><?php echo $r->__GET('intidhijo'); ?></td>
                        <td>
                            <a href="?action=editar&intidpadre=<?php echo $r->intidpadre; ?>">Editar</a>
                            <br>
                            <a href="?action=eliminar&intidpadre=<?php echo $r->intidpadre; ?>">Eliminar</a>
                            <?php echo $r->__GET('intidpadre'); ?>
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