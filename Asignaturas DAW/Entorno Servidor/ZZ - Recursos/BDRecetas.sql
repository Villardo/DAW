create database recetas;

use recetas;

create table provincia
( codigo char(2) not null,
nombre varchar(40) not null,
constraint pk_provincia primary key (codigo));

create table chef
( codigo smallint not null,
nombre varchar(30) not null,
apellido1 varchar(30) not null,
apellido2 varchar(30) null,
nombreartistico varchar(40) null,
sexo char(1) null,
data_nacimiento date null,
localidad varchar(50) null,
cod_provincia char(2) null,
constraint pk_chef primary key (codigo),
constraint ck_sexo check (sexo in ('H','M')),
constraint fk_chef_provincia foreign key (cod_provincia) references provincia(codigo)
);

create table grupo
( codigo tinyint not null,
nombre varchar(40) not null,
constraint pk_grupo primary key (codigo));

create table ingrediente
( codigo smallint not null,
nombre varchar(40) not null,
constraint pk_ingrediente primary key (codigo));


create table receta
( codigo smallint not null,
nombre varchar(120) not null,
cod_grupo tinyint not null,
dificultad varchar(7) not null,
tiempo tinyint null,
elaboración varchar(300) null,
cod_chef smallint not null,
constraint pk_receta primary key (codigo),
constraint ck_dificultad check (dificultad in ('Fácil','Media','Difícil')),
constraint fk_receta_chef foreign key (cod_chef) references chef(codigo)
);

create table receta_ingrediente
( cod_receta smallint not null,
cod_ingrediente smallint not null,
cantidad smallint null,
medida varchar(40) null,
constraint pk_receta_ingrediente primary key (cod_receta, cod_ingrediente),
constraint fk_receta_ingrediente foreign key (cod_ingrediente) references ingrediente(codigo),
constraint fk_receta_receta foreign key (cod_receta) references receta(codigo)
);


insert into provincia values ('27','Lugo');
insert into provincia values ('15','A Coruña');
insert into provincia values ('24','León');
insert into provincia values ('28','Madrid');
insert into provincia values ('32','Ourense');
insert into provincia values ('36','Pontevedra');


insert into GRUPO values (1,'ENTRANTES');
insert into GRUPO values (2,'TAPAS');
insert into GRUPO values (3,'ARROCES');
insert into GRUPO values (4,'PASTAS');
insert into GRUPO values (5,'VERDURAS');
insert into GRUPO values (6,'CARNES');
insert into GRUPO values (7,'PESCADOS');
insert into GRUPO values (8,'MARISCOS');
insert into GRUPO values (9,'SOBREMESAS');

insert into INGREDIENTE values (1,'GUISANTE');
insert into INGREDIENTE values (2,'JUDIAS');
insert into INGREDIENTE values (3,'ZANAHORIA');
insert into INGREDIENTE values (4,'BRÓCOLI');
insert into INGREDIENTE values (5,'PATATAS');
insert into INGREDIENTE values (6,'SAL');
insert into INGREDIENTE values (7,'AZUCAR');
insert into INGREDIENTE values (8,'PIMIENTA');
insert into INGREDIENTE values (9,'COMINO');
insert into INGREDIENTE values (10,'ALMEJAS');
insert into INGREDIENTE values (11,'MEJILLONES');
insert into INGREDIENTE values (12,'ARROZ');
insert into INGREDIENTE values (13,'TALLARINES');
insert into INGREDIENTE values (14,'MACARRONES');
insert into INGREDIENTE values (15,'HUEVOS');
insert into INGREDIENTE values (16,'NATA');
insert into INGREDIENTE values (17,'CHAMPIÑONES');
insert into INGREDIENTE values (18,'PIMIENTOS');
insert into INGREDIENTE values (19,'AJO PORRO');
insert into INGREDIENTE values (20,'CEBOLLA');
insert into INGREDIENTE values (21,'AJO');
insert into INGREDIENTE values (22,'LECHE');
insert into INGREDIENTE values (23,'QUESO');
insert into INGREDIENTE values (24,'GARBANZOS');
insert into INGREDIENTE values (25,'SOLOMILLO');
insert into INGREDIENTE values (26,'HARINA');
insert into INGREDIENTE values (27,'MANTEQUILLA');
insert into INGREDIENTE values (28,'LEVADURA');
insert into INGREDIENTE values (29,'LECHE CONDENSADA');
insert into INGREDIENTE values (30,'FRESA');
insert into INGREDIENTE values (31,'LIMÓN');
insert into INGREDIENTE values (32,'MERMELADA');
insert into INGREDIENTE values (33,'ACEITE');
insert into INGREDIENTE values (34,'ROBALIZA');
insert into INGREDIENTE values (35,'CURRY');
insert into INGREDIENTE values (36,'MANZANAS');
insert into INGREDIENTE values (37,'PIÑA');
insert into INGREDIENTE values (38,'ESPINACAS');


