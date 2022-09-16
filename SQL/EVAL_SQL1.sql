DROP DATABASE if EXISTS EVAL_SQL1;

CREATE DATABASE EVAL_SQL1;

USE EVAL_SQL1;

CREATE TABLE Clients(
	cli_num				INT PRIMARY KEY NOT NULL,
	cli_nom				VARCHAR(50),
	cli_adresse			VARCHAR(50),
	cli_tel				VARCHAR(30)
);

CREATE TABLE Commande(
	com_num				INT PRIMARY KEY NOT NULL,
	cli_num				INT,
	com_date				DATETIME,
	com_obs				VARCHAR(50),
	FOREIGN KEY (cli_num) REFERENCES Clients(cli_num)
);

CREATE TABLE Produit(
	pro_num				INT PRIMARY KEY NOT NULL,
	pro_libelle			VARCHAR(50),
	pro_description	VARCHAR(50)
);

CREATE TABLE est_compose(
	com_num				INT,
	pro_num				INT,
	est_qte				INT,
	PRIMARY KEY (com_num, pro_num),
	FOREIGN KEY (com_num) REFERENCES Commande(com_num),
	FOREIGN KEY (pro_num) REFERENCES Produit(pro_num)
);

CREATE INDEX IX_ ON Clients(cli_nom);












