<?php
class PreguntaModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=db_gamificame', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM tb_pregunta");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$preg = new Pregunta();
				$preg->__SET('intidpregunta', $r->intidpregunta);
				$preg->__SET('intidtarea', $r->intidtarea);
				$preg->__SET('nvchpregunta', $r->nvchpregunta);
				$preg->__SET('nvchdescripcion', $r->nvchdescripcion);
				$preg->__SET('chrhabilitado', $r->chrhabilitado);

				$result[] = $preg;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($intidpregunta)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tb_pregunta WHERE intidpregunta = ?");
			$stm->execute(array($intidpregunta));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$preg = new Pregunta();
			$preg->__SET('intidpregunta', $r->intidpregunta);
			$preg->__SET('intidtarea', $r->intidtarea);
			$preg->__SET('nvchpregunta', $r->nvchpregunta);
			$preg->__SET('nvchdescripcion', $r->nvchdescripcion);
			$preg->__SET('chrhabilitado', $r->chrhabilitado);

			return $preg;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($intidpregunta)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM tb_pregunta WHERE intidpregunta = ?");			          

			$stm->execute(array($intidpregunta));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Pregunta $data)
	{

		try 
		{
			$sql = "UPDATE tb_pregunta SET 
						intidtarea = ?,
						nvchpregunta = ?, 
						nvchdescripcion = ?,
						chrhabilitado = ?
					WHERE intidpregunta = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('intidtarea'),
					$data->__GET('nvchpregunta'), 
					$data->__GET('nvchdescripcion'), 
					$data->__GET('chrhabilitado'),
					$data->__GET('intidpregunta')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Pregunta $data)
	{

		try 
		{
		$sql = "INSERT INTO tb_pregunta (intidtarea,nvchpregunta,nvchdescripcion,chrhabilitado) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
					$data->__GET('intidtarea'),
					$data->__GET('nvchpregunta'), 
					$data->__GET('nvchdescripcion'),
					$data->__GET('chrhabilitado')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
