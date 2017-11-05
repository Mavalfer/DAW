/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  admin
 * Created: 23-oct-2017
 */

/* Creacion de la base de datos */
create database dwes
default character set utf8
collate utf8_unicode_ci;

/* Crear el usuario administrador de la base de datos */

create user udwes@localhost
identified by 'cdwes';

grant all
on dwes.* to
udwes@localhost;

flush privileges;

/* Crear las tablas */

create table if not exists car(
    id bigint not null auto_increment,
    marca varchar(30) not null,
    modelo varchar(40) not null,
    primary key (id),
    unique(marca, modelo)
) engine = innodb default character set = utf8 collate utf8_unicode_ci;


create table if not exists carold(
    marca varchar(30) not null,
    modelo varchar(40) not null,
    primary key(marca, modelo)
) engine = innodb default character set = utf8 collate utf8_unicode_ci;

create table if not exists contacto(
    id bigint not null auto_increment,
    nombre varchar(40) not null,
    primary key (id),
    unique(nombre)
) engine = innodb default character set = utf8 collate utf8_unicode_ci;

create table if not exists telefono(
    id bigint not null auto_increment,
    idContacto bigint not null,
    telefono varchar(15) not null,
    descripcion varchar(20) null,
    primary key (id),
    foreign key (idContacto) references contacto (id) on delete restrict
) engine = innodb default character set = utf8 collate utf8_unicode_ci;