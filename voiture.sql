#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: ORIGINE
#------------------------------------------------------------

CREATE TABLE ORIGINE(
        ID_ORIGINE Int  Auto_increment  NOT NULL ,
        NOM_ORGINE Varchar (30) NOT NULL
	,CONSTRAINT ORIGINE_PK PRIMARY KEY (ID_ORIGINE)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MARQUE
#------------------------------------------------------------

CREATE TABLE MARQUE(
        ID_MARQUE  Int  Auto_increment  NOT NULL ,
        NOM_MARQUE Varchar (50) NOT NULL ,
        ID_ORIGINE Int NOT NULL
	,CONSTRAINT MARQUE_PK PRIMARY KEY (ID_MARQUE)

	,CONSTRAINT MARQUE_ORIGINE_FK FOREIGN KEY (ID_ORIGINE) REFERENCES ORIGINE(ID_ORIGINE)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MODELE
#------------------------------------------------------------

CREATE TABLE MODELE(
        ID_MODELE  Int  Auto_increment  NOT NULL ,
        NOM_MODELE Varchar (50) NOT NULL ,
        ID_MARQUE  Int NOT NULL
	,CONSTRAINT MODELE_PK PRIMARY KEY (ID_MODELE)

	,CONSTRAINT MODELE_MARQUE_FK FOREIGN KEY (ID_MARQUE) REFERENCES MARQUE(ID_MARQUE)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: COULEUR
#------------------------------------------------------------

CREATE TABLE COULEUR(
        ID_COULEUR  Int  Auto_increment  NOT NULL ,
        NOM_COULEUR Varchar (30) NOT NULL
	,CONSTRAINT COULEUR_PK PRIMARY KEY (ID_COULEUR)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MOTEUR
#------------------------------------------------------------

CREATE TABLE MOTEUR(
        ID_MOTEUR   Int  Auto_increment  NOT NULL ,
        TYPE_MOTEUR Varchar (10) NOT NULL
	,CONSTRAINT MOTEUR_PK PRIMARY KEY (ID_MOTEUR)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: VOITURE
#------------------------------------------------------------

CREATE TABLE VOITURE(
        ID_VOITURE Int  Auto_increment  NOT NULL ,
        PLAQUE     Varchar (15) NOT NULL ,
        NB_PORTES  Int NOT NULL ,
        ID_MODELE  Int NOT NULL ,
        ID_MOTEUR  Int NOT NULL
	,CONSTRAINT VOITURE_PK PRIMARY KEY (ID_VOITURE)

	,CONSTRAINT VOITURE_MODELE_FK FOREIGN KEY (ID_MODELE) REFERENCES MODELE(ID_MODELE)
	,CONSTRAINT VOITURE_MOTEUR0_FK FOREIGN KEY (ID_MOTEUR) REFERENCES MOTEUR(ID_MOTEUR)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: VOITURE_COULEUR
#------------------------------------------------------------

CREATE TABLE VOITURE_COULEUR(
        ID_COULEUR Int NOT NULL ,
        ID_VOITURE Int NOT NULL
	,CONSTRAINT VOITURE_COULEUR_PK PRIMARY KEY (ID_COULEUR,ID_VOITURE)

	,CONSTRAINT VOITURE_COULEUR_COULEUR_FK FOREIGN KEY (ID_COULEUR) REFERENCES COULEUR(ID_COULEUR)
	,CONSTRAINT VOITURE_COULEUR_VOITURE0_FK FOREIGN KEY (ID_VOITURE) REFERENCES VOITURE(ID_VOITURE)
)ENGINE=InnoDB;

