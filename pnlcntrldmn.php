<?php include('headeradmin.php'); ?>

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
                    <a class="navbar-brand" href="#">Panel de control administrador</a>
                </div>
                <div class="collapse navbar-collapse">       
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                        <!--li class="dropdown">
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
                        </li-->
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
                     
                     
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <!--img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/-->   
                                <?php 
                                    echo "<img src='assets/img/banner/".$usuario_banner."'/>";
                                ?>

                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                     <?php 
                                        echo "<img class='avatar' src='assets/img/faces/".$usuario_imgperfil."'/>";
                                      ?>
                                   
                                      <h4 class="title">
                                        <?php 
                                            echo $usuario_alias;
                                        ?>
                                       <br />
                                         <small>
                                             <?php 
                                                echo $usuario_name.' '.$usuario_lastname;
                                             ?>
                                         </small>
                                      </h4> 
                                    </a>
                                </div>

                                <br>
                                <!--p class="description text-center"> 
                                    Un poco sobre mi: <br>
                                    <?php    
                                        echo $usuario_description; 
                                     ?>
                                </p-->
                                <!--div class="editperil">
                                    <a href="editperfil.php" class="btn btn-info btn-fill pull-center">Editar perfil</a>
                                    <style>
                                        .editperil{
                                            text-align: center;                
                                            margin-top:5px;
                                            margin-bottom:5px;
                                        }
                                    </style>
                                </div--> 
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>
                            </div>
                        </div>
                    </div>
                    <?php include_once('pblcrmstd.php'); ?> 
                    <!--div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Mis Trofeos</h4>
                            </div>
                                <div class="row">
                                    <div class="col-md-4" style="padding: 7px;text-align: center;">
                                        <div class="col-md-12 col-sm-6">ORO :2</div>
                                        <div class="col-md-12">
                                            <img src="assets/img/premios/medallaoro.jpg" alt="" width='70' style="align:center;">
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding: 7px;text-align: center;">
                                        <div class="col-md-12 col-sm-6">PLATA :2</div>
                                        <div class="col-md-12">
                                            <img src="assets/img/premios/medallaplata.jpg" alt="" width='70' style="align:center;">
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding: 7px;text-align: center;">
                                        <div class="col-md-12 col-sm-6">BRONCE :2</div>
                                        <div class="col-md-12">
                                            <img src="assets/img/premios/medallabronce.jpg" alt="" width='70' style="align:center;">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div-->
                    <!--div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Mis Medallas</h4>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-4" style="padding: 7px;text-align: center;">
                                        <div class="col-md-12 col-sm-6">ORO :2</div>
                                        <div class="col-md-12">
                                            <img src="assets/img/premios/oro.jpg" alt="" width='70' style="align:center;">
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding: 7px;text-align: center;">
                                        <div class="col-md-12 col-sm-6">PLATA :2</div>
                                        <div class="col-md-12">
                                            <img src="assets/img/premios/plata.jpg" alt="" width='70' style="align:center;">
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding: 7px;text-align: center;">
                                        <div class="col-md-12 col-sm-6">BRONCE :2</div>
                                        <div class="col-md-12">
                                            <img src="assets/img/premios/bronce.jpg" alt="" width='70' style="align:center;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div-->
                </div>
                <!--div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Mis Cursos</h4>
                            </div>
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">                   
                                        
                                        <div class="col-md-12">
                                            <div class="card card-plain">
                                                <div class="content table-responsive table-full-width">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <th>Curso</th>
                                                            <th>Puntos</th>
                                                            <th>Medallas</th>
                                                            <th>Docente</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>word intermedio</td>
                                                                <td>86,738</td>
                                                                <td>--</td>
                                                                <td>carlos pantoja</td>
                                                            </tr>
                                                            <tr>
                                                                <td>mi primera web</td>
                                                                <td>23,789</td>
                                                                <td>Platino</td>
                                                                <td>Inuyasha</td>
                                                            </tr>
                                                            <tr>
                                                                <td>dibujo</td>
                                                                <td>96,142</td>
                                                                <td>Safiro</td>
                                                                <td>Carlin carlos</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Soceidad actual</td>
                                                                <td>$38,735</td>
                                                                <td>ORO</td>
                                                                <td>Overland Park</td>
                                                            </tr>
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
                </div-->              
            </div>
        </div>

<?php include('footer.php'); ?>