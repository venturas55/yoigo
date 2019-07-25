<?php 
session_start();
include './funciones.php';
$db = conectaDb();

// username and password sent from form  
$nombre = recoge('usuario');
$contrasena = recoge('contrasena');
$sql = "SELECT * FROM usuarios WHERE  usuario ='$nombre' and contrasena='$contrasena'";
$consulta = $db->prepare($sql);
$consulta->execute();
#A LA CONSOLA!
echo "<script type=\"text/javascript\"> console.log(" . json_encode($consulta) . ")</script>";
if ($consulta->rowCount() == 1) {
    $result = $consulta->fetch(PDO::FETCH_ASSOC);
    print_r($result);

    $_SESSION['miusuario'] = $result['usuario'];
    $_SESSION['micontrasena'] = $result['contrasena'];
    $_SESSION['miprivilegio'] = $result['privilegio'];
    echo "todo 0k";
    header("location: ./app.html");
} else {
    header("location: ./index.php");
}
$db = null;
