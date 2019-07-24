var app = new Vue({
  el: "#app",
  data: {
    nuevoItem: false,
    editarItem: false,
    eliminarItem: false,
    balizas: [],
  },
  mounted: function (){
    this.mostrarListado() 
  },
  methods: {
    mostrarListado:function(){
      axios.get("http://localhost/vuejsmysql/api.php?accion=mostrar")
        .then(function (response){
          console.log(response)
          app.balizas = response.data.balizas
        })
    },
    insertarBaliza:function(){
      console.log("working")
       /*  let formdata=new FormData()
          formdata("nif",$("#nif").value)
          formdata("internacional",$("#internacional").value)
          formdata("tipo",$("#tipo").value)
          formdata("telecontrol",$("#telecontrol").value)
          formdata("apariencia",$("#apariencia").value)
          formdata("periodo",$("#periodo").value)
          formdata("caracteristica",$("#caracteristica").value)
          axios.post("http://localhost/vuejsmysql/api.php?accion=crear",formdata)
        .then(function (response){
          console.log(response)
        }) */
        },
  }
})