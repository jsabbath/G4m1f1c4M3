<?php
class Padre
{
	private $intidpadre;
	private $intdnipadre;
	private $nvchnombre;
	private $nvchapellidos;
	private $nvchcorreo;
	private $nvchcelular;
	private $intidhijo;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}