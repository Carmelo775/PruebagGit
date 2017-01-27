<?php

require("../Modelo/Conexion.php");

class Ingreso extends Conexion {

	public function __construct(){

		parent::__construct();
	}

	public function Login(){

		$user = $_POST["usuario"];
		$psw = $_POST["clave"];

		$consulta = $this->db->query("SELECT * FROM login WHERE user='$user' && password='$psw' ");

		if($consulta->num_rows > 0){

			$row = $consulta->fetch_array();

			session_start();
			session_name("user");
			$_SESSION['user'] = $row['user'];
			header('location: ../Vista/panel.php');
		}else{
			echo "<script>alert('Usuario o clave incorrectos');location.href='../index.php';</script>";
		}
	}
}

?>