# yoigo
Paginita para Carlita

Basado en tres tablas de la BBDD

tabla "tiendas",Donde se definen las tiendas:
      Nombre (primary key)
      ubicacion
      observacion

tabla "preguntas", Bateria de 20 preguntas fijas,si se tuvieran que añadir preguntas habría que añadir codigo...
    Id pregunta
    Pregunta
    Peso, para ponderar
    

tabla "evaluaciones" Se almacenan las respuestas de cada pregunta para cada tienda. Por ello la clave principal es (tienda,id_pregunta)
    tienda, clave foranea de la tabla tienda (columna nombre)
    id_pregunta, clave foranea de la tabla preguntas (columna id)
    respuesta, es la respuesta almacenada para una tienda y una pregunta dada.
    
    
    
  
