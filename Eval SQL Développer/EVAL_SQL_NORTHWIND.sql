
-- ************************************      REQUETES    *************************************

-- ******************************** Listes des contacts français *****************************      


SELECT CompanyName AS Société, ContactName AS Contact, ContactTitle AS Fonction, Phone AS Téléphone
FROM customers 
WHERE Country = 'France';


-- ******************** Produits vendus par le fournisseur "Exotic Liquids" ******************    

SELECT ProductName AS Produit, UnitPrice AS Prix
FROM products
JOIN suppliers
ON products.SupplierID = suppliers.SupplierID
WHERE CompanyName LIKE 'Exotic Liquids';


-- **** Nombre de produits vendues par les fournisseurs Français dans l'ordre décroissant ****    


SELECT CompanyName AS Fournisseur, Count(DISTINCT ProductName) AS Nbre_Produits
FROM suppliers
JOIN products
ON products.SupplierID = suppliers.SupplierID
JOIN orderdetails
ON products.ProductID = orderdetails.ProductID
WHERE Country = 'France' 
GROUP BY CompanyName
ORDER BY count(DISTINCT ProductName) DESC;


-- ***************** Liste des clients Français ayant plus de 10 commandes *******************    


SELECT CompanyName AS Clients, COUNT(DISTINCT orders.OrderID) AS Nbre_Commandes
FROM customers
JOIN orders
ON customers.CustomerID = orders.CustomerID
JOIN orderdetails
ON orders.OrderID = orderdetails.OrderID
WHERE Country LIKE 'France'
GROUP BY CompanyName
HAVING COUNT(DISTINCT orders.OrderID)>10;


-- ***************** Liste des clients ayant un chiffre d'affaires >30.000 *******************     


SELECT CompanyName AS Clients, SUM(UnitPrice*Quantity) AS CA, Country AS Pays
FROM customers
JOIN orders
ON orders.CustomerID = customers.CustomerID
JOIN orderdetails
ON orderdetails.OrderID = orders.OrderID
GROUP BY CompanyName
HAVING SUM(UnitPrice*Quantity) > 30000
ORDER BY SUM(UnitPrice*Quantity) DESC;


-- *********************** Liste des pays dont les clients ont passé *************************   
-- ******************** commande de poduits fournis par "Exotic Liquids **********************


SELECT DISTINCT customers.Country AS Pays
FROM customers
JOIN orders
ON orders.CustomerID = customers.CustomerID
JOIN orderdetails
ON orderdetails.OrderID = orders.OrderID
JOIN products 
ON products.ProductID = orderdetails.ProductID
JOIN suppliers
ON suppliers.SupplierID = products.SupplierID
WHERE suppliers.CompanyName LIKE 'Exotic Liquids'
ORDER BY customers.Country ASC;


-- ***************************** Montant des ventes de 1997  *********************************    


SELECT SUM(UnitPrice*Quantity) AS Montant_Ventes_1997
FROM orderdetails
JOIN orders
ON orders.OrderID = orderdetails.OrderID
WHERE year(OrderDate) = 1997;


-- *********************** Montant des ventes de 1997 mois par mois **************************      


SELECT month(OrderDate) AS Mois_1997, SUM(UnitPrice*Quantity) AS Montan_Ventes
FROM orderdetails
JOIN orders
ON orders.OrderID = orderdetails.OrderID
WHERE YEAR(OrderDate) = 1997
GROUP BY Mois_1997;


-- *********** Depuis quelle date le client "Du monde entier" n'a plus commandé  *************      


SELECT OrderDate AS Date_de_dernière_commande
FROM orders
JOIN customers
ON orders.CustomerID = customers.CustomerID
WHERE CompanyName LIKE 'Du monde entier'
ORDER BY OrderDate DESC 
LIMIT 1;


-- ******************* Quel est le délai moyen de livraison en jours *************************       


SELECT ROUND(AVG(DATEDIFF(ShippedDate, OrderDate))) AS Délai_moyen_de_livraison
FROM orders;





-- **************************       PROCEDURE STOCKÉE     ************************************

-- *********** Depuis quelle date le client "Du monde entier" n'a plus commandé  *************    
  

DROP PROCEDURE IF EXISTS Date_dercommande;

DELIMITER |

CREATE PROCEDURE Date_dercommande(
	IN CompanyNom VARCHAR(40)
)

BEGIN 
SELECT OrderDate AS Date_de_dernière_commande
FROM orders
JOIN customers
ON orders.CustomerID = customers.CustomerID
WHERE CompanyName = CompanyNom
ORDER BY OrderDate DESC 
LIMIT 1;

END |

DELIMITER ; 


-- ******************* Quel est le délai moyen de livraison en jours *************************       


DROP PROCEDURE IF EXISTS Delai_livraison;

DELIMITER |

CREATE PROCEDURE Delai_livraison()

BEGIN

SELECT ROUND(AVG(DATEDIFF(ShippedDate, OrderDate))) AS Délai_moyen_de_livraison
FROM orders;

END |

DELIMITER ;



-- *********************************      TRIGGER     ****************************************

-- ************************* Mise en place d'une règle de gestion  *************************** 


DELIMITER |

   CREATE OR REPLACE TRIGGER Pays_similaire AFTER INSERT ON orderdetails
	FOR EACH ROW
   BEGIN    
   DECLARE pays VARCHAR(15);
   SET pays = (SELECT suppliers.SupplierID
   FROM orders
   JOIN customers ON orders.CustomerID = customers.CustomerID
   JOIN orderdetails ON orders.OrderID = orderdetails.OrderID
   JOIN products ON orderdetails.ProductID = products.ProductID
   JOIN suppliers ON products.SupplierID = suppliers.SupplierID
   WHERE suppliers.Country = customers.Country
   AND orderdetails.ProductID = NEW.ProductID AND orderdetails.OrderID = NEW.OrderID);
	if pays IS NULL then
	SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Le pays n est pas similaire !';
	END if ;
   END |
                
DELIMITER ;




-- ****************** Ajout de valeurs dans tableau "orderdetails"   ************************* 


-- START TRANSACTION;

-- INSERT INTO orderdetails (OrderID, ProductID, UnitPrice, Quantity, Discount) VALUES (0, 0, 0, 0, 0);

-- COMMIT;























