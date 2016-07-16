<?php
class TareaModel
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

			$stm = $this->pdo->prepare("SELECT * FROM tb_tarea");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$tar = new Tarea();
				$tar->__SET('intidtarea', $r->intidtarea);
				$tar->__SET('nvchtarea', $r->nvchtarea);
				$tar->__SET('vchmaterial', $r->vchmaterial);
				$tar->__SET('nvchdescripciontarea', $r->nvchdescripciontarea);

				$result[] = $tar;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($intidtarea)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tb_tarea WHERE intidtarea = ?");
			$stm->execute(array($intidtarea));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$tar = new Tarea();

			$tar->__SET('intidtarea', $r->intidtarea);
			$tar->__SET('nvchtarea', $r->nvchtarea);
			$tar->__SET('vchmaterial', $r->vchmaterial);
			$tar->__SET('nvchdescripciontarea', $r->nvchdescripciontarea);

			return $tar;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($intidtarea)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM tb_tarea WHERE intidtarea = ?");			          

			$stm->execute(array($intidtarea));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Tarea $data)
	{

		try 
		{
			$sql = "UPDATE tb_tarea SET 
						nvchtarea          = ?,
						vchmaterial          = ?, 
						nvchdescripciontarea = ?
					WHERE intidtarea = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nvchtarea'),
					$data->__GET('vchmaterial'), 
					$data->__GET('nvchdescripciontarea'), 
					$data->__GET('intidtarea')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Tarea $data)
	{

		try 
		{
		$sql = "INSERT INTO tb_tarea (nvchtarea,vchmaterial,nvchdescripciontarea) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
					$data->__GET('nvchtarea'),
					$data->__GET('vchmaterial'), 
					$data->__GET('nvchdescripciontarea')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
