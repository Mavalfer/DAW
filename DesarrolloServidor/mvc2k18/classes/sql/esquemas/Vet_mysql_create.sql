CREATE TABLE `usuario` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`nombre` varchar(20) NOT NULL,
	`apellidos` varchar(40) NOT NULL,
	`alias` varchar(20) NOT NULL UNIQUE,
	`correo` varchar(80) NOT NULL UNIQUE,
	`clave` varchar(250) NOT NULL,
	`tipo` varchar(40) NOT NULL,
	`fechaalta` varchar(10) NOT NULL,
	`verificado` tinyint(1) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
);

CREATE TABLE `paciente` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`nombre` varchar(20) NOT NULL,
	`especie` varchar(40) NOT NULL,
	`dnidueño` varchar(9) NOT NULL,
	`idusuario` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `historia` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`motivo` varchar(100) NOT NULL,
	`descripcion` varchar(400) NOT NULL,
	`idpaciente` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `paciente` ADD CONSTRAINT `paciente_fk0` FOREIGN KEY (`idusuario`) REFERENCES `usuario`(`id`);

ALTER TABLE `historia` ADD CONSTRAINT `historia_fk0` FOREIGN KEY (`idpaciente`) REFERENCES `paciente`(`id`);

