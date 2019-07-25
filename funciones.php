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
?>

