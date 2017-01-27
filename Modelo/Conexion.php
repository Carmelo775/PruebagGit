<?php

class Conexion{

	protected $db;

	public function __construct(){

		$this->db = mysqli_connect("localhost", "root", "", "chat");
	}
}

?>