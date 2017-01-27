<?php



if(isset($_POST['Ingresar']))
{
	require("Ingreso.php");

	$Ingreso = new Ingreso();
	$Ingreso -> Login();
}
?>

<?php

if(isset($_POST['Insertar_msj']))
{
	require("chat.php");

	$insertar = new Chat();
	$insertar -> Insertar_Mensajes($_POST['mensaje'], $_POST['para']);
}

if(isset($_POST['MostrarMensajes']))
{
	require("chat.php");

	$mostrar = new Chat();
	$mostrar -> Lista_Mensajes($_POST['id']);
}

?>