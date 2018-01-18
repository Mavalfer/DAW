create database agenda default character set utf8 collate utf8_unicode_ci;

create user uagenda@localhost identified by 'cagenda';

grant all on agenda.* to uagenda@localhost;

flush privileges;

use agenda;

create table if not exists usuario (
    id bigint not null auto_increment primary key,
    correo varchar(80) not null unique,
    clave varchar(250) not null,
    verificado tinyint(1) not null default 0
) engine = innodb default character set = utf8 collate utf8_unicode_ci;

create table if not exists contacto (
    id bigint not null auto_increment primary key,
    idusuario bigint not null,
    nombre varchar(40) not null unique,
    foreign key (idusuario) references usuario(id) on delete restrict
) engine = innodb default character set = utf8 collate utf8_unicode_ci;

create table if not exists telefono (
    id bigint not null auto_increment primary key,
    idcontacto bigint not null,
    telefono varchar(15) not null,
    descripcion varchar(20) null,
    unique(idcontacto, telefono),
    foreign key (idcontacto) references contacto(id) on delete restrict
) engine = innodb default character set = utf8 collate utf8_unicode_ci;