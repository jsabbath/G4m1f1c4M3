<?php
class Docente
{
	private $intiddocente;
	private $nvchnombre;
	private $nvchapellidos;
	private $nvchcelular;
	private $nvchcorreo;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}