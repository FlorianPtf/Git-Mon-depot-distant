DROP DATABASE if EXISTS SQL_EXO2;

CREATE DATABASE SQL_EXO2;

USE SQL_EXO2;


CREATE TABLE Station(
	num_station				INT PRIMARY KEY AUTO_INCREMENT,
	nom_station				VARCHAR(255)
);


CREATE TABLE Hotel(
	capacite_hotel			INT,
	categorie_hotel		VARCHAR(255),
	nom_hotel				VARCHAR(255),
	adresse_hotel			VARCHAR(255),
	num_hotel				INT PRIMARY KEY AUTO_INCREMENT,
	num_station				INT,
	FOREIGN KEY(num_station) REFERENCES Station(num_station)
);


CREATE TABLE Chambre(
	capacite_chambre		INT,
	degre_confort			INT,
	exposition				VARCHAR(255),
	type_chambre			VARCHAR(255),
	num_chambre				INT PRIMARY KEY AUTO_INCREMENT,
	num_hotel				INT,
	FOREIGN KEY(num_hotel) REFERENCES Hotel(num_hotel)
);


CREATE TABLE Clients(
	adresse_client 		VARCHAR(255),
	nom_client				VARCHAR(255),
	prenom_client			VARCHAR(255),
	num_client				INT PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE Reservation(
	num_chambre 			INT,
	num_client 				INT,
	date_debut				DATE,
	date_fin					DATE,
	date_reservation		DATE,
	montant_arrhes			DECIMAL,
	prix_total				DECIMAL,
	PRIMARY KEY(num_chambre, num_client),
	FOREIGN KEY(num_chambre) REFERENCES Chambre(num_chambre),
   FOREIGN KEY(num_client) REFERENCES Clients(num_client)
);














