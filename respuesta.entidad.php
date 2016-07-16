<?php
class Respuesta
{
	private $intidrespuesta;
	private $intidpregunta;
	private $nvchrespuesta;
	private $chrvf;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>