create database liceo collate utf8_general_ci;

create table usuario(
	id int(2) not null primary key auto_increment,
	usuario varchar(45),
	clave varchar(45)
);

create table periodo(
	id int(4) not null primary key auto_increment,
	fInicio date,
	fFinal date
);

create table anio(
	id int(4) not null primary key auto_increment,
	anio int(1),
	periodo int(4)
);

create table materia(
	id int(4) not null primary key auto_increment,
	nombre varchar(45),
	anio int(1),
	profesor int(8)
);

create table seccion(
	id int(4) not null primary key auto_increment,
	letra char,
	anio int(1)
);

create table profesor(
	ci int(8) not null primary key auto_increment,
	nombre text(90)
);

create table prof_materia(
	prof int(8),
	materia int(4),
	seccion int(4)
);

create table alumno(
	ci int(8) not null primary key auto_increment,
	nombre text(90),
	anio int(1),
	seccion int(4)
);

create table nota_materia(
	materia int(4),
	alumno int(8),
	lapso1 int(2),
	lapso2 int(2),
	lapso3 int(2)
);
