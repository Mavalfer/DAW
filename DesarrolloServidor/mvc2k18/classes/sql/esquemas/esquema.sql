create database appenero default character set utf8 collate utf8_unicode_ci;

create user uenero@localhost identified by 'cenero';

grant all on appenero.* to uenero@localhost;

flush privileges;

use appenero;

create table if not exists usuario (
    id bigint not null auto_increment primary key,
    nombre varchar(20) not null,
    apellidos varchar(40) not null,
    alias varchar (20) not null unique,
    correo varchar(80) not null unique,
    clave varchar(250) not null,
    tipo varchar(40) not null,
    fechaalta varchar(10) not null,
    verificado tinyint(1) not null default 0
) engine = innodb default character set = utf8 collate utf8_unicode_ci;