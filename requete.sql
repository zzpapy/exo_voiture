
*************** exo1 *******************

SELECT PLAQUE,NOM_MODELE,NOM_MARQUE,NOM_ORIGINE 
FROM auto a, modele m, marque mq,origine o
WHERE a.ID_MODELE = m.ID_MODELE
AND m.ID_MARQUE = mq.ID_MARQUE
AND mq.ID_ORIGINE = o.ID_ORIGINE
AND o.NOM_ORIGINE = 'france'


*************** exo2 *******************

SELECT  mq.NOM_MARQUE, COUNT(a.ID_MODELE) AS nb
FROM  modele m, auto a, marque mq
WHERE m.ID_MODELE = a.ID_MODELE
AND mq.ID_MARQUE = m.ID_MARQUE
GROUP BY m.ID_MODELE


*************** exo3 *******************

SELECT a.ID_MOTEUR,m.TYPE_MOTEUR, m.ID_MOTEUR,COUNT(a.ID_MOTEUR) AS nb
FROM  moteur m, auto a
WHERE a.ID_MOTEUR = m.ID_MOTEUR
GROUP BY a.ID_MOTEUR
ORDER BY nb DESC


*************** exo4 *******************

SELECT mq.NOM_MARQUE,o.NOM_ORIGINE,COUNT(a.ID_MODELE) AS nb
FROM auto a, modele m, marque mq, origine o
WHERE a.ID_MODELE = m.ID_MODELE
AND m.ID_MARQUE = mq.ID_MARQUE
AND mq.ID_ORIGINE = o.ID_ORIGINE
GROUP BY a.ID_MODELE
ORDER BY nb DESC


*************** exo5 *******************

SELECT DISTINCT a.PLAQUE
FROM auto a, voiture_couleur vc, couleur c, modele m
WHERE a.ID_VOITURE = vc.ID_VOITURE
AND vc.ID_COULEUR = c.ID_COULEUR
AND c.NOM_COULEUR = "gris"
AND a.PLAQUE IN(SELECT  a.PLAQUE
    FROM voiture_couleur vc, couleur c, modele m
    WHERE a.ID_VOITURE = vc.ID_VOITURE
    AND vc.ID_COULEUR = c.ID_COULEUR
    AND c.NOM_COULEUR = "violet")


*************** exo6 *******************

SELECT  m.TYPE_MOTEUR,o.NOM_ORIGINE,mo.NOM_MODELE
FROM  moteur m,auto a,modele mo,marque mq,origine o
WHERE m.ID_MOTEUR = a.ID_MOTEUR
AND m.TYPE_MOTEUR ="hybrid"
AND a.ID_MODELE = mo.ID_MODELE
AND mo.ID_MARQUE = mq.ID_MARQUE
AND mq.ID_ORIGINE = o.ID_ORIGINE
AND o.NOM_ORIGINE='D'