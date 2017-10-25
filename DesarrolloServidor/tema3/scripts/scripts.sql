/*1º crear la base de datos*/
create database dwes
default character set utf8
collate utf8_unicode_ci;

/*2º crear el usuario administrador de la base de datos*/
create user udwes@localhost
identified by 'cdwes';

grant all
on dwes.* to
udwes@localhost;

flush privileges;

/*3º crear las tablas*/

create table if not exists car (
    id bigint not null auto_increment,
    marca varchar(30) not null,
    modelo varchar(40) not null,
    primary key (id),
    unique(marca, modelo)
) engine=innodb default character set = utf8 collate utf8_unicode_ci;

create table if not exists carold (
    marca varchar(30) not null,
    modelo varchar(40) not null,
    primary key (marca, modelo)
) engine=innodb default character set = utf8 collate utf8_unicode_ci;

create table if not exists contacto (
    id bigint not null auto_increment primary key,
    nombre varchar(40) not null unique
)engine=innodb default character set = utf8 collate utf8_unicode_ci;

create table if not exists telefono (
    id bigint not null auto_increment primary key,
    idContacto bigint not null,
    telefono varchar(15) not null,
    descripcion varchar(20) null,
    foreign key (idContacto) references contacto(id) on delete restrict
)engine=innodb default character set = utf8 collate utf8_unicode_ci;

/*on update cascade en este caso no tiene sentido porque el id no se va a updatear, on delete cascade si, y se puede poner on delete restrict, el cascade borra los registros relacionados con el que borremos, y el restrict impide borrar campos que tengan relacionados, en la calle es peligroso usar cascade, en caso de duda poner restrict para que no haya sustos, aunque para borrar sera mas coñazo, aunque en la calle casi nunca se borra nada*/

/*select * from contacto co join telefono te on co.id=te.idContacto ais no sale jose, porque no tiene telefono, hay que hacer un left join select * from contacto co left join telefono te on co.id=te.idContacto, porque me haga la union de telefono hacia contacto (izda)

select * from telefono te right join contacto co on co.id=te.idContacto sepuede cambiar el orden y pues sale un null en telefono. Tambien esta el full join
*/