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
    <script src="./js/script.js"></script>
    <style type="text/css">
        body {
            background: url(./img/playa.jpg) no-repeat center center;
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
        <button @click="nuevoItem=true">NUEVA TIENDA</button>
        <br>
        <table>
            <thead>
                <th>Nombre</th>
                <th>Ubicacion</th>
                <th>Observaciones</th>
                <th>ACCION</th>
                <th>ACCION</th>
                <th>ACCION</th>
            </thead>
            <tbody>
                <tr v-for="tienda in tiendas">
                    <td>{{tienda.nombre}}</td>
                    <td>{{tienda.ubicacion}}</td>
                    <td>{{tienda.observacion}}</td>
                    <td>
                        <button @click="elegirTienda(tienda);verModificar=true"> MODIFICAR
                            EVALUACION
                        </button>
                    </td>
                    <td>
                        <button @click="elegirTienda(tienda);verEvaluacion=true"> MOSTRAR
                            EVALUACION</button>
                    </td>
                    <td>
                        <button @click="elegirTienda(tienda);verEliminaItem=true">ELIMINAR</button>
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
                    <p> Nombre<input type="text" name="nombre" id="nombre"></p>
                    <p> Ubicacion<input type="text" name="ubicacion" id="ubicacion"></p>
                    <p> Observacion <input type="text" name="observacion" id="observacion"></p>
                    <button @click="nuevoItem=false;insertarTienda()">CREAR</button>
                </div>
            </div>
        </div>



        <!-- modificar EVALUACION  -->
        <div class="contenedor" v-if="verModificar">
            <div class="modal">
                <div class="header">
                    <button class="close" @click="verModificar=false">X</button>
                    <h1>MODIFICAR EVALUACION</h1>
                </div>
                <div class="contenido">
                    <p> {{elegida.nombre}} ubicada en {{elegida.ubicacion}}</p>
                    <table>
                        <tr v-for="pregunta in evaluacion">
                            <td>{{pregunta.id_pregunta | grupo}}</td>
                            <td>{{pregunta.pregunta}}</td>
                            <td>{{pregunta.peso}}</td>
                            <td>{{pregunta.respuesta}}</td>
                            <td><select v-bind:id="'respuesta'+pregunta.id">
                                    <option value="bien">Bien</option>
                                    <option value="regular">Regular</option>
                                    <option value="mal">Mal</option>
                                    <option value="n/a">N/A</option>
                                </select>
                            </td>
                        </tr>

                        <button @click="modificarEvaluacion();verModificar=false">ACTUALIZAR DATOS</button>
                    </table>
                </div>
            </div>
        </div>

        <!-- ver EVALUACION  -->
        <div class="contenedor" v-if="verEvaluacion">
            <div class="modal">
                <div class="header">
                    <button class="close" @click="verEvaluacion=false">X</button>
                    <h1>MOSTRAR EVALUACION</h1>
                </div>
                <div class="contenido">
                    <div class="top">
                        <p>------------------------TIENDA----------------------</p>
                        <p> {{elegida.nombre}} ubicada en {{elegida.ubicacion}}</p>
                    </div>
                    <div class="middle">
                        <table>
                            <th>
                            <td colspan="3"> EVALUACION</td>
                            </th>
                            <tr v-for="pregunta in evaluacion">
                                <td> {{pregunta.id_pregunta}} </td>
                                <td> {{pregunta.pregunta}} </td>
                                <td>{{pregunta.respuesta}}</td>
                                <td v-if="pregunta.respuesta==='bien'">
                                    <span v-bind:id="'pp'+pregunta.id">{{(pregunta.peso)}}</span>
                                </td>
                                <td v-else-if="pregunta.respuesta==='regular'">
                                    <span v-bind:id="'pp'+pregunta.id">0</span>
                                </td>
                                <td v-else-if="pregunta.respuesta==='mal'">
                                    <span v-bind:id="'pp'+pregunta.id">{{(pregunta.peso)*-1}}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="bottom">
                        <p>---------------------VALORACION TOTAL------------------------- </p>
                        <p> Valoración de la tienda: {{calculototal}}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- eliminar item -->
        <div class="contenedor" v-if="verEliminaItem">
            <div class="modal">
                <div class="header">
                    <button class="close" @click="verEliminaItem=false">X</button>
                    <h1>ELIMINAR TIENDA</h1>
                </div>
                <div class="contenido">
                    <p> Está seguro de que desea borrar la tienda </p>
                    <input type="hidden" id="did" name="did" v-model="elegida.nombre">
                    <p> {{elegida.nombre}} ubicada en {{elegida.ubicacion}}</p>
                    <p>Esto también borrará su evaluacion</p>
                    <button @click="verEliminaItem=false;eliminarTienda()">SI</button>
                    <button @click="verEliminaItem=false">NO</button>
                </div>
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
                tiendas: [],
                evaluacion: [],
                preguntas: [],
                elegida: {},
            },
            mounted: function() {
                this.mostrartiendas(),
                    this.mostrarPreguntas()
            },
            filters: {
                grupo: function(val) {
                    return val.charAt(0);
                }
            },
            methods: {
                insertarTienda: function() {
                    let formdata = new FormData();
                    formdata.append("nombre", document.getElementById("nombre").value)
                    formdata.append("ubicacion", document.getElementById("ubicacion").value)
                    formdata.append("observacion", document.getElementById("observacion").value)
                    axios.post("./api.php?accion=insertarTienda", formdata)
                        .then(function(response) {
                            console.log(response)
                        })
                    window.location.reload(true); //The parameter set to 'true' reloads a fresh copy from the server. Leaving it out will serve the page from cache.
                },
                mostrartiendas: function() {
                    axios.get("./api.php?accion=mostrarTiendas")
                        .then(function(response) {
                            console.log(response)
                            app.tiendas = response.data.respuesta
                        })
                },
                mostrarPreguntas: function() {
                    axios.get("./api.php?accion=mostrarPreguntas")
                        .then(function(response) {
                            console.log(response)
                            app.preguntas = response.data.respuesta
                        })
                },
                cargarEvaluacion: function() {
                    let formdata = new FormData();
                    formdata.append("condicion", app.elegida.nombre)
                    axios.post("./api.php?accion=mostrarEvaluacion", formdata) //si hay formdata requiere post!!
                        .then(function(response) {
                            console.log(response)
                            app.evaluacion = response.data.respuesta
                            app.total = response.data.total
                        })
                },
                modificarEvaluacion: function() {

                    let formdata = new FormData();
                    formdata.append("tienda", app.elegida.nombre)
                    formdata.append("r1001", document.getElementById("respuesta1001").value)
                    formdata.append("r1002", document.getElementById("respuesta1002").value)
                    formdata.append("r1003", document.getElementById("respuesta1003").value)
                    formdata.append("r1004", document.getElementById("respuesta1004").value)
                    formdata.append("r1005", document.getElementById("respuesta1005").value)
                    formdata.append("r2001", document.getElementById("respuesta2001").value)
                    formdata.append("r2002", document.getElementById("respuesta2002").value)
                    formdata.append("r2003", document.getElementById("respuesta2003").value)
                    formdata.append("r2004", document.getElementById("respuesta2004").value)
                    formdata.append("r2005", document.getElementById("respuesta2005").value)
                    formdata.append("r2006", document.getElementById("respuesta2006").value)
                    formdata.append("r2007", document.getElementById("respuesta2007").value)
                    formdata.append("r3001", document.getElementById("respuesta3001").value)
                    formdata.append("r3002", document.getElementById("respuesta3002").value)
                    formdata.append("r3011", document.getElementById("respuesta3011").value)
                    formdata.append("r3012", document.getElementById("respuesta3012").value)
                    formdata.append("r4001", document.getElementById("respuesta4001").value)
                    formdata.append("r4002", document.getElementById("respuesta4002").value)
                    formdata.append("r4003", document.getElementById("respuesta4003").value)
                    formdata.append("r4004", document.getElementById("respuesta4004").value)
                    axios.post("./api.php?accion=modificarEvaluacion", formdata)
                        .then(function(response) {
                            console.log(response)
                        })
                },

                eliminarTienda: function() {
                    let formdata = new FormData();
                    formdata.append("condicion", document.getElementById("did").value)
                    axios.post("./api.php?accion=eliminarTienda", formdata)
                        .then(function(response) {
                            console.log(response)
                        })
                    window.location.reload(true);
                },
                elegirTienda(tienda) {
                    var self = this;
                    app.elegida = tienda
                    self.cargarEvaluacion()
                }
            },
            computed: {
                calculototal: function() {
                    var self = this;
                    var acum = 0;
                    for (var i = 0; i < 20; i++) { //self.evaluacion.length
                        if (self.evaluacion[i].respuesta == 'bien') //Bien valorado
                            acum += parseInt(self.evaluacion[i].peso); //suma
                        else if (self.evaluacion[i].respuesta == 'mal') //mal valorado
                            acum -= parseInt(self.evaluacion[i].peso); //resta
                    }
                    return acum;
                }
            }

        })
    </script>
</body>

</html>