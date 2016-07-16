<?php 

function damecomentariosmios(){
	$usrname = $_SESSION['nvchusername'];
	$consulta_mysql="
	SELECT
	  tb_alumno.intidalumno,
	  tb_alumno.nvchnombre,
	  tb_alumno.nvchapellido,
	  tb_alumno.nvchalias,
	  tb_estado.nvchestado,
	  tb_estado.dtfecha,
	  tb_estado.nvchhora
	FROM
	  tb_estado
	INNER JOIN
	  tb_alumno ON tb_estado.intidpersona = tb_alumno.intidalumno
	INNER JOIN tb_user ON tb_alumno.intidalumno = tb_user.intidpersona WHERE tb_user.nvchusername = '".$usrname."'
	";
	$resultado_consulta_mysql=mysql_query($consulta_mysql);
	while($registro = mysql_fetch_array($resultado_consulta_mysql)){

		echo "
	    	<div class='card cmnt'>
	    		<div class='header ccabecera'>
	    			<div class='contenidocmt'>
	    				<h4 class='title'>".$registro['nvchalias']."
	    				</h4>
	    			</div>
	    		</div>
	    		<div class='content'>
	    			<div class='texto'>
	    				<h5>
	    				".$registro['nvchestado']."
	    				</h5>
	    			</div>
	    			<div class='horacmt'>
		    			<p>Publicado el ".$registro['dtfecha']." a las ".$registro['nvchhora']."</p>
		    		</div>
	    		</div>
	    	</div>
		";
	}
}

?> 

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="header">
                <h4 class="title">Estado</h4>
            </div>
            <div class="content">
                <form action="regcoment.php" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                        	<div class="hidden">
                        		<label>el id del usuario es: </label>
                        		<input type="text" value="<?php echo $usuario_id; ?>" name='txtalumno'>
                        	</div>
                            <div class="form-group">
                                <label>Que estoy pensado justo ahora? </label>
                                <textarea rows="4" class="form-control" placeholder="escribe lo que estas pensado justo ahora... "
                                name='txtestado' required>
                                </textarea>
                            </div>        
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-fill pull-right">Publicar</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-7">
    	<?php 
    		damecomentariosmios();
    	 ?>
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

</style>