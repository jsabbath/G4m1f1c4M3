<?php
class PadreModel
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
			$stm = $this->pdo->prepare("SELECT * FROM tb_padre");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$pad = new Padre();

				$pad->__SET('intidpadre', $r->intidpadre);
				$pad->__SET('intdnipadre', $r->intdnipadre);
				$pad->__SET('nvchnombre', $r->nvchnombre);
				$pad->__SET('nvchapellidos', $r->nvchapellidos);
				$pad->__SET('nvchcorreo', $r->nvchcorreo);
				$pad->__SET('nvchcelular', $r->nvchcelular);
				$pad->__SET('intidhijo', $r->intidhijo);

				$result[] = $pad;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($intidpadre)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tb_padre WHERE intidpadre = ?");
			$stm->execute(array($intidpadre));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$pad = new Padre();

			$pad->__SET('intidpadre', $r->intidpadre);
			$pad->__SET('intdnipadre', $r->intdnipadre);
			$pad->__SET('nvchnombre', $r->nvchnombre);
			$pad->__SET('nvchapellidos', $r->nvchapellidos);
			$pad->__SET('nvchcorreo', $r->nvchcorreo);
			$pad->__SET('nvchcelular', $r->nvchcelular);
			$pad->__SET('intidhijo', $r->intidhijo);

			return $pad;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($intidpadre)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM tb_padre WHERE intidpadre = ?");			          

			$stm->execute(array($intidpadre));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Padre $data)
	{
		try 
		{
			$sql = "UPDATE tb_padre SET 
						intdnipadre = ?,
						nvchnombre = ?,
						nvchapellidos = ?,
						nvchcorreo = ?,
						nvchcelular = ?,
						intidhijo = ? 
				    WHERE intidpadre = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('intdnipadre'), 
					$data->__GET('nvchnombre'),
					$data->__GET('nvchapellidos'), 
					$data->__GET('nvchcorreo'),
					$data->__GET('nvchcelular'),
					$data->__GET('intidhijo'),
					$data->__GET('intidpadre'),
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Padre $data)
	{
		try 
		{
		$sql = "INSERT INTO tb_padre (intdnipadre,nvchnombre,nvchapellidos,nvchcorreo,nvchcelular,intidhijo) VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('intdnipadre'), 
				$data->__GET('nvchnombre'), 
				$data->__GET('nvchapellidos'),
				$data->__GET('nvchcorreo'),
				$data->__GET('nvchcelular'),
				$data->__GET('intidhijo')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
