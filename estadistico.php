<?php   include('headeradmin.php'); ?>
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
    <form action="" method="post" class="pure-form pure-form-stacked">
      <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                  <div class="card">
                    <div style="margin-top:10px">
                    </div>
                    <div class="header">
                        <h4 class="title">Registro de Alumnos/docente/director/padre</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                          <div class="row">
                          <div class="col-md-6">
                            <!-- AREA CHART -->
                            <div class="box box-primary">
                              <div class="box-header with-border">
                                <h3 class="box-title">Area Chart</h3>
                                <div class="box-tools pull-right">
                                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                              </div>
                              <div class="box-body">
                                <div class="chart">
                                  <canvas id="areaChart" style="height:250px"></canvas>
                                </div>
                              </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <!-- DONUT CHART -->
                            <div class="box box-danger">
                              <div class="box-header with-border">
                                <h3 class="box-title">Donut Chart</h3>
                                <div class="box-tools pull-right">
                                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                              </div>
                              <div class="box-body">
                                  <canvas id="pieChart" style="height:250px"></canvas>
                              </div><!-- /.box-body -->
                            </div><!-- /.box -->
                          </div><!-- /.col (LEFT) -->
                          <div class="col-md-6">
                            <!-- LINE CHART -->
                            <div class="box box-info">
                              <div class="box-header with-border">
                                <h3 class="box-title">Line Chart</h3>
                                <div class="box-tools pull-right">
                                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                              </div>
                              <div class="box-body">
                                <div class="chart">
                                  <canvas id="lineChart" style="height:250px"></canvas>
                                </div>
                              </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <!-- BAR CHART -->
                            <div class="box box-success">
                              <div class="box-header with-border">
                                <h3 class="box-title">Bar Chart</h3>
                                <div class="box-tools pull-right">
                                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                              </div>
                              <div class="box-body">
                                <div class="chart">
                                  <canvas id="barChart" style="height:230px"></canvas>
                                </div>
                              </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            </div><!-- /.col (RIGHT) -->
                          </div><!-- /.row -->
                        </div>
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
                          <h4 class="title" style="text-align:center">Tabla de Registros</h4>
                      </div>
                      <div class="content">
                          <div class="container-fluid">
                              <div class="row">    
                                  <div class="col-md-12">
                                      <div class="card card-plain">
                                          <div class="content table-responsive table-full-width">
                                              <table class="table table-hover">
                                                  <thead>
                                                      <th>DNI</th>
                                                      <th>Nombre/Apellido</th>
                                                      <th>Correo</th>
                                                      <th>Sexo</th>
                                                      <th>Tipo</th>
                                                      <th>dnihijo</th>
                                                      <th>Nacimiento</th>
                                                      <!--th>Fecha registro</th-->
                                                      <th>Opciones</th>
                                                  </thead>
                                                  <tbody>
                                                    <?php foreach($model->Listar() as $r): ?>
                                                        <tr>
                                                            <td>
                                                                <label ><?php echo $r->__GET('nvchdni'); ?></td></label>
                                                            <td>    
                                                                <label ><?php echo $r->__GET('nvchnombre'); ?> <?php echo $r->__GET('nvchapellido'); ?></label >
                                                            </td>
                                                            <td>
                                                                <label><?php echo $r->__GET('nvchcorreo'); ?></label>
                                                            </td>
                                                            <td>
                                                                <label><?php echo $r->__GET('chrgenero') == 1 ? 'Varon' : 'Mujer'; ?></label>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                <?php $tpprs = $r->__GET('chrtipopersona');
                                                                    if ($tpprs == 1) {
                                                                        echo "Alumno";
                                                                    } else
                                                                    if ($tpprs == 2) {
                                                                        echo "Padre";
                                                                    } else
                                                                    if ($tpprs == 3) {
                                                                        echo "Docente";
                                                                    }else{
                                                                        echo "-";
                                                                    }
                                                                ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label><?php $dnihijo = $r->__GET('nvchdnihijo'); 
                                                                    if ($dnihijo) {
                                                                        echo $dnihijo;
                                                                    } else {
                                                                        echo "--";
                                                                    }
                                                                    
                                                                ?></label>
                                                            </td>
                                                            <td><label><?php echo $r->__GET('dtnacimiento'); ?></label></td>
                                                            <!--td><?php //echo $r->__GET('dtregistro'); ?></td-->
                                                            <td>
                                                                <label>
                                                                  <a class="label label-success" style ='font-size: 10px' href="?action=editar&nvchidpersona=<?php echo $r->nvchidpersona; ?>">Editar</a>
                                                                </label>
                                                                <!--label>  
                                                                  <a  class="label label-danger" style ='font-size: 10px' href="?action=eliminar&nvchidpersona=<?php echo $r->nvchidpersona; ?>">Eliminar</a>
                                                                </label-->
                                                                <label>
                                                                  <a  class="label label-info" style ='font-size: 10px' href="perfil.php?id=<?php echo $r->nvchidpersona; ?>">Ver Perfil</a>
                                                                </label>
                                                                  
                                                            </td>
                                                            <td>
                                                                <!--p>id=<?php echo $r->nvchidpersona; ?></p-->
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div>   
                              </div>
                              <div class="row" style="margin-bottom:20px">
                                  <div class="col-md-12">
                                    <a href="listaalumnos.php" class="btn btn-info btn-fill pull-right" >
                                      <i class='pe-7s-download'></i> PDF Alumnos</a>
                                    <a href="listapadres.php"  style='margin-right: 5px' class="btn btn-alert btn-fill pull-right" >
                                      <i class='pe-7s-download'></i> PDF Padres </a>
                                    <a href="listadocentes.php"  style='margin-right: 5px' class="btn btn-danger btn-fill pull-right" >
                                      <i class='pe-7s-download'></i> PDF Docentes </a>
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
            margin-top: -20px;
        }
    </style>
<?php include('footer.php'); ?>