<?php
class Pregunta
{
	private $intidpregunta;
	private $intidtarea;
	private $nvchpregunta;
	private $nvchdescripcion;
	private $chrhabilitado;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}