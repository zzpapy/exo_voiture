#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: ORIGINE
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ORIGINE(
        ID_ORIGINE Int  Auto_increment  NOT NULL ,
        NOM_ORIGINE Varchar (30) NOT NULL
	,CONSTRAINT ORIGINE_PK PRIMARY KEY (ID_ORIGINE),
	CONSTRAINT NOM_ORIGINE_PK UNIQUE (NOM_ORIGINE)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MARQUE
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MARQUE(
        ID_MARQUE  Int  Auto_increment  NOT NULL ,
        NOM_MARQUE Varchar (50) NOT NULL ,
        ID_ORIGINE Int NOT NULL
	,CONSTRAINT MARQUE_PK PRIMARY KEY (ID_MARQUE),
	CONSTRAINT NOM_MARQUE_PK UNIQUE (NOM_MARQUE)

	,CONSTRAINT MARQUE_ORIGINE_FK FOREIGN KEY (ID_ORIGINE) REFERENCES ORIGINE(ID_ORIGINE)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MODELE
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MODELE(
        ID_MODELE  Int  Auto_increment  NOT NULL ,
        NOM_MODELE Varchar (50) NOT NULL ,
        ID_MARQUE  Int NOT NULL
	,CONSTRAINT MODELE_PK PRIMARY KEY (ID_MODELE),
	CONSTRAINT NOM_MODELE_PK UNIQUE (NOM_MODELE)

	,CONSTRAINT MODELE_MARQUE_FK FOREIGN KEY (ID_MARQUE) REFERENCES MARQUE(ID_MARQUE)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: COULEUR
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COULEUR(
        ID_COULEUR  Int  Auto_increment  NOT NULL ,
        NOM_COULEUR Varchar (30) NOT NULL
	,CONSTRAINT COULEUR_PK PRIMARY KEY (ID_COULEUR),
	CONSTRAINT NOM_COULEUR_PK UNIQUE (NOM_COULEUR)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MOTEUR
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MOTEUR(
        ID_MOTEUR   Int  Auto_increment  NOT NULL ,
        TYPE_MOTEUR Varchar (10) NOT NULL
	,CONSTRAINT MOTEUR_PK PRIMARY KEY (ID_MOTEUR)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: VOITURE
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS AUTO(
        ID_AUTO Int  Auto_increment  NOT NULL ,
        PLAQUE     Varchar (15) NOT NULL ,
        NB_PORTES  Int NOT NULL ,
        ID_MODELE  Int NOT NULL ,
        ID_MOTEUR  Int NOT NULL ,
        ID_COULEUR Int NOT NULL
	,CONSTRAINT AUTO_PK PRIMARY KEY (ID_AUTO),
	CONSTRAINT PLAQUE_PK UNIQUE (PLAQUE)

	,CONSTRAINT AUTO_MODELE_FK FOREIGN KEY (ID_MODELE) REFERENCES MODELE(ID_MODELE)
	,CONSTRAINT AUTO_MOTEUR0_FK FOREIGN KEY (ID_MOTEUR) REFERENCES MOTEUR(ID_MOTEUR)
	,CONSTRAINT AUTO_COULEUR1_FK FOREIGN KEY (ID_COULEUR) REFERENCES COULEUR(ID_COULEUR)
)ENGINE=InnoDB;

