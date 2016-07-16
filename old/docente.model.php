<?php
class DocenteModel
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

			$stm = $this->pdo->prepare("SELECT * FROM tb_docente");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$doc = new Docente();

				$doc->__SET('intiddocente', $r->intiddocente);
				$doc->__SET('nvchnombre', $r->nvchnombre);
				$doc->__SET('nvchapellidos', $r->nvchapellidos);
				$doc->__SET('nvchcelular', $r->nvchcelular);
				$doc->__SET('nvchcorreo', $r->nvchcorreo);

				$result[] = $doc;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($intiddocente)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tb_docente WHERE intiddocente = ?");
			$stm->execute(array($intiddocente));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$doc = new Docente();

			$doc->__SET('intiddocente', $r->intiddocente);
			$doc->__SET('nvchnombre', $r->nvchnombre);
			$doc->__SET('nvchapellidos', $r->nvchapellidos);
			$doc->__SET('nvchcelular', $r->nvchcelular);
			$doc->__SET('nvchcorreo', $r->nvchcorreo);

			return $doc;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($intiddocente)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM tb_docente WHERE intiddocente = ?");			          

			$stm->execute(array($intiddocente));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Docente $data)
	{
		try 
		{
			$sql = "UPDATE tb_docente SET 
						nvchnombre = ?,
						nvchapellidos = ?,
						nvchcelular = ?,
						nvchcorreo = ?
				    WHERE intiddocente = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nvchnombre'), 
					$data->__GET('nvchapellidos'),
					$data->__GET('nvchcelular'), 
					$data->__GET('nvchcorreo'),
					$data->__GET('intiddocente')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Docente $data)
	{
		try 
		{
		$sql = "INSERT INTO tb_docente (nvchnombre,nvchapellidos,nvchcelular,nvchcorreo) VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('nvchnombre'), 
				$data->__GET('nvchapellidos'),
				$data->__GET('nvchcelular'),
				$data->__GET('nvchcorreo')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}