CREATE TABLE PRODUCTO(
	codpro int not null AUTO_INCREMENT,
	nompro varchar(50) null,
	despro varchar(100) null,
	prepro numeric(6,2) null,
	estado int null,
	CONSTRAINT pk_producto
	PRIMARY KEY (codpro)
);
alter table PRODUCTO add rutimapro varchar(100) null;
INSERT INTO PRODUCTO (nompro,despro,prepro,estado,rutimapro)
VALUES ('Consola famicom','Primera consola de nintendo en usar cartuchos','90.99',1,'famicom.jpg')