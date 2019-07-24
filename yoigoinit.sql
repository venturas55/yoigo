
CREATE TABLE yoigopreguntas(
    id int(5) NOT NULL,
    pregunta varchar(250),
    peso int(4) default 1,
    PRIMARY KEY (id)
)engine=innodb DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='tabla de preguntas';


CREATE TABLE yoigotiendas(
    nombre varchar (50) NOT NULL,
    ubicacion varchar (70),
    observaciones varchar (250),
    PRIMARY KEY (nombre)
) engine=innodb DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci  COMMENT='tabla de tiendas';


    CREATE TABLE yoigoevaluaciones(
    tienda varchar(50) NOT NULL,
    id_pregunta int(5) NOT NULL,
    respuesta varchar(10),
    PRIMARY KEY (tienda, id_pregunta),
    CONSTRAINT tienda_FK FOREIGN KEY (tienda) REFERENCES yoigotiendas(nombre),
    CONSTRAINT pregunta_FK FOREIGN KEY (id_pregunta) REFERENCES yoigopreguntas(id)
) engine=innodb DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci  COMMENT='tabla de evaluaciones';

