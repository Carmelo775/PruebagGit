<?php

require("../Modelo/Conexion.php");

session_start();
session_name('user');

class Chat extends Conexion {

	public function __construct(){

		parent::__construct();
	}

	public function Insertar_Mensajes($mnsj, $para){

	$de = $_SESSION['user'];
    $mensaje = strip_tags($mnsj); //strip_tags se utiliza para guardar una cadena de texto sin etiquetas html.


      $buscar_id = $this->db->query("SELECT id FROM login WHERE user='$de' ");

      $row = $buscar_id->fetch_array();

      $id_de = $row['id'];

      $insercion = $this->db->query("INSERT INTO mensajes(id_para, id_de, mensaje, data) VALUES(
        '$para',
        '$id_de',
        '$mensaje',
        NOW()
      ) ");

      if($insercion){

        echo "<li><span><strong>".$de." dice:</strong></span><p>".$mensaje."</p></li>";
      }
	}

	public function Lista_Mensajes($para){

		$mensaje = "";

		$de = $_SESSION['user'];

		$buscar_id = $this->db->query("SELECT id FROM login WHERE user='$de' ");

      	$row = $buscar_id->fetch_array();

      	$id_de = $row['id'];

		$muestra = $this->db->query("SELECT * FROM mensajes WHERE id_de='$id_de' AND id_para='$para' 
			OR id_para='$id_de' AND id_de='$para' ");


		while($row = $muestra->fetch_array()){

			$us = $row['id_de'];

			$users = $this->db->query("SELECT user FROM login WHERE id='$us' ");

			$u = $users->fetch_array();

			$mensaje .= "<li><span><strong>".$u['user']." dice:</strong></span><p>".$row['mensaje']."</p></li>";
		}
		echo $mensaje;
	}
}

?>