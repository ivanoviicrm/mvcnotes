CREATE DATABASE mvcnotes;

USE mvcnotes;

CREATE TABLE notas (
    id          int not null auto_increment,
    titulo      varchar(250) not null,
    contenido   text not null,
    color       varchar(50) not null,
    fecha       datetime not null,
    CONSTRAINT pk_notas PRIMARY KEY (id)
);