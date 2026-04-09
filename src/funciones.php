<?php 
function loadEnv($path) {
    if (!file_exists($path)) {
        return false;
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            
            // Remove quotes if present
            if ((substr($value, 0, 1) === '"' && substr($value, -1) === '"') ||
                (substr($value, 0, 1) === "'" && substr($value, -1) === "'")) {
                $value = substr($value, 1, -1);
            }
            
            putenv("$key=$value");
            $_ENV[$key] = $value;
        }
    }
    return true;
}
loadEnv(__DIR__ . '/../.env');

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
    try {
        $db = new PDO("mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
        //$db = new PDO("mysql:host=localhost;dbname=yoigo", "root", "administrador");
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
    <div class="cabecera">
        <div class="tabcontent">
            <div>
                <a href="https://www.yoigo.com/" target="_blank"> <img id="logo" src="./img/Yoigo_logo_logotype_pink.png" alt="logo"> </a>
            </div>
            <div><h1>APP DE GESTION DE TIENDAS </h1></div>
            
        
        </div>
        <button class="tablink" onclick="javascript:location.href=\'app.php\'">EVALUACIONES</button>
        <button class="tablink" onclick="javascript:location.href=\'preguntas.php\'">EDITAR PREGUNTAS</button>
        <button class="tablink" onclick="javascript:location.href=\'tiendas.php\'">EDITAR TIENDAS</button>
        <button class="tablink" onclick="javascript:location.href=\'./log-out.php\'">LOG OUT</button>
        <div><p> Bienvenid@: '. $_SESSION["miusuario"].'</p></div>
    </div>';
}

function pie(){
    echo '    <nav class="footer">Carla Narcisa Oliveira de la Calle. <span class="copyleft"> &copy; </span> OdlC 2019 · Todos los
    derechos reservados</nav>';
}

?>

