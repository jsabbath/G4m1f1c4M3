<?php
class Persona
{
	private $nvchidpersona;
	private $nvchdni;
	private $nvchnombre;
	private $nvchapellido;
	private $nvchcorreo;
	private $chrgenero;
	private $chrtipopersona;
	private $nvchdnihijo;
	private $dtnacimiento;
	private $dtregistro;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}

?>