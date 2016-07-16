<?php 
include('headeradmin.php'); 

  error_reporting(0);
  if(isset($_POST['submit'])){
  
        $fname = $_FILES['sel_file']['name'];
        echo 'Cargando nombre del archivo: '.$fname.' ';
        $chk_ext = explode(".",$fname);

        if(strtolower(end($chk_ext)) == "csv")
        { 
             //Establecemos la conexion con nuestro servidor de mysql local
             $cone = mysql_connect('localhost', 'root', '');
             if(!$cone)//en caso de no lograr establecer la conexion se quiebra el proceso...
                die('No se pudo etablecer coneccion, revisa tu base de datos');
             
             //Verificamos si nuestra base de datos existe.   
             if (!mysql_select_db("db_gamificame"))//en caso de no existir quiebra el proceso...
                die("La base de datos no existe..!!");
                
            //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r"); 
              while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
             {
                  if(strtoupper($data[0]) != "NOMBRES"){
                      //Insertamos los datos con los valores...
                    $sql = "INSERT into Persona (nvchdni,nvchnombre,nvchapellido,nvchcorreo,chrgenero,chrtipopersona,nvchdnihijo,dtnacimiento,dtregistro)";
                    $sql .= " values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]')";

                    mysql_query($sql) or die(mysql_error());
                    
                  }
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
             echo "<script>alert('Registro exitosa!');</script>";
             echo "<script>window.location='persona.php'</script>";

        }else{
            echo "<br><script>alert('El archivo no corresponde al formato requerido...!! ;(<br> Seleccciona el formato apropiado');</script>";    
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
        <div class="content">
            <div class="container-fluid">
              <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Registro CSV</h4>
                        <br>
                        <h6>Ahorra tiempo y registra de manera colectiva, importando un archivo excel...</h6>
                    </div>
                    <div class="content">
                        <form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post' enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="hidden">
                                    <label>El id del usuario es: </label>
                                    <input type="text" value="<?php echo $usuario_id; ?>" name='txtalumno' required>
                                  </div>
                                    <div class="form-group">
                                        <input type='file' name='sel_file' size='20'>
                                        <input type='submit'  class="btn alert-success pull-right" name='submit' value='Guardar'>
                                        <a class="btn alert-warning pull-right" href="persona.php" style="margin-right: 10px">Registro individual</a>
                                    </div>        
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
<style>
  h5 strong{
    /*margin-left: 10px;*/
  }
  .texto{
    margin-bottom: 10px;
    margin-top:0px;
  }
  .horacmt{
    text-align: right;
  }
  .cmnt{
    padding: 15px;
  }
  .card .header{
    border-bottom: 2px solid white;
  }
  html{
      margin-top: 0px;
    }
</style>      
<?php include('footer.php'); ?>