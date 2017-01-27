<?php

require("../Modelo/Conexion.php");

class Usuario extends Conexion{

	public function __construct(){

		parent::__construct();
	}

	public function Conectados($us){


	$connects = $this->db->query("SELECT * FROM login WHERE user !='$us' ");

      	echo "<ul>";

		      while($row = $connects->fetch_array())
		      {

		        $id = $row['id'];

		        echo "
		    			<li><a href='javascript:void(0);' name='".$row['user']."' id='".$row['id']."' class='contactos'>".$row['nombre']." ".$row['apellido']."
		    		";
		                if($row['estado'] == 1){

		                  echo "<div style='width:20px;height:15px;background-color: green;border-radius: 100px;margin-left:110px;margin-top: -15px;'></div>";
		                }else{

		                  echo "<div style='width:20px;height:15px;background-color: red;border-radius: 100px;margin-left:110px; margin-top: -15px'></div>";
		                }
		                echo "</a>
		              </li>";
		      }

      	echo "</ul>";
	}
}

?>