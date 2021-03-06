DROP DATABASE if EXISTS SQL_PAPYRUS;

CREATE DATABASE SQL_PAPYRUS;

USE SQL_PAPYRUS;

CREATE TABLE fournis(
	NUMFOU					VARCHAR(255) PRIMARY KEY,
	NOMFOU					VARCHAR(255) NOT NULL,
	RUEFOU					VARCHAR(255) NOT NULL,
	POSFOU					CHAR(5) NOT NULL,
	VILFOU					VARCHAR(255) NOT NULL,
	CONFOU					VARCHAR(15) NOT NULL,
	SATISF					TINYINT CHECK (SATISF > 1 AND SATISF < 10)
);

	
CREATE TABLE produit(
	CODART					CHAR(4) PRIMARY KEY NOT NULL,
	LIBART					VARCHAR(30) NOT NULL,
	STKALE					INT(10) NOT NULL,
	STKPHY					INT(10) NOT NULL,
	QTEANN					INT(10) NOT NULL,
	UNIMES					CHAR(5) NOT NULL
);


CREATE TABLE vente(
	DELIV 					SMALLINT(5) NOT NULL,
	QTE1						INT(10) NOT NULL,
	PRIX1						VARCHAR(50) NOT NULL,
	QTE2						INT(10),
	PRIX2						VARCHAR(50),
	QTE3						INT(10),
	PRIX3						VARCHAR(50),
	NUMFOU					VARCHAR(25) NOT NULL,
	CODART					CHAR(4) NOT NULL,
	PRIMARY KEY(NUMFOU, CODART),
	FOREIGN KEY(NUMFOU) REFERENCES fournis(NUMFOU),
	FOREIGN KEY(CODART) REFERENCES produit(CODART)
);


CREATE TABLE entcom(
	NUMCOM					INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	OBSCOM					VARCHAR(50) NOT NULL,
	DATCOM					DATE NOT NULL,
	NUMFOU					VARCHAR(25) NOT NULL,
	FOREIGN KEY(NUMFOU) REFERENCES fournis(NUMFOU)
);


CREATE TABLE ligcom(
	NUMLIG					TINYINT(3) NOT NULL,
	QTECDE					INT(10) NOT NULL,
	PRIUNI					VARCHAR(50) NOT NULL,
	QTELIV					INT(10),
	DERLIV					DATETIME NOT NULL ,
	NUMCOM					INT(10) AUTO_INCREMENT NOT NULL,
	CODART 					CHAR(4) NOT NULL,
	PRIMARY KEY(NUMLIG, NUMCOM),
	FOREIGN KEY(NUMCOM) REFERENCES entcom(NUMCOM),
	FOREIGN KEY(CODART) REFERENCES produit(CODART)
);

CREATE INDEX FK ON entcom (NUMFOU); 