<?php
  include('headeradmin.php');

  require_once 'alumno.entidad.php';
  require_once 'alumno.model.php';

  $buttonname = 'Registrar';
  // Logica
  $alum = new Alumno();
  $model = new AlumnoModel();

  if(isset($_REQUEST['action']))
  {
    switch($_REQUEST['action'])
    {
      case 'actualizar':
        $alum->__SET('intidalumno',$_REQUEST['intidalumno']);
        $alum->__SET('nvchnombre',$_REQUEST['nvchnombre']);
        $alum->__SET('nvchapellido',$_REQUEST['nvchapellido']);
        $alum->__SET('nvchalias',$_REQUEST['nvchalias']);
        $alum->__SET('chrgenero',$_REQUEST['chrgenero']);
        $alum->__SET('nvchcorreo',$_REQUEST['nvchcorreo']);
        $alum->__SET('nvchcelular',$_REQUEST['nvchcelular']);
        $alum->__SET('nvchtelefono',$_REQUEST['nvchtelefono']);
        $alum->__SET('nvchfoto',$_REQUEST['nvchfoto']);
        $alum->__SET('nvchinteresas',$_REQUEST['nvchinteresas']);
        $alum->__SET('vchimg',$_REQUEST['vchimg']);
        $alum->__SET('vchimgbanner',$_REQUEST['vchimgbanner']);

        $model->Actualizar($alum);
        header('Location: alumno.php');
        break;

      case 'registrar':
        $buttonname = 'Registrar';

        $alum->__SET('nvchnombre',$_REQUEST['nvchnombre']);
        $alum->__SET('nvchapellido',$_REQUEST['nvchapellido']);
        $alum->__SET('nvchalias',$_REQUEST['nvchalias']);
        $alum->__SET('chrgenero',$_REQUEST['chrgenero']);
        $alum->__SET('nvchcorreo',$_REQUEST['nvchcorreo']);
        $alum->__SET('nvchcelular',$_REQUEST['nvchcelular']);
        $alum->__SET('nvchtelefono',$_REQUEST['nvchtelefono']);
        $alum->__SET('nvchfoto',$_REQUEST['nvchfoto']);
        $alum->__SET('nvchinteresas',$_REQUEST['nvchinteresas']);
        $alum->__SET('vchimg',$_REQUEST['vchimg']);
        $alum->__SET('vchimgbanner',$_REQUEST['vchimgbanner']);


        $model->Registrar($alum);
        header('Location: alumno.php');
        break;

      case 'eliminar':
        echo "<script>alert('Registro Eliminado con exito!!!');</script>";
        $model->Eliminar($_REQUEST['intidalumno']);
        header('Location: alumno.php');
        break;

      case 'editar':
        $buttonname = 'Actualizar';
        $alum = $model->Obtener($_REQUEST['intidalumno']);
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
                      <div class="header">
                          <h4 class="title">Registro de alumnos</h4>
                      </div>
                      <div class="content">
                          <form>
                              <div class="row">
                                  <input type="hidden" name="intidalumno" value="<?php echo $alum->__GET('intidalumno'); ?>" />
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Nombres</label>
                                          <input type="text" class="form-control" id="" name="nvchnombre" value="<?php echo $alum->__GET('nvchnombre'); ?>" required>
                                      </div>        
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Apellidos</label>
                                          <input type="text" class="form-control" id="" name="nvchapellido" value="<?php echo $alum->__GET('nvchapellido'); ?>" required>
                                      </div>        
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Genero</label>
                                            <select name="Sexo" style="width:100%;" required>
                                                <option value="M" <?php echo $alum->__GET('chrgenero') == 1 ? 'selected' : ''; ?>>Masculino</option>
                                                <option value="F" <?php echo $alum->__GET('chrgenero') == 2 ? 'selected' : ''; ?>>Femenino</option>
                                            </select>
                                      </div>        
                                  </div>
                              </div>
                              
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Seudonimo</label>
                                          <input type="text" class="form-control" id="" name="nvchalias" value="<?php echo $alum->__GET('nvchalias'); ?>" required>
                                      </div>        
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Correo</label>
                                          <input type="text" class="form-control" id="" name="nvchcorreo" value="<?php echo $alum->__GET('nvchcorreo'); ?>" required>
                                      </div>        
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Celular</label>
                                          <input type="text" class="form-control" id="" name="nvchcelular" value="<?php echo $alum->__GET('nvchcelular'); ?>" required>
                                      </div>        
                                  </div>
                              </div>
                              
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Teléfono</label>
                                          <input type="text" class="form-control" id="" type="date"  name="nvchtelefono" value="<?php echo $alum->__GET('nvchtelefono'); ?>" required>
                                      </div>        
                                  </div>
                              </div>
                              
                              <div class="row">
                                  <div class="hidden col-md-4">
                                      <div class="form-group">
                                          <label>foto</label>
                                          <input type="text" class="form-control" name="nvchfoto" value="<?php echo $alum->__GET('nvchfoto'); ?>" >
                                      </div>        
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Intereses</label>
                                          <input type="text"  class="form-control" name="nvchinteresas" value="<?php echo $alum->__GET('nvchinteresas'); ?>">
                                      </div>        
                                  </div>
                                  <div class="hidden col-md-4">
                                      <div class="form-group">
                                          <label>Imagen</label>
                                          <input type="text"  class="form-control" name="vchimg" value="<?php echo $alum->__GET('vchimg'); ?>" disabled>
                                      </div>        
                                  </div>
                              </div>
                              
                              <div class="row">
                                  <div class=" hidden col-md-12">
                                      <div class="form-group">
                                          <label>Baner</label>
                                          <input type="text"  class="form-control" name="vchimgbanner" value="<?php echo $alum->__GET('vchimgbanner'); ?>" disabled>
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
            <!--TABLA-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Tabla de Alumnos</h4>
                        </div>
                        <div class="content">
                            <div class="container-fluid">
                                <div class="row">    
                                    <div class="col-md-12">
                                        <div class="card card-plain">
                                            <div class="content table-responsive table-full-width">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <th>Nombres</th>
                                                        <th>Genero</th>
                                                        <th>Seudonimo</th>
                                                        <th>Correo</th>
                                                        <th>Celular/Telefono</th>
                                                        <th>Interes</th>
                                                        <th>Opciones</th>
                                                    </thead>
                                                    <?php foreach($model->Listar() as $r): ?>
                                                      <tr>
                                                          <!--td><?php //echo $r->__GET('intidalumno'); ?></td-->
                                                          <td>
                                                              <?php echo $r->__GET('nvchnombre'); ?> 
                                                              <?php echo $r->__GET('nvchapellido'); ?>
                                                          </td>
                                                          <td>
                                                            <?php echo $r->__GET('chrgenero') == 1 ? 'H' : 'F'; ?>
                                                          </td>
                                                          <td><?php echo $r->__GET('nvchalias'); ?></td>
                                                          <td><?php echo $r->__GET('nvchcorreo'); ?></td>
                                                          <td>
                                                              <?php echo $r->__GET('nvchcelular'); ?>/
                                                              <?php echo $r->__GET('nvchtelefono'); ?>
                                                          </td>
                                                          <!--td>
                                                            <?php $imgen = $r->__GET('nvchfoto'); 
                                                              //echo $imgenfacealum;
                                                              echo "<img src='../assets/img/faces/".$imgen."' alt=''>";
                                                            ?>
                                                          </td-->
                                                          <td><?php echo $r->__GET('nvchinteresas'); ?></td>
                                                          <!--td>
                                                            <?php 
                                                              //echo $r->__GET('vchimg'); 
                                                              $imgenfacealum = $r->__GET('vchimg'); 
                                                              //echo $imgenfacealum;
                                                              echo "<img src='../assets/img/faces/".$imgenfacealum."' alt='' width='120' >";
                                                            ?>
                                                          </td-->
                                                          <!--td>
                                                            <?php 
                                                              //echo $r->__GET('vchimgbanner'); 
                                                              //echo $r->__GET('vchimg'); 
                                                              $imgenbanner = $r->__GET('vchimgbanner'); 
                                                              //echo $imgenfacealum;
                                                              echo "<img src='../assets/img/banner/".$imgenbanner."' width='120' alt=''>";
                                                            ?>
                                                          </td-->
                                                          <td>
                                                              <a href="?action=editar&intidalumno=<?php echo $r->intidalumno; ?>">Editar</a>
                                                              <br>
                                                              <a href="?action=eliminar&intidalumno=<?php echo $r->intidalumno; ?>">Eliminar</a>
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
            <!--end TABLA-->       
          </div>
      </div>
    </form>
<?php include('footer.php'); ?>