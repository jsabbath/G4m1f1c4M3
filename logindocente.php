<?php include('headerlogin.php'); ?>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading pull-center">Login docente</div>
				<div class="panel-body">
					<form action="include/logeatedocente.php" method="POST" data-wow-offset="10" data-wow-delay="0.2s">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Correo" name="username" type="email" minlength="10" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Contraseña" name="password" type="password" minlength="8" value="" required>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="recuerdame">Recuerdame
								</label>
								<!--a href="index.html" class="btn btn-primary">Ingresar</a-->
							</div>
							<input type="submit" value="Ingresar" class="btn pull-center">
							<input type="reset" class="btn pull-center" value="Limpiar">
							<a href="newaccount.php" class="btn pull-center" >Solicitar cuenta</a>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php include('footerlogin.php'); ?>