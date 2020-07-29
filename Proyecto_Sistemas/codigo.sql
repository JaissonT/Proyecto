CREATE TABLE ROL(
    Cod_rol integer,
    Tipo Varchar(20),
    PRIMARY KEY (Cod_rol)
);

CREATE TABLE USUARIOS(
    Codigo_usuario serial primary key not null,
    Cod_rol integer,
    Nombre Varchar(20),
    Apellido Varchar(20),
    Usuario Varchar(15),
    clave Varchar(15),
    Correo Varchar(40),
    Respuesta_de_seguridad Varchar(10),
    FOREIGN KEY (Cod_rol) REFERENCES ROL(Cod_rol)
);

CREATE TABLE PROVEEDORES(
    Codigo_proveedores SERIAL PRIMARY KEY NOT NULL,
    Rut Varchar(12),
    Nombre Varchar(20),
    Descripcion Varchar(60)
);

CREATE TABLE CATEGORIAS(
    Codigo_categoria serial primary key not null,
	Nombre_categoria varchar(20),
    Descripcion Varchar(60)
);

CREATE TABLE PRODUCTOS(
    Codigo_producto serial primary key not null ,
    Codigo_categoria integer,
	Nombre_Producto varchar(20),
    Descripcion Varchar(50),
    Fecha date,
    Valor_unitario integer,
    Valor_de_venta integer,
    Stock integer,
    FOREIGN KEY (Codigo_categoria) REFERENCES CATEGORIAS(Codigo_categoria)
);

CREATE TABLE ENTREGAN(
    Codigo_proveedores integer,
    Codigo_producto integer,
    PRIMARY KEY (Codigo_proveedores,Codigo_producto),
    FOREIGN KEY (Codigo_proveedores) REFERENCES PROVEEDORES(Codigo_proveedores),
    FOREIGN KEY (Codigo_producto) REFERENCES PRODUCTOS(Codigo_producto)
);

CREATE TABLE VENTAS(
    Codigo_venta SERIAL PRIMARY KEY NOT NULL ,
    Fecha date,
    Valor_total integer,
    Codigo_usuario integer,
    FOREIGN KEY (Codigo_usuario) REFERENCES USUARIOS(Codigo_usuario)
);

CREATE TABLE CONTIENE(

    Codigo_producto integer,
    Codigo_venta integer,
    Cantidad integer,
    Valor integer,
    
    PRIMARY KEY (Codigo_producto,Codigo_venta),
    FOREIGN KEY (Codigo_producto) REFERENCES PRODUCTOS(Codigo_producto),
    FOREIGN KEY (Codigo_venta) REFERENCES VENTAS(Codigo_venta)
);


	
insert into ROL values (1,'Administrador');
insert into ROL values (2,'Vendedor');
Select * from ROL;
	
insert into USUARIOS (Cod_rol,Nombre,Apellido,Usuario,clave,Correo,Respuesta_de_seguridad)
values(1,'Brandon','Pincheira','BRPC','123456','brandon@gmail.com','tobi');
insert into USUARIOS (Cod_rol,Nombre,Apellido,Usuario,clave,Correo,Respuesta_de_seguridad) 
values(2,'Cristobal','Castro','CrisCa','cris123','Cristobal@gmail.com','tobi');
insert into USUARIOS (Cod_rol,Nombre,Apellido,Usuario,clave,Correo,Respuesta_de_seguridad) 
values(1,'Jaisson','Torres','Json','J123','Jaisson@gmail.com','json');
insert into USUARIOS (Cod_rol,Nombre,Apellido,Usuario,clave,Correo,Respuesta_de_seguridad) 
values(1,'Javier','Donoso','JDO','J123','Javier@gmail.com','perro');
insert into USUARIOS (Cod_rol,Nombre,Apellido,Usuario,clave,Correo,Respuesta_de_seguridad) 
values(1,'Rodrigo','Donoso','rod','J123','Javier@gmail.com','perro');
insert into USUARIOS (Cod_rol,Nombre,Apellido,Usuario,clave,Correo,Respuesta_de_seguridad) 
values(1,'Francisco','Donoso','fer','J123','Javier@gmail.com','perro');
insert into USUARIOS (Cod_rol,Nombre,Apellido,Usuario,clave,Correo,Respuesta_de_seguridad) 
values(1,'Fernando','Donoso','Fran','J123','Javier@gmail.com','perro');
Select * from USUARIOS;



insert into PROVEEDORES (Rut,Nombre,Descripcion) 
values('25.088.198-2','Vichy','Compañia que despacha podructos cosmeticos');
insert into PROVEEDORES (Rut,Nombre,Descripcion)
values('27.188.128-2','Bayer','Distribuidora de fármacos innovadores.');
insert into PROVEEDORES (Rut,Nombre,Descripcion) 
values('20.088.198-2','LaboratorioChile','Laboratorio quimico Chileno');
Select * from PROVEEDORES;









