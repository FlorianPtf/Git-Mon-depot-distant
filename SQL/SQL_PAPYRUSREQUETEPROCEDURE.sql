USE papyrus;

-- ********************************      Lst_fournis     *****************************************

DROP PROCEDURE if EXISTS Lst_fournis;

DELIMITER |

CREATE PROCEDURE Lst_fournis()

BEGIN
SELECT nomfou AS NomFournisseur, SUM(qte1 + qte2 + qte3) AS CommandePassé
FROM vente
JOIN fournis
ON fournis.numfou = vente.numfou
WHERE delliv > 0
group BY nomfou;
END |

DELIMITER ;


-- ********************************      Slt_Commandes     *****************************************


DROP PROCEDURE if EXISTS Lst_Commandes;

DELIMITER |

CREATE PROCEDURE Lst_Commandes()

BEGIN
SELECT numcom AS CommandeUrgente
FROM entcom
WHERE obscom LIKE 'commande urgente';
END |

DELIMITER ;


-- ********************************      CA_Fournisseur      ****************************************


DROP PROCEDURE if EXISTS CA_Fournisseur;

DELIMITER |

CREATE PROCEDURE CA_Fournisseur(
	IN numfou VARCHAR(25)
)
	
	
BEGIN 
SELECT nomfou AS Nom_Fournisseur, SUM(prix1 * qte1 + prix2 * qte2 + prix3 * qte3) * 1.2 AS Chiffre_Affaires
FROM vente 
JOIN fournis
ON fournis.numfou = vente.numfou
GROUP BY nomfou;

END |

DELIMITER ; 