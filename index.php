<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
	<title>Chat</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="form-main">
  <div id="form-div">
    <form class="form" id="form1" action="Controlador/Ejecutar.php" method="POST">
      
      <p class="user">
        <input name="usuario" type="text" class="feedback-input" placeholder="Ingresa tu Usuario" id="usuario" autofocus/>
      </p>
      
      <p class="psw">
        <input name="clave" type="password" class="feedback-input" id="clave" placeholder="Ingresa tu Clave" />
      </p>
      
      <div class="submit">
        <input type="submit" value="Ingresar" name="Ingresar" id="button-blue"/>
        <div class="ease"></div>
      </div>
    </form>
  </div>

</body>
</html>