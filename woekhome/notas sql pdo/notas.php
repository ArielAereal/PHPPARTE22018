<?php 

/*

en la base utn

alter table proveedores auto_increment = 100;

(así con todas...)


insers

INSERT into 'proveedores'('Nombre','Domicilio','Localidad')VALUES('Perez','Perón 876','Quimes');

INSERT into 'proveedores'(Nombre,Domicilio,Localidad)VALUES('Perez','Perón 876','Quimes')

con un dato solo tampoco entra... 


errores previos 


insert into 'usuario' ('Nombre') values("Hernán")


ACIERTOS

alter table proveedores auto_increment = 100;

insert INTO proveedores (Nombre) VALUE ('Perez');  ((Andó!!!))

update proveedores set Domicilio = 'Perón 876' where Numero = 100;

UPDATE proveedores set Localidad = 'Quilmes' where Numero = 100;


insert into proveedores (Nombre,Domicilio,Localidad) VALUES('Gimenez','Mitre 750','Avellaneda');

insert into proveedores (Nombre,Domicilio,Localidad) VALUES('Aguirre','Boedo 634','Bernal')

OK!!!


PRODUCTOS


insert into productos (pNombre,Precio,Tamaño) values('Caramelos',1.5,'Chico'),
('Cigarrillos',45.89,'Mediano'),
('Gaseosa',15.80,'Grande');



ENVIOS

insert into envíos (Numero,pNumero,Cantidad) values(100,1,500),
(100,2,1500),
(100,3,100),
(101,2,55),
(101,3,225),
(102,1,600),
(102,3,300);


3. Consultas

select * from productos ORDER by pNombre [DESC - ASC]

SELECT * FROM `proveedores` WHERE Localidad ='Quilmes'

SELECT * FROM envíos WHERE cantidad > 199 and cantidad <301

4.	Obtener la cantidad total de todos los productos enviados.

SELECT SUM(Cantidad) FROM `envíos` WHERE 1;

5.	Mostrar los primeros 3 números de productos que se han enviado.

SELECT pNumero FROM `envíos` WHERE 1 LIMIT 3;

6.	Mostrar los nombres de proveedores y los nombres de los productos enviados.

INNER JOIN

SELECT proveedores.Nombre as Proveedor,
        productos.pNombre as Producto

FROM envíos

INNER JOIN proveedores ON envíos.Numero = proveedores.Numero

INNER JOIN productos ON envíos.pNumero = productos.pNumero

7.	Indicar el monto (cantidad * precio) de todos los envíos.   

SELECT (productos.Precio * envíos.cantidad) as MontoTotal FROM `envíos` INNER JOIN productos on envíos.pNumero = productos.pNumero

8.	Obtener la cantidad total del producto 1 enviado por el proveedor 102.

SELECT SUM(cantidad) FROM `envíos` INNER JOIN proveedores ON envíos.Numero = proveedores.Numero INNER JOIN productos on envíos.pNumero = productos.pNumero WHERE proveedores.Numero = 102 AND productos.pNumero = 1;

9.	Obtener todos los números de los productos suministrados por algún proveedor de ‘Avellaneda’.

productos.pNumero

proveedores.Localidad = Avellaneda

SELECT productos.pNumero FROM envíos INNER JOIN productos ON envíos.pNumero = productos.pNumero

INNER JOIN proveedores ON envíos.Numero = proveedores.Numero WHERE proveedores.Localidad = 'Avellaneda'

10.	Obtener los domicilios y localidades de los proveedores cuyos nombres contengan la letra ‘I’.

SELECT Domicilio, Localidad FROM `proveedores` WHERE INSTR(Nombre,'I')

SELECT INSTR("W3Schools.com", "3") AS MatchPosition;

11.	Agregar el producto numero  4, llamado ‘Chocolate’, de tamaño chico y con un precio de 25,35.

INSERT INTO `productos`(`pNombre`, `Precio`, `Tamaño`) VALUES ('Chocolate',25.35,'Chico')


UPDATE productos set Precio = 97.50 WHERE Tamaño = 'Grande'

15.	Cambiar el tamaño de ‘Chico’ a ‘Mediano’ de todos los productos cuyas cantidades sean mayores a 300 inclusive.

en el update, inner join va antes del set

UPDATE productos as prod INNER JOIN envíos ON envíos.pNumero = prod.pNumero SET prod.Tamaño = 'Mediano' WHERE envíos.Cantidad >= 300 AND prod.Tamaño = 'Chico'

UPDATE
INNER JOIN
SET
WHERE



DELETE FROM `productos` WHERE pNumero = 1



SELECT Numero FROM `proveedores` 

17.	Eliminar a todos los proveedores que no han enviado productos.



SELECT proveedores.Numero FROM `proveedores`
INNER JOIN envíos ON envíos.Numero = proveedores.Numero
WHERE 1

NOT EXISTS no anda



SELECT * FROM `proveedores`
WHERE Numero NOT IN (SELECT Numero
                  FROM envíos)

DELETE FROM `proveedores`
WHERE Numero NOT IN (SELECT Numero
                  FROM envíos)

*/


 ?>