insert into chef values (1,'XULIAN','CONDE','FLORES','XULIANICO','H','1969-5-6','NIGRÁN','36');
insert into chef values (2,'MARIA','MAGADÁN','PÉREZ','MAMA MAGA','M','1973-12-6','MONFORTE','27');
insert into chef values (3,'FELIPE','ARIAS','CONDE','FELIPIN','H','1964-1-1','PONTEVEDRA','36');
insert into chef values (4,'XOEL','GARCÍA','BARREIRO','EL TITO','H','1973-11-9','LUGO','27');
insert into chef values (5,'MIRIAM','LÓPEZ','SIERRA','MIRINDA','M','1959-4-4','SANTIAGO','15');
insert into chef values (6,'BELÉN','REDONDO','RUIZ','BELBELÉN','M','1965-3-2','SANTIAGO','15');
insert into chef values (7,'LUCIA','TARREGA','VARELA','LUCITA','M','1967-10-12','ALCOBENDAS','28');
insert into chef values (8,'MARISA','GIL','PEREIRA','PERITA EN DULCE','M','1973-2-11','A ESTRADA','36');
insert into chef values (9,'CARLOS','DIEGUEZ','RODRÍGUEZ','CARLIÑOS','H','1969-8-5','NEGREIRA','15');
insert into chef values (10,'ELISEO','SEOANE','SEOANE','SEOANE','H','1971-2-3','LUGO','27');
insert into chef values (11,'CHEMA','VARELA','RODRIGUEZ','CHEMITA','H','1971-1-12','PONTEVEDRA','36');



INSERT INTO receta VALUES (1,'ARROZ AL COMINO',3,'Media',50,'Se ahoga en aceite el AJO PORRO con ....',11);
INSERT INTO receta VALUES (2,'PIMIENTOS RELLENOS',5,'Difícil',80,'Se asan los PIMIENTOS ....',11);
INSERT INTO receta VALUES (3,'PEZ BLANCO',2,'Difícil',45,'Se cuecen los GARBANZOS en ....',8);
INSERT INTO receta VALUES (4,'TALLARINES VERDES',4,'Fácil',25,'Se cuecen los TALLARINES en agua salada y ...',6);
INSERT INTO receta VALUES (5,'PASTA CON SETAS',4,'Media',45,'Se pone a ...',6);
INSERT INTO receta VALUES (6,'ROBALIZA A LA SAL',7,'Fácil',30,'Precalentar el horno a ...',3);
INSERT INTO receta VALUES (7,'FRESAS AL PIMIENTO DE JAMAICA',9,'Fácil',15,'Lavar las fresas y',11);
INSERT INTO receta VALUES (8,'TARTA DE MANZANA',9,'Media',60,'Mezclar la HARINA ..',4);
INSERT INTO receta VALUES (9,'QUESO CON PIÑA',1,'Fácil',15,'Se corta la ..',7);
INSERT INTO receta VALUES (10,'ALMEJAS VERDES',9,'Difícil',90,'Se cuecen las ...',1);
INSERT INTO receta VALUES (11,'MEJILLONES RELLENOS',9,'Difícil',80,'Se cuecen las ...',3);
INSERT INTO receta VALUES (12,'HUEVOS DULCES',1,'Media',30,'Se cuecen los ...',5);
INSERT INTO receta VALUES (13,'FRESAS CON NATA',9,'Fácil',20,'Batir a ...',9);
INSERT INTO receta VALUES (14,'SOLOMILLO A LA PIMIENTA',6,'Fácil',20,'Se ...',10);
INSERT INTO receta VALUES (15,'SOLOMILLO A LA MIA MAMA',6,'Media',25,'Se ...',2);
INSERT INTO receta VALUES (16,'PATATAS A LO POBRE',5,'Media',30,'Se ...',2);


