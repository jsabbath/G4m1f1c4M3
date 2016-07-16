<?php
class Alumno
{
	private $intidalumno;
	private $nvchnombre;
	private $nvchapellido;
	private $nvchalias;
	private $chrgenero;
	private $nvchcorreo;
	private $nvchcelular;
	private $nvchtelefono;
	private $nvchfoto;
	private $nvchinteresas;
	private $vchimg;
	private $vchimgbanner;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
