<?php
class AlumnoModel
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

			$stm = $this->pdo->prepare("SELECT * FROM tb_alumno");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alum = new Alumno();

				$alum->__SET('intidalumno', $r->intidalumno);
				$alum->__SET('nvchnombre', $r->nvchnombre);
				$alum->__SET('nvchapellido', $r->nvchapellido);
				$alum->__SET('nvchalias', $r->nvchalias);
				$alum->__SET('chrgenero', $r->chrgenero);
				$alum->__SET('nvchcorreo', $r->nvchcorreo);
				$alum->__SET('nvchcelular', $r->nvchcelular);
				$alum->__SET('nvchtelefono', $r->nvchtelefono);
				$alum->__SET('nvchfoto', $r->nvchfoto);
				$alum->__SET('nvchinteresas', $r->nvchinteresas);
				$alum->__SET('vchimg', $r->vchimg);
				$alum->__SET('vchimgbanner', $r->vchimgbanner);

				$result[] = $alum;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($intidalumno)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tb_alumno WHERE intidalumno = ?");
			          

			$stm->execute(array($intidalumno));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alum = new Alumno();

			$alum->__SET('intidalumno', $r->intidalumno);
			$alum->__SET('nvchnombre', $r->nvchnombre);
			$alum->__SET('nvchapellido', $r->nvchapellido);
			$alum->__SET('nvchalias', $r->nvchalias);
			$alum->__SET('chrgenero', $r->chrgenero);
			$alum->__SET('nvchcorreo', $r->nvchcorreo);
			$alum->__SET('nvchcelular', $r->nvchcelular);
			$alum->__SET('nvchtelefono', $r->nvchtelefono);
			$alum->__SET('nvchfoto', $r->nvchfoto);
			$alum->__SET('nvchinteresas', $r->nvchinteresas);
			$alum->__SET('vchimg', $r->vchimg);
			$alum->__SET('vchimgbanner', $r->vchimgbanner);

			return $alum;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($intidalumno)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM tb_alumno WHERE intidalumno = ?");			          

			$stm->execute(array($intidalumno));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Alumno $data)
	{
		try 
		{
			$sql = "UPDATE tb_alumno SET 
						nvchnombre = ?,
						nvchapellido = ?,
						nvchalias = ?,
						chrgenero = ?,
						nvchcorreo = ?,
						nvchcelular = ?,
						nvchtelefono = ?,
						nvchfoto = ?,
						nvchinteresas = ?,
						vchimg = ?,
						vchimgbanner = ?

				    WHERE intidalumno = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nvchnombre'), 
					$data->__GET('nvchapellido'),
					$data->__GET('nvchalias'), 
					$data->__GET('chrgenero'),
					$data->__GET('nvchcorreo'),
					$data->__GET('nvchcelular'),
					$data->__GET('nvchtelefono'),
					$data->__GET('nvchfoto'),
					$data->__GET('nvchinteresas'),
					$data->__GET('vchimg'),
					$data->__GET('vchimgbanner'),
					$data->__GET('intidalumno')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Alumno $data)
	{
		try 
		{
		$sql = "INSERT INTO tb_alumno (
			nvchnombre,
			nvchapellido,
			nvchalias,
			chrgenero,
			nvchcorreo,
			nvchcelular,
			nvchtelefono,
			nvchfoto,
			nvchinteresas,
			vchimg,
			vchimgbanner
		) VALUES (
			?, 
			?, 
			?, 
			?, 
			?, 
			?, 
			?, 
			?, 
			?, 
			?, 
			?
		)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('nvchnombre'), 
				$data->__GET('nvchapellido'),
				$data->__GET('nvchalias'),
				$data->__GET('chrgenero'),
				$data->__GET('nvchcorreo'),
				$data->__GET('nvchcelular'),
				$data->__GET('nvchtelefono'),				
				$data->__GET('nvchfoto'),
				$data->__GET('nvchinteresas'),
				$data->__GET('vchimg'),
				$data->__GET('vchimgbanner')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}