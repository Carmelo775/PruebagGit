<?php

session_start();
session_name("user");
$user = $_SESSION['user'];

$db = mysqli_connect("127.0.0.1", "root", "", "chat");
$sql = "UPDATE login SET estado='0' WHERE user='$user' ";
$db->query($sql);

echo '<script type="text/javascript">alert("Hasta luego"); location.href="../index.php";</script>';
session_destroy();


?>