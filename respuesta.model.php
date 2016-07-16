<?php

class RespuestaModel
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

	public function Listarall()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM tb_respuesta");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$rsp = new Respuesta();
				$rsp->__SET('intidrespuesta', $r->intidrespuesta);
				$rsp->__SET('intidpregunta', $r->intidpregunta);
				$rsp->__SET('nvchrespuesta', $r->nvchrespuesta);
				$rsp->__SET('chrvf', $r->chrvf);

				$result[] = $rsp;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function Listar($intidpregunta)
	{
		try
		{
			$result = array();

			$stm = $this->pdo
			          ->prepare("SELECT * FROM tb_respuesta WHERE intidpregunta = ?");
			$stm->execute(array($intidpregunta));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$rsp = new Respuesta();
				$rsp->__SET('intidrespuesta', $r->intidrespuesta);
				$rsp->__SET('intidpregunta', $r->intidpregunta);
				$rsp->__SET('nvchrespuesta', $r->nvchrespuesta);
				$rsp->__SET('chrvf', $r->chrvf);

				$result[] = $rsp;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($intidrespuesta)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tb_respuesta WHERE intidrespuesta = ?");
			$stm->execute(array($intidrespuesta));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$rsp = new Respuesta();
			$rsp->__SET('intidrespuesta', $r->intidrespuesta);
			$rsp->__SET('intidpregunta', $r->intidpregunta);
			$rsp->__SET('nvchrespuesta', $r->nvchrespuesta);
			$rsp->__SET('chrvf', $r->chrvf);

			return $rsp;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($intidrespuesta)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM tb_respuesta WHERE intidrespuesta = ?");			          

			$stm->execute(array($intidrespuesta));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Respuesta $data)
	{

		try 
		{
			$sql = "UPDATE tb_respuesta SET 
						intidpregunta = ?,
						nvchrespuesta = ?, 
						chrvf = ?
					WHERE intidrespuesta = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('intidpregunta'), 
					$data->__GET('nvchrespuesta'), 
					$data->__GET('chrvf'),
					$data->__GET('intidrespuesta')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Respuesta $data)
	{

		try 
		{
		$sql = "INSERT INTO tb_respuesta (intidpregunta,nvchrespuesta,chrvf) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
					$data->__GET('intidpregunta'),
					$data->__GET('nvchrespuesta'), 
					$data->__GET('chrvf')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
