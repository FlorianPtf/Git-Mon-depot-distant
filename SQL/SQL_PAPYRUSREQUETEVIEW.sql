USE papyrus;

-- *****************************   GlobalCDE    *******************************************

CREATE VIEW v_GlobalCde
AS
SELECT codart AS Code_Article, qtecde AS QteTot, qtecde * priuni AS PrixTot
FROM ligcom;

DROP VIEW if EXISTS v_GlobalCde;


-- *****************************   VentesI100    *******************************************

CREATE VIEW v_VentesI100
AS
SELECT codart AS CodeArticle, qte1 AS Quantité1, prix1 AS Prix1, qte2 AS QUantité2, prix2 AS Prix2, qte3 AS Quantité3, prix3 AS Prix3
FROM vente
WHERE codart LIKE 'I100';

DROP VIEW if EXISTS v_VentesI100;


-- *************************   VentesI100Grobrigan    **************************************

CREATE VIEW v_VentesI100Grobrigan
AS
SELECT codart AS CodeArticle, numfou AS Fournisseur, qte1 AS Quantité1, prix1 AS Prix1, qte2 AS QUantité2, prix2 AS Prix2, qte3 AS Quantité3, prix3 AS Prix3
FROM vente
WHERE codart LIKE 'I100' AND numfou LIKE '120';

DROP VIEW if EXISTS v_VentesI100Grobrigan;

