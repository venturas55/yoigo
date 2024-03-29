<?php
    include './seguridad.php';
    include './src/funciones.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Carla ODLC Yoigo</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">
    <style type="text/css">
        body {
            background: url(./img/calles.jpg) no-repeat center center;
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
        <button @click="nuevoItem=true">NUEVA PREGUNTA</button>
        <br>
        <table>
            <thead>
                <th>#</th>
                <th>Pregunta</th>
                <th>Peso</th>
                <th>ACCION</th>
                <th>ACCION</th>
            </thead>
            <tbody>
                <tr v-for="pregunta in preguntas">
                    <td>{{pregunta.id}}</td>
                    <td>{{pregunta.pregunta}}</td>
                    <td>{{pregunta.peso}}</td>
                    <td>
                        <button @click="elegirPregunta(pregunta);verModificar=true"> MODIFICAR
                            PREGUNTA
                        </button>
                    </td>
                    <td>
                        <button @click="elegirPregunta(pregunta);verEliminaItem=true">ELIMINAR</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <br>
        <!-- nuevo item -->
        <div class="contenedor" v-if="nuevoItem">
            <div class="modal">
                <div class="header">
                    <button class="close" @click="nuevoItem=false">X</button>
                    <h1>Nueva Tienda</h1>
                </div>
                <div class="contenido">
                    <p> ID<input type="text" name="id" id="id"></p>
                    <p> Pregunta<input type="text" name="pregunta" id="pregunta"></p>
                    <p> peso <input type="number" name="peso" id="peso"></p>
                    <button @click="nuevoItem=false;insertarPregunta()">CREAR</button>
                </div>
            </div>
        </div>

        <!-- modificar EVALUACION  -->
        <div class="contenedor" v-if="verModificar">
            <div class="modal">
                <div class="header">
                    <button class="close" @click="verModificar=false">X</button>
                    <h1>MODIFICAR PREGUNTA</h1>
                </div>
                <div class="contenido">
                    <table>
                        <tr>
                            <td>ID</td>
                            <td>PREGUNTA</td>
                            <td>PESO</td>
                        </tr>
                        <tr>
                            <td> <input type="text" :value="elegida.id" id="modid"></td>
                            <td> <input type="text" :value="elegida.pregunta" id="modpregunta"></td>
                            <td> <input type="text" :value="elegida.peso" id="modpeso"></td>
                        </tr>
                        <tr>
                            <td colspan="3"> <button @click="modificarPregunta();verModificar=false">ACTUALIZAR
                                    PREGUNTA</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- eliminar item -->
        <div class="contenedor" v-if="verEliminaItem">
            <div class="modal">
                <div class="header">
                    <button class="close" @click="verEliminaItem=false">X</button>
                    <h1>Eliminar tienda</h1>
                </div>
                <div class="contenido">
                    <p> Está seguro de que desea borrar la pregunta </p>
                    <input type="hidden" id="did" name="did" v-model="elegida.id">
                    <p> {{elegida.id}} {{elegida.pregunta}}</p>
                    <button @click="verEliminaItem=false;eliminarPregunta()">SI</button>
                    <button @click="verEliminaItem=false">NO</button>
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
                nuevoItem: false,
                verEvaluacion: false,
                verEliminaItem: false,
                verModificar: false,
                preguntas: [],
                elegida: {},
            },
            mounted: function() {
                this.mostrarPreguntas()
            },
            filters: {
                grupo: function(val) {
                    return val.charAt(0);
                }
            },
            methods: {
                insertarPregunta: function() {
                    let formdata = new FormData();
                    formdata.append("id", document.getElementById("id").value)
                    formdata.append("pregunta", document.getElementById("pregunta").value)
                    formdata.append("peso", document.getElementById("peso").value)
                    axios.post("./api.php?accion=insertarPregunta", formdata)
                        .then(function(response) {
                            console.log(response)
                        })
                },
                mostrarPreguntas: function() {
                    axios.get("./api.php?accion=mostrarPreguntas")
                        .then(function(response) {
                            console.log(response)
                            app.preguntas = response.data.respuesta
                        })
                },
                modificarPregunta: function() {
                    let formdata = new FormData();
                    formdata.append("idsel", app.elegida.id)
                    formdata.append("id", document.getElementById("modid").value)
                    formdata.append("pregunta", document.getElementById("modpregunta").value)
                    formdata.append("peso", document.getElementById("modpeso").value)
                    axios.post("./api.php?accion=modificarPregunta", formdata)
                        .then(function(response) {
                            console.log(response)
                        })
                },
                eliminarPregunta: function() {
                    let formdata = new FormData();
                    formdata.append("condicion", document.getElementById("did").value)
                    axios.post("./api.php?accion=eliminarPregunta", formdata)
                        .then(function(response) {
                            console.log(response)
                        })
                },
                elegirPregunta(pregunta) {
                    var self = this;
                    app.elegida = pregunta
                }
            }
        })
    </script>
</body>

</html>