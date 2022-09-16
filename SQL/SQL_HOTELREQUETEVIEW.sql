-- *************************** Afficher la liste des hôtels avec leur station ************************************


CREATE VIEW v_listehotel
AS
SELECT hot_nom, sta_nom
FROM hotel
JOIN station
ON hotel.hot_sta_id = station.sta_id;

DROP VIEW if EXISTS v_listehotel;


-- *************************** Afficher la liste des chambres et leur hôtel **************************************


CREATE VIEW v_listechambre
AS
SELECT cha_numero AS Liste_chambres, hot_nom AS Hotel
FROM chambre 
JOIN hotel
ON hotel.hot_id = chambre.cha_hot_id;

DROP VIEW if EXISTS v_listechambre;


-- ********************** Afficher la liste des réservations avec le nom des clients ******************************

CREATE VIEW v_listereservation
AS
SELECT cli_nom AS NomClient, cli_prenom AS PrenomClient, res_date AS DateReservation
FROM client
JOIN reservation
ON client.cli_id = reservation.res_cli_id;

DROP VIEW if EXISTS v_listereservation;


-- ************** Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station ********************


CREATE VIEW v_listechambrehotelstation
AS
SELECT cha_numero AS Liste_chambres, hot_nom AS Nom_Hotel, sta_nom AS Nom_Station
FROM chambre 
JOIN hotel
ON hotel.hot_id = chambre.cha_hot_id
JOIN station
ON hotel.hot_sta_id = station.sta_id;

DROP VIEW if EXISTS v_listechambrehotelstation;


-- ******************** Afficher les réservations avec le nom du client et le nom de l’hôtel ************************


-- SELECT res_date AS DateReservation, cli_nom AS Nom_Client, hot_nom AS Nom_Hotel
-- FROM client
-- JOIN reservation
-- ON client.cli_id = reservation.res_cli_id
-- JOIN chambre
-- ON reservation.res_cha_id = chambre.cha_id
-- JOIN hotel
-- ON chambre.cha_id = hotel.hot_sta_id; 
















