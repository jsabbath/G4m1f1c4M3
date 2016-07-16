<?php

date_default_timezone_set('America/Lima');

$dia = date("l");
$hora = date("H:i:s");

switch ($dia) {
    case 'Monday':
        echo "Lunes ".$hora;
        break;
    case 'Tuesday':
        echo "Martes ".$hora;
        break;
    case 'Wednesday':
        echo "Miercoles ".$hora;
        break;
    case 'Thursday':
        echo "Jueves ".$hora;
        break;
    case 'Friday':
        echo "Viernes ".$hora;
        break;
    case 'saturday':
        echo "Sabado ".$hora;
        break;
    case 'sunday':
        echo "Domingo ".$hora;
        break;
    default: 
        echo 'nada';
        break;
}

require_once 'tarea.entidad.php';
require_once 'tarea.model.php';
// Logica
$tar = new Tarea();
$model = new TareaModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$tar->__SET('intidtarea',$_REQUEST['intidtarea']);
			$tar->__SET('nvchtarea',$_REQUEST['nvchtarea']);
            $tar->__SET('vchmaterial',$_REQUEST['vchmaterial']);
			$tar->__SET('nvchdescripciontarea',$_REQUEST['nvchdescripciontarea']);
            //$alm->__SET('foto', $_REQUEST['foto']);
            //$alm->__SET('foto', $_REQUEST['foto']);
			$model->Actualizar($tar);
			header('Location: tarea.php');
			break;

		case 'registrar':
			$tar->__SET('nvchtarea',$_REQUEST['nvchtarea']);
            $tar->__SET('vchmaterial',$_REQUEST['vchmaterial']);
			$tar->__SET('nvchdescripciontarea',$_REQUEST['nvchdescripciontarea']);
            //$alm->__SET('foto', $_REQUEST['foto']);
			$model->Registrar($tar);
			header('Location: tarea.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['intidtarea']);
			header('Location: tarea.php');
			break;

		case 'editar':
			$tar = $model->Obtener($_REQUEST['intidtarea']);
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Tarea CRUD</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                <form action="?action=<?php echo $tar->intidtarea > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;" enctype="multipart/form-data">
                    <input type="hidden" name="intidtarea" value="<?php echo $tar->__GET('intidtarea'); ?>" />
					<table width="600">
					    <tr>
					        <th style="text-align:left;">Tarea</th>
					        <td>
					        	<input type="text" name="nvchtarea" value="<?php echo $tar->__GET('nvchtarea'); ?>" style="width:100%;" required />
					        </td>
					    </tr>
					    <tr>
					        <th style="text-align:left;">material</th>
					        <td>
					        	<input type="text" name="vchmaterial" value="<?php echo $tar->__GET('vchmaterial'); ?>" style="width:100%;" required />
					        </td>
					    </tr>
					    <tr>
					        <th style="text-align:left;">Descripcion</th>
					        <td>
					        	<input type="text" name="nvchdescripciontarea" value="<?php echo $tar->__GET('nvchdescripciontarea'); ?>" style="width:100%;" required />
					        </td>
					    </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
					</table>
                </form>


                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Id</th>
                            <th style="text-align:left;">Tarea</th>
                            <th style="text-align:left;">Material</th>
                            <th style="text-align:left;">Descrpcion de tarea</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('intidtarea'); ?></td>
                            <td><?php echo $r->__GET('nvchtarea'); ?></td>
                            <td><?php echo $r->__GET('vchmaterial'); ?></td>
                            <td><?php echo $r->__GET('nvchdescripciontarea'); ?></td>
                            <td>
                                <a href="?action=editar&intidtarea=<?php echo $r->intidtarea; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&intidtarea=<?php echo $r->intidtarea; ?>">Eliminar</a>
                            </td>
                            <!--td>
                                <a href="perfil.php?intidtarea=<?php echo $r->intidtarea; ?>">Ver Perfil</a>
                            </td-->
                            <td>
                                <p>id=<?php echo $r->intidtarea; ?></p>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>
