<?php
require "./src/conexion.php";
require "./src/funciones.php";
$conexion = new ApptivaDB();
//accion = mostrar, insertar, editar y eliminar


if (isset($_REQUEST['accion']))
    $accion = recoge('accion');
else
    $accion = "mostrar";

if (isset($_REQUEST['condicion']))
    $condicion = recoge('condicion');
else
    $condicion = "true";


$res = array("error" => false);

switch ($accion) {

    case 'mostrarTiendas':
        $u = $conexion->buscar("tiendas", $condicion);
        if ($u) :
            $res['respuesta'] = $u;
            $res['mensaje'] = "exito";
        else :
            $res['mensaje'] = "Sin registros";
            $res['error'] = true;
        endif;
        break;

    case 'mostrarPreguntas':
        $u = $conexion->buscar("preguntas", $condicion);
        if ($u) :
            $res['respuesta'] = $u;
            $res['mensaje'] = "exito";
        else :
            $res['mensaje'] = "Sin registros";
            $res['error'] = true;
        endif;
        break;

    case 'mostrarEvaluacion':
        $e = $conexion->buscar("preguntas p, evaluaciones e", "p.id=e.id_pregunta and e.tienda='" . $condicion . "' order by p.id asc");
        $acum = 0;
        if ($e) :
            $res['respuesta'] = $e;
            $res['mensaje'] = "exito";
            $res['total'] = $e[0]['respuesta'];
        else :
            $res['mensaje'] = "Sin registros";
            $res['error'] = true;
        endif;
        break;

    case 'insertarTienda':
        $nombre = recoge('nombre');
        $ubicacion = recoge('ubicacion');
        $observacion = recoge('observacion');

        $data = "('" . $nombre . "','" . $ubicacion . "','" . $observacion . "')";

        $b = $conexion->insertar("tiendas", $data);


        $v1 = "('" . $nombre . "','1001','')";
        $v2 = "('" . $nombre . "','1002','')";
        $v3 = "('" . $nombre . "','1003','')";
        $v4 = "('" . $nombre . "','1004','')";
        $v4bis = "('" . $nombre . "','1005','')";
        $v5 = "('" . $nombre . "','2001','')";
        $v6 = "('" . $nombre . "','2002','')";
        $v7 = "('" . $nombre . "','2003','')";
        $v8 = "('" . $nombre . "','2004','')";
        $v9 = "('" . $nombre . "','2005','')";
        $v10 = "('" . $nombre . "','2006','')";
        $v11 = "('" . $nombre . "','2007','')";
        $v12 = "('" . $nombre . "','3001','')";
        $v13 = "('" . $nombre . "','3002','')";
        $v14 = "('" . $nombre . "','3011','')";
        $v15 = "('" . $nombre . "','3012','')";
        $v16 = "('" . $nombre . "','4001','')";
        $v17 = "('" . $nombre . "','4002','')";
        $v18 = "('" . $nombre . "','4003','')";
        $v19 = "('" . $nombre . "','4004','')";
        $data = $v1 . "," . $v2 . "," . $v3 . "," . $v4 . "," . $v4bis . "," . $v5 . "," . $v6 . "," . $v7 . "," . $v8 . "," . $v9 . "," . $v10 . "," . $v11 . "," . $v12 . "," . $v13 . "," . $v14 . "," . $v15 . "," . $v16 . "," . $v17 . "," . $v18 . "," . $v19;

        $e = $conexion->insertar("evaluaciones", $data);

        if ($b && $e) :
            $res['mensaje'] = "Insercion exitosa";
        else :
            $res['mensaje'] = "Insercion fallida";
            $res['error'] = true;
        endif;
        break;

    case 'insertarPregunta':
        $nombre = recoge('id');
        $ubicacion = recoge('pregunta');
        $observacion = recoge('peso');

        $data = "('" . $nombre . "','" . $ubicacion . "','" . $observacion . "')";

        $b = $conexion->insertar("preguntas", $data);

        if ($b) :
            $res['mensaje'] = "Insercion exitosa";
        else :
            $res['mensaje'] = "Insercion fallida";
            $res['error'] = true;
        endif;
        break;

    case 'modificarEvaluacion':
        $tienda = recoge('tienda');
        $e = $conexion->borrar("evaluaciones", "tienda='" . $tienda . "'");

        $v1 = "('" . $tienda . "','1001','" . recoge('r1001') . "')";
        $v2 = "('" . $tienda . "','1002','" . recoge('r1002') . "')";
        $v3 = "('" . $tienda . "','1003','" . recoge('r1003') . "')";
        $v4 = "('" . $tienda . "','1004','" . recoge('r1004') . "')";
        $v4bis = "('" . $tienda . "','1005','" . recoge('r1005') . "')";
        $v5 = "('" . $tienda . "','2001','" . recoge('r2001') . "')";
        $v6 = "('" . $tienda . "','2002','" . recoge('r2002') . "')";
        $v7 = "('" . $tienda . "','2003','" . recoge('r2003') . "')";
        $v8 = "('" . $tienda . "','2004','" . recoge('r2004') . "')";
        $v9 = "('" . $tienda . "','2005','" . recoge('r2005') . "')";
        $v10 = "('" . $tienda . "','2006','" . recoge('r2006') . "')";
        $v11 = "('" . $tienda . "','2007','" . recoge('r2007') . "')";
        $v12 = "('" . $tienda . "','3001','" . recoge('r3001') . "')";
        $v13 = "('" . $tienda . "','3002','" . recoge('r3002') . "')";
        $v14 = "('" . $tienda . "','3011','" . recoge('r3011') . "')";
        $v15 = "('" . $tienda . "','3012','" . recoge('r3012') . "')";
        $v16 = "('" . $tienda . "','4001','" . recoge('r4001') . "')";
        $v17 = "('" . $tienda . "','4002','" . recoge('r4002') . "')";
        $v18 = "('" . $tienda . "','4003','" . recoge('r4003') . "')";
        $v19 = "('" . $tienda . "','4004','" . recoge('r4004') . "')";
        $data = $v1 . "," . $v2 . "," . $v3 . "," . $v4 . "," . $v4bis . "," . $v5 . "," . $v6 . "," . $v7 . "," . $v8 . "," . $v9 . "," . $v10 . "," . $v11 . "," . $v12 . "," . $v13 . "," . $v14 . "," . $v15 . "," . $v16 . "," . $v17 . "," . $v18 . "," . $v19;

        $b = $conexion->insertar("evaluaciones", $data);
        if ($b) :
            $res['mensaje'] = "Insercion exitosa";
        else :
            $res['mensaje'] = "Insercion fallida";
            $res['error'] = true;
        endif;
        break;

    case 'modificarPregunta':
        $v0 = recoge('idsel');
        $v1 = recoge('id');
        $v2 = recoge('pregunta');
        $v3 = recoge('peso');
        $campos = "id='" . $v1 . "', pregunta='" . $v2 . "',peso=" . $v3;
        $condicion = "id='" . $v0 . "'";
        $res['consulta'] = "update preguntas set ".$campos." where ".$condicion;
        $b = $conexion->actualizar("preguntas", $campos, $condicion);
        if ($b) :
            $res['mensaje'] = "Modificación exitosa";
            
        else :
            //$res['consulta'] = "update ".$tabla." set ".$campos." where ".$condicion;
            $res['mensaje'] = "Modificación fallida";
            $res['error'] = true;
        endif;
        break;

    case 'modificarTienda':
        $v0 = recoge('nombresel');
        $v1 = recoge('nombre');
        $v2 = recoge('ubicacion');
        $v3 = recoge('observacion');
        $campos ="nombre='" . $v1 .     "', ubicacion='" . $v2 . "',observacion='" . $v3 . "'";
        $condicion = "nombre='" . $v0 . "'";
        $res['consulta'] = "update tiendas set ".$campos." where ".$condicion;
        $b = $conexion->actualizar("tiendas", $campos, $condicion);
        if ($b) :
            $res['mensaje'] = "Modificación tienda exitosa";
           
        else :
            //$res['consulta'] = "update ".$tabla." set ".$campos." where ".$condicion;
            $res['mensaje'] = "Modificación tienda fallida";
            $res['error'] = true;
        endif;
        break;

    case 'editar':
        echo "editar";
        break;

    case 'eliminarTienda':
        $e = $conexion->borrar("evaluaciones", "tienda='" . $condicion . "'");
        $t = $conexion->borrar("tiendas", "nombre='" . $condicion . "'");
        if ($e && $t) :
            $res['mensaje'] = "Borrado exitoso";
        else :
            $res['mensaje'] = "Borrado fallido";
            $res['error'] = true;
        endif;
        break;

    case 'eliminarPregunta':
        $t = $conexion->borrar("preguntas", "id='" . $condicion . "'");
        if ($t) :
            $res['mensaje'] = "Borrado de pregunta exitoso";
        else :
            $res['mensaje'] = "Borrado de pregunta fallido";
            $res['error'] = true;
        endif;
        break;


    default:
            $res['mensaje'] = "Case default";
        # <code class=""></code>
        break;
}
//nos retorna json
echo json_encode($res);
die();
