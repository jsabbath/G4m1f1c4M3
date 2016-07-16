<?php 
  include('header.php');
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
    <form>
      <div class="content">
          <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div style="margin-top:10px">
                    </div>
                    <div class="header">
                        <h4 class="title">UPPSSSS...!!</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <img src="assets/img/BEBE3.png" width="100%" alt="">
                                </div>        
                            </div>
                            <div class="col-md-6">
                                <div class="text">
                                    <h5 class="" width="90%" style="line-height: 1.5">Estamos experimentando problemas.<br> Nos apena decir esto pero parece que estamos experimentando un error!!!
                                    <br>Te pedimos que des click al botón y volver atrás.
                                    </h5>
                                </div>
                                <p>
                                    <a href="" id="Demo3" class="btn btn-fill btn-info" data-button="info" onclick="javascript:history.go(-1)" >Volver Atrás</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>            
          </div>
      </div>
    </form>
<?php
include_once('footer.php');
?>