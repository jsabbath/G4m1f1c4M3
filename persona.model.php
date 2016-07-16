<?php
class PersonaModel
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

			$stm = $this->pdo->prepare("SELECT * FROM persona");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$per = new Persona();

				$per->__SET('nvchidpersona', $r->nvchidpersona);
				$per->__SET('nvchdni', $r->nvchdni);
				$per->__SET('nvchnombre', $r->nvchnombre);
				$per->__SET('nvchapellido', $r->nvchapellido);
				$per->__SET('nvchcorreo', $r->nvchcorreo);
				$per->__SET('chrgenero', $r->chrgenero);
				$per->__SET('chrtipopersona', $r->chrtipopersona);
				$per->__SET('nvchdnihijo', $r->nvchdnihijo);
				$per->__SET('dtnacimiento', $r->dtnacimiento);
				//agreagado recien
				$per->__SET('dtregistro', $r->dtregistro);
				//$alm->__SET('foto', $r->foto);

				$result[] = $per;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	//listar con condicional
	public function Listardocentes()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM persona where chrtipopersona='3'");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$per = new Persona();

				$per->__SET('nvchidpersona', $r->nvchidpersona);
				$per->__SET('nvchdni', $r->nvchdni);
				$per->__SET('nvchnombre', $r->nvchnombre);
				$per->__SET('nvchapellido', $r->nvchapellido);
				$per->__SET('nvchcorreo', $r->nvchcorreo);
				$per->__SET('chrgenero', $r->chrgenero);
				$per->__SET('chrtipopersona', $r->chrtipopersona);
				$per->__SET('nvchdnihijo', $r->nvchdnihijo);
				$per->__SET('dtnacimiento', $r->dtnacimiento);
				//agreagado recien
				$per->__SET('dtregistro', $r->dtregistro);
				//$alm->__SET('foto', $r->foto);

				$result[] = $per;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	//end listar	

	//listar con condicional
	public function Listarpadres()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM persona where chrtipopersona='2'");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$per = new Persona();

				$per->__SET('nvchidpersona', $r->nvchidpersona);
				$per->__SET('nvchdni', $r->nvchdni);
				$per->__SET('nvchnombre', $r->nvchnombre);
				$per->__SET('nvchapellido', $r->nvchapellido);
				$per->__SET('nvchcorreo', $r->nvchcorreo);
				$per->__SET('chrgenero', $r->chrgenero);
				$per->__SET('chrtipopersona', $r->chrtipopersona);
				$per->__SET('nvchdnihijo', $r->nvchdnihijo);
				$per->__SET('dtnacimiento', $r->dtnacimiento);
				//agreagado recien
				$per->__SET('dtregistro', $r->dtregistro);
				//$alm->__SET('foto', $r->foto);

				$result[] = $per;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	//end listar
		//listar con condicional
	public function Listaralumnos()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM persona where chrtipopersona='1'");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$per = new Persona();

				$per->__SET('nvchidpersona', $r->nvchidpersona);
				$per->__SET('nvchdni', $r->nvchdni);
				$per->__SET('nvchnombre', $r->nvchnombre);
				$per->__SET('nvchapellido', $r->nvchapellido);
				$per->__SET('nvchcorreo', $r->nvchcorreo);
				$per->__SET('chrgenero', $r->chrgenero);
				$per->__SET('chrtipopersona', $r->chrtipopersona);
				$per->__SET('nvchdnihijo', $r->nvchdnihijo);
				$per->__SET('dtnacimiento', $r->dtnacimiento);
				//agreagado recien
				$per->__SET('dtregistro', $r->dtregistro);
				//$alm->__SET('foto', $r->foto);

				$result[] = $per;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	//end listar


	public function Obtener($nvchidpersona)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM persona WHERE nvchidpersona = ?");
			          

			$stm->execute(array($nvchidpersona));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$per = new Persona();

			$per->__SET('nvchidpersona', $r->nvchidpersona);
			$per->__SET('nvchdni', $r->nvchdni);
			$per->__SET('nvchnombre', $r->nvchnombre);
			$per->__SET('nvchapellido', $r->nvchapellido);
			$per->__SET('nvchcorreo', $r->nvchcorreo);
			$per->__SET('chrgenero', $r->chrgenero);
			$per->__SET('chrtipopersona', $r->chrtipopersona);
			$per->__SET('nvchdnihijo', $r->nvchdnihijo);
			$per->__SET('dtnacimiento', $r->dtnacimiento);
			$per->__SET('dtregistro', $r->dtregistro);
			//$alm->__SET('foto', $r->foto);

			return $per;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($nvchidpersona)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM persona WHERE nvchidpersona = ?");			          

			$stm->execute(array($nvchidpersona));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Persona $data)
	{

		try 
		{
			$sql = "UPDATE persona SET 
						nvchdni          = ?,
						nvchnombre          = ?,
						nvchapellido        = ?,
						nvchcorreo = ?,
						chrgenero            = ?, 
						chrtipopersona    = ?, 
						nvchdnihijo    = ?,
						dtnacimiento = ?,
						dtregistro = ?
				    WHERE nvchidpersona = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nvchdni'),
					$data->__GET('nvchnombre'), 
					$data->__GET('nvchapellido'), 
					$data->__GET('nvchcorreo'), 
					$data->__GET('chrgenero'),
					$data->__GET('chrtipopersona'),
					$data->__GET('nvchdnihijo'),
					$data->__GET('dtnacimiento'),
					//agregado recien
					$data->__GET('dtregistro'),
					$data->__GET('nvchidpersona')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Persona $data)
	{

		try 
		{
		$sql = "INSERT INTO persona (nvchdni,nvchnombre,nvchapellido,nvchcorreo,chrgenero,chrtipopersona,nvchdnihijo,dtnacimiento,dtregistro) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('nvchdni'),
				$data->__GET('nvchnombre'),
				$data->__GET('nvchapellido'), 
				$data->__GET('nvchcorreo'),
				$data->__GET('chrgenero'),
				$data->__GET('chrtipopersona'),
				$data->__GET('nvchdnihijo'),
				$data->__GET('dtnacimiento'),
				//agregado recien
				$data->__GET('dtregistro')

				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
