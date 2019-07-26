
CREATE TABLE preguntas(
    id int(5) NOT NULL,
    pregunta varchar(250),
    peso int(4) default 1,
    PRIMARY KEY (id)
)engine=innodb DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='tabla de preguntas';


CREATE TABLE tiendas(
    nombre varchar (50) NOT NULL,
    ubicacion varchar (70),
    observacion varchar (250),
    PRIMARY KEY (nombre)
) engine=innodb DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci  COMMENT='tabla de tiendas';


CREATE TABLE evaluaciones(
    tienda varchar(50) NOT NULL,
    id_pregunta int(5) NOT NULL,
    respuesta varchar(10),
    PRIMARY KEY (tienda, id_pregunta),
    CONSTRAINT tienda_FK FOREIGN KEY (tienda) REFERENCES tiendas(nombre) ON UPDATE CASCADE,
    CONSTRAINT pregunta_FK FOREIGN KEY (id_pregunta) REFERENCES preguntas(id) ON UPDATE CASCADE
) engine=innodb DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci  COMMENT='tabla de evaluaciones';

