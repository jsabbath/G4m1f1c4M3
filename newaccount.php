<?php include('headerlogin.php'); ?>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading center">Solicitar cuenta</div>
				<div class="panel-body">
					<form action="include/registro.php" method="POST" data-wow-offset="10" data-wow-delay="0.2s">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Nombres" name="vchusername" minlength="15" type="email" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Apellidos" name="vchpassword" minlength="8" type="password" value="" required>
							</div>
							<div class="form-group">
								<label>Fecha de Nacimiento</label>
								<input class="form-control" placeholder="Fecha de nacimiento"  minlength="8"  name="vchpassword2" type="date" value="" required>
							</div><div class="form-group">
								<input class="form-control" placeholder="correo electronico"  minlength="8"  name="vchpassword2" type="mail" value="" required>
							</div>
							<div class="form-group">
								<!--div class="dropdown">
		                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                                    <span class="notification">Soy un </span>
		                                    <i class="fa fa-globe"></i>
		                                    <b class="caret"></b>
		                              </a>
		                              <ul class="dropdown-menu">
		                                <li><a href="#">Alumno</a></li>
		                                <li><a href="#">Padre</a></li>
		                                <li><a href="#">Docente</a></li>
		                                <li><a href="#">Director</a></li>
		                              </ul>
		                        </div-->
		                        <select class="form-group" name="Sexo">
			                        	<option value="1" >Alumno</option>
	                                    <option value="2" >Padre</option>
	                                    <option value="2" >Docente</option>
	                                    <option value="2" >Director</option>
                                </select>

							</div>
							
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="recuerdame">Terminos y condiciones
								</label>
								<!--a href="index.html" class="btn btn-primary">Ingresar</a-->
							</div>

							<input type="submit" value="Ingresar" class="btn">
							<input type="reset" class="btn" value="Limpiar">
							<a href="login.php" class="btn" >Sácame de aqui</a>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
<?php include('footerlogin.php'); ?>