insert into  receta_INGREDIENTE values (1	,9,	1,	'cucharadas');
insert into  receta_INGREDIENTE values (1,12,300,'gramos');
insert into  receta_INGREDIENTE values (1,16,0.05,'litros');
insert into  receta_INGREDIENTE values (1,18,0.5,'unidad');
insert into  receta_INGREDIENTE values (1,33,5,'cucharadas');
insert into  receta_INGREDIENTE values (2,4,300,'gramos');
insert into  receta_INGREDIENTE values (2,18,4,'unidad');
insert into  receta_INGREDIENTE values (2,19,1,'unidad');
insert into  receta_INGREDIENTE values (2,23,100,'gramos');
insert into  receta_INGREDIENTE values (2,33,10,'cucharadas');
insert into  receta_INGREDIENTE values (3,5,2,'cucharadas');
insert into  receta_INGREDIENTE values (3,16,0.2,'litros');
insert into  receta_INGREDIENTE values (3,19,1,'unidad');
insert into  receta_INGREDIENTE values (3,24,200,'gramos');
insert into  receta_INGREDIENTE values (4,1,100,'gramos');
insert into  receta_INGREDIENTE values (4,2,50,'gramos');
insert into  receta_INGREDIENTE values (4,6,1,'pizca');
insert into  receta_INGREDIENTE values (4,13,250,'gramos');
insert into  receta_INGREDIENTE values (5,5,1,'pizca');
insert into  receta_INGREDIENTE values (5,14,200,'gramos');
insert into  receta_INGREDIENTE values (5,17,250,'gramos');
insert into  receta_INGREDIENTE values (6,6,1000,'gramos');
insert into  receta_INGREDIENTE values (6,34,1,'unidad');
insert into  receta_INGREDIENTE values (7,8,1,'cucharadas');
insert into  receta_INGREDIENTE values (7,30,500,'gramos');
insert into  receta_INGREDIENTE values (7,31,1,'unidad');
insert into  receta_INGREDIENTE values (8,7,8,'cucharadas');
insert into  receta_INGREDIENTE values (8,26,10,'cucharadas');
insert into  receta_INGREDIENTE values (8,28,1,'cucharadas');
insert into  receta_INGREDIENTE values (8,32,4,'cucharadas');
insert into  receta_INGREDIENTE values (9,23,250,'gramos');
insert into  receta_INGREDIENTE values (9,37,1,'unidad');
insert into  receta_INGREDIENTE values (10,4,150,'gramos');
insert into  receta_INGREDIENTE values (10,6,1,'pizca');
insert into  receta_INGREDIENTE values (10,10,1000,'gramos');
insert into  receta_INGREDIENTE values (10,27,50,'gramos');
insert into  receta_INGREDIENTE values (11,6,1,'pizca');
insert into  receta_INGREDIENTE values (11,11,1000,'gramos');
insert into  receta_INGREDIENTE values (11,15,2,'unidad');
insert into  receta_INGREDIENTE values (11,23,50,'gramos');
insert into  receta_INGREDIENTE values (12,7,5,'cucharadas');
insert into  receta_INGREDIENTE values (12,15,5,'gramos');
insert into  receta_INGREDIENTE values (12,16,0.2,'litros');
insert into  receta_INGREDIENTE values (13,7,2,'cucharadas');
insert into  receta_INGREDIENTE values (13,16,0.4,'litros');
insert into  receta_INGREDIENTE values (13,30,500,'gramos');
insert into  receta_INGREDIENTE values (14,8,1,'cucharadas');
insert into  receta_INGREDIENTE values (14,25,1000,'gramos');
insert into  receta_INGREDIENTE values (14,33,3,'cucharadas');
insert into  receta_INGREDIENTE values (15,16,0.4,'litros');
insert into  receta_INGREDIENTE values (15,33,3,'cucharadas');
insert into  receta_INGREDIENTE values (15,25,1000,'gramos');
insert into  receta_INGREDIENTE values (16,5,5,'unidad');
insert into  receta_INGREDIENTE values (16,6,1,'pizca');
insert into  receta_INGREDIENTE values (16,33,6,'cucharadas');


