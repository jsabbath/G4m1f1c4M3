<?php
class Tarea
{
	private $intidtarea;
	private $nvchtarea;
	private $vchmaterial;
	private $nvchdescripciontarea;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}