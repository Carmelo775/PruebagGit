<?php

session_start();

session_name("user");

if(empty($_SESSION['user'])){

	header('location:../index.php');
}else{

	$user = $_SESSION['user'];

	$db = mysqli_connect("localhost", "root", "", "chat");

	$db->query("UPDATE login SET estado='1' WHERE user='$user' ");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Chat de Prueba
	</title>
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="../js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="../js/function.js"></script>
<script type="text/javascript" src="../js/chat.js"></script>
</head>
<body>

<article>

		<div class="container text-center" style='margin-top:30px;'>
			<div class="col-md-12">
				<form class="form-inline" method="POST" action="enviar.php">
		<div class="form-group ">
			<a href="../Controlador/cerrarSesion.php" name="cerrar" id="button-cerrar">Cerrar Sesión</a>
		</div>
				</form>
			</div>
		</div>
</article>

<div id="contactos">

		<?php

			echo '<strong>Bienvenido: ' .$_SESSION['user']. '</strong>';

			require('../Controlador/Usuarios.php');

			$Lista_Usuarios = new Usuario();
			$Lista_Usuarios -> Conectados($_SESSION['user']);

		?>
</div>


	<div style="position: absolute;top:0;right:0;" id="retorno"></div>
	<div id="ventanas">
	</div>


</body>
</html>



<?php

}
?>