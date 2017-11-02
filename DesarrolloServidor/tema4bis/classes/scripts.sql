/* 1º crear la base de datos */
create database dwes
default character set utf8
collate utf8_unicode_ci;

/* 2º crear el usuario administrador de esa base de datos */
create user udwes@localhost
identified by 'cdwes';

grant all
on dwes.* to
udwes@localhost;

flush privileges;

/* 3º crear las tablas */
create table if not exists car (
    id bigint not null auto_increment,
    marca varchar(30) not null,
    modelo varchar(40) not null,
    primary key (id),
    unique(marca, modelo)
) engine=innodb default character set = utf8 collate utf8_unicode_ci;

create table if not exists carold (
    marca varchar(30),
    modelo varchar(40),
    primary key(marca, modelo)
) engine=innodb default character set = utf8 collate utf8_unicode_ci;

create table if not exists contacto (
    id bigint not null auto_increment primary key,
    nombre varchar(40) not null unique
) engine=innodb default character set = utf8 collate utf8_unicode_ci;

create table if not exists telefono (
    id bigint not null auto_increment primary key,
    idcontacto bigint not null,
    telefono varchar(15) not null,
    descripcion varchar(20) null,
    foreign key(idcontacto) references contacto(id) on delete restrict
) engine=innodb default character set = utf8 collate utf8_unicode_ci;

/* SELECT * FROM contacto co join telefono te on co.id=te.idcontacto */