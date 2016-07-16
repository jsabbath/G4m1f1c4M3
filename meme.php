<?php include('header.php'); ?>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="title" style="">Seccion Meme-ate</h2>
                            </div>
                            <div class="content">
                                <div class="row" style="margin-top:10px; margin-bottom:30px">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <p>Sección pensada y creada para ti, para que puedas crear tus memes, recuerda que todos tenemos el derecho de expresarse, pero sin lastimar los sentimientos de las personas, todos somos iguales en muchos sentidos... <br>
                                            <strong>El respeto mutuo es la clave de una gran amistad. :)</strong>
                                            
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px; margin-bottom:30px">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Instrucciones</p>
                                            <label>
                                                <ul>
                                                    <li>Seleciona tu imagen a usar para crear tu meme</li>
                                                    <li>Pulsar sobre el Botón, 'RENDERIZAR'</li>
                                                    <li>Una vez que te salga la imagen en la parte inferior, garegar el texto que ira sobre el meme</li>
                                                    <li>CLICK DERECHO SOBRE LA IMAGEN Y GUARDAR TU MEME...</li>
                                                    <br>
                                                    <h4 for="">Eso es todo...!!!</h4>
                                                </ul>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div id="subida">
                                                <label id="elija">SELECCIONE UNA IMAGEN A SUBIR </label> 
                                                <div class="">
                                                    <input id="imagen" type="file" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button id="subir" class="btn btn-info btn-fill " onclick="SubirImagen();">Renderizar</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="meme" class="none">
                                    <div class="">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" id="texto" type="text" onkeyup="AgregarTexto();" placeholder="Texto que desea agregar" maxlength="25" autocomplete="off" />
                                                <br>
                                                <label for="">Click derecho sobre la imagen y guardar tu meme...</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <canvas id="canvas" style="">
                                                </canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php //include_once('pblcrmstd.php'); ?>               
            </div>
        </div>
    <!--script memeate-->    
    <script>
        var img, canvas, context;
        
        function SubirImagen()
        {
            canvas = document.getElementById("canvas");
            context = canvas.getContext("2d");
            
            canvas.width = 700;
            canvas.height = 500;
            
            // Cargamos el objeto que nos permite subir imagenes
            var imagen = document.getElementById("imagen");
            if(imagen.files.length == 0)
            {
                alert('Debes ingresar una imagen, primero y luego renderizar...');
                return;
            }

            // Creamos la imagen
            img = new Image();
            img.src = URL.createObjectURL(imagen.files[0]);
            
            img.onload = function() {
                // Dibujamos la imagen
                context.drawImage(img, 0, 0, canvas.width, canvas.height);
            };
            
            // Mostramos el canvas
            document.getElementById("meme").style.display = 'block';
        }
        
        function AgregarTexto()
        {
            // Cargamos la caja de texto
            var texto = document.getElementById("texto");
            
            img.src = URL.createObjectURL(imagen.files[0]);
            img.onload = function() {
                // Dibujamos la imagen
                context.drawImage(img, 0, 0, canvas.width, canvas.height);
                
                // Agregamos el texto
                context.lineWidth  = 1;
                context.font = '20pt sans-serif';
                context.strokeStyle = 'black';
                context.fillStyle = 'white';
                context.textAlign = 'center';

                texto = texto.value.toUpperCase();

                var x = canvas.width/2;
                var y = canvas.height - 40;

                context.strokeText(texto, x, y);
                context.fillText(texto, x, y);
            };
        }
    </script>
    <style>
        html{
            margin-top:0px;
        }
    </style>
<?php include('footer.php'); ?>