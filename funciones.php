<?php 

function recoge($campo){
        if (isset($_REQUEST[$campo])) {
        $valor = htmlspecialchars(trim(strip_tags($_REQUEST[$campo])));
    }else {
        $valor="";
    };
    return $valor;
}

function recogecookie($campo)
{
    if (isset($_SESSION[$campo])) {
        $valor = htmlspecialchars(trim(strip_tags($_SESSION[$campo])));
    } else {
        $valor = "";
    };
    return $valor;
}


function conectaDb()
{
    //uso de las excepciones en php try y catch
    try {
        //$db = new PDO("mysql:host=adriandecradmin.mysql.db;dbname=adriandecradmin", "adriandecradmin", "Administrador1");
        $db = new PDO("mysql:host=localhost;dbname=yoigo", "root", "administrador");
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
        return ($db);
    } catch (PDOExcepton $e) {
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
        print "<p>Error: " . $e->getMessage() . "</p>\n";
        exit();
    }
}

function privilegio()  //Devuelve admin, san o none, en funcion del privilegio
{
    if (recogecookie('miprivilegio') == 'admin')
        return 'admin';
    return 'none';
}

function cabecera(){
    echo '
    <div class="tabcontent">
        <img src="./img/Yoigo_logo_logotype_pink.png" alt="" id="logo">
        <h1>APP DE GESTION DE TIENDAS <span> Bienvenid@: '. $_SESSION["miusuario"].' </span></h1>
    </div>
    <button class="tablink" onclick="javascript:location.href=\'app.php\'">EVALUACIONES</button>
    <button class="tablink" onclick="javascript:location.href=\'preguntas.php\'">EDITAR PREGUNTAS</button>
    <button class="tablink" onclick="javascript:location.href=\'tiendas.php\'">EDITAR TIENDAS</button>
    <button class="tablink" onclick="javascript:location.href=\'./log-out.php\'">LOG OUT</button>
    ';
}

function pie(){
    echo '    <nav class="footer">Carla Narcisa Oliveira de la Calle. <span class="copyleft"> &copy; </span> OdlC 2019 · Todos los
    derechos reservados</nav>';

}
?>

