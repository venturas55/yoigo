<!DOCTYPE html>
<html lang="es">

<head>
    <title>Carla ODLC Yoigo</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">
    <style type="text/css">
        body {
            background: url(./img/fondo3.jpg) no-repeat center center;
            background-size: cover;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            -o-background-size: cover;
            background-attachment: fixed;
           
        }
    </style>
</head>

<body>
    <div class="rejilla">
        <div class="item">
            Rellene los campos para logarse y pulse aceptar
        </div>

        <div class="item">
            <form method="post" class="signin" action="control.php">
                <fieldset>
                    <div>
                        <label>
                            <span>Usuario</span>
                            <input id="usuario" name="usuario" value="" type="text" autocomplete="on" placeholder="Usuario" required>
                        </label>
                    </div>
                    <div>
                        <label>
                            <span>Contrase&ntilde;a</span>
                            <input id="contrasena" name="contrasena" value="" type="password" placeholder="Contrase&ntilde;a" required>
                        </label>
                    </div>
                    <div>
                        <input class="boton" type="submit" id="go" value="Ingresar">
                        <input class="boton" type="button" id="cancel" value="Cancelar" onClick="window.location.href='./index.php'">
                    </div>
                </fieldset>
            </form>
        </div>

    </div>

    <nav class="footer">Carla Narcisa Oliveira de la Calle. <span class="copyleft"> &copy; </span> OdlC 2019 · Todos los
        derechos reservados</nav>

</body>

</html>