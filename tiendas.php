<?php
    include './seguridad.php';
    include './funciones.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Carla ODLC Yoigo</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">
    <style type="text/css">
        body {
            background: url(./img/coche.jpg) no-repeat center center;
            background-size: cover;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            -o-background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>

<body>

<?php cabecera() ?>

    <div id="app">
        <br>
        <table>
            <thead>
                <th>NOMBRE</th>
                <th>UBICACION</th>
                <th>OBSERVACION</th>
                <th>ACCION</th>
            </thead>
            <tbody>
                <tr v-for="tienda in tiendas">
                    <td>{{tienda.nombre}}</td>
                    <td>{{tienda.ubicacion}}</td>
                    <td>{{tienda.observacion}}</td>
                    <td>
                        <button @click="elegirTienda(tienda);verModificar=true"> MODIFICAR
                        </button>
                    </td>

                </tr>
            </tbody>
        </table>

        <!-- modificar TIENDA  -->
        <div class="contenedor" v-if="verModificar">
            <div class="modal">
                <div class="header">
                    <button class="close" @click="verModificar=false">X</button>
                    <h1>MODIFICAR TIENDA</h1>
                </div>
                <div class="contenido">
                    <table>
                        <tr>
                            <td>NOMBRE</td>
                            <td>UBICACION</td>
                            <td>OBSERVACION</td>
                        </tr>
                        <tr>
                            <td> <input type="text" :value="elegida.nombre" id="modnombre"> </td>
                            <td> <input type="text" :value="elegida.ubicacion" id="modubicacion"> </td>
                            <td><input type="text" :value="elegida.observacion" id="modobservacion"> </td>
                        </tr>
                        <tr>
                            <td colspan="3"><button @click="modificarTienda();verModificar=false">ACTUALIZAR
                                    TIENDA</button> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php pie() ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>

    <script>
        var app = new Vue({
            el: "#app",
            data: {
                verModificar: false,
                tiendas: [],
                elegida: {},
            },
            mounted: function () {
                this.mostrarTiendas()
            },
            filters: {
                grupo: function (val) {
                    return val.charAt(0);
                }
            },
            methods: {
                mostrarTiendas: function () {
                    axios.get("./api.php?accion=mostrarTiendas")
                        .then(function (response) {
                            console.log(response)
                            app.tiendas = response.data.respuesta
                        })
                },
                modificarTienda: function () {
                    let formdata = new FormData();
                    formdata.append("nombresel", app.elegida.nombre)
                    formdata.append("nombre", document.getElementById("modnombre").value)
                    formdata.append("ubicacion", document.getElementById("modubicacion").value)
                    formdata.append("observacion", document.getElementById("modobservacion").value)
                    axios.post("./api.php?accion=modificarTienda", formdata)
                        .then(function (response) {
                            console.log(response)
                        })
                },
                elegirTienda(tienda) {
                    var self = this;
                    app.elegida = tienda
                }
            }
        })
    </script>
</body>

</html>