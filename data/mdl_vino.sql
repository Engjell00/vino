#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

CREATE TABLE vino_usager(
        id_usager           Int NOT NULL AUTO_INCREMENT,
        nom_usager          Varchar (50) NOT NULL ,
        mot_de_passe_usager Varchar (50) NOT NULL ,
        description_usager  Varchar (200)
	,CONSTRAINT vino_usager_PK PRIMARY KEY (id_usager)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: vino_type
#------------------------------------------------------------

CREATE TABLE vino_type(
        id_type  Int NOT NULL AUTO_INCREMENT,
        nom_type Varchar (11) NOT NULL
	,CONSTRAINT vino_type_PK PRIMARY KEY (id_type)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: vino_bouteille
#------------------------------------------------------------

CREATE TABLE vino_bouteille(
        id_bouteille          Int NOT NULL AUTO_INCREMENT,
        nom_bouteille         Varchar (200) ,
        image_bouteille       Varchar (200) ,
        code_saq_bouteille    Varchar (50) ,
        pays_bouteille        Varchar (50) ,
        description_bouteille Varchar (200) ,
        prix_saq_bouteille    Varchar (10) ,
        url_saq_bouteille     Varchar (200) ,
        urlimg_bouteille      Varchar (200) ,
        format_bouteille      Varchar (20) ,
        id_type               Int
	,CONSTRAINT vino_bouteille_PK PRIMARY KEY (id_bouteille)
	,CONSTRAINT vino_bouteille_vino_type_FK FOREIGN KEY (id_type) REFERENCES vino_type(id_type)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: vino_cellier
#------------------------------------------------------------

CREATE TABLE vino_cellier(
        id_cellier  Int NOT NULL AUTO_INCREMENT,
        nom_cellier Varchar (20) NOT NULL ,
        id_usager   Int NOT NULL
	,CONSTRAINT vino_cellier_PK PRIMARY KEY (id_cellier)

	,CONSTRAINT vino_cellier_vino_usager_FK FOREIGN KEY (id_usager) REFERENCES vino_usager(id_usager)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contient
#------------------------------------------------------------

CREATE TABLE contient(
        id_bouteille                  Int NOT NULL ,
        id_cellier                    Int NOT NULL ,
        id_bouteille_cellier          Int NOT NULL ,
        nom_bouteille_celiier         Varchar (200) NOT NULL ,
        image_bouteille_cellier       Varchar (200) NOT NULL ,
        code_saq_cellier              Varchar (200) NOT NULL ,
        pays_cellier                  Varchar (200) NOT NULL ,
        description_bouteille_cellier Varchar (200) NOT NULL ,
        prix_a_lachat                 Varchar (10) NOT NULL ,
        url_saq                       Varchar (200) NOT NULL ,
        url_image                     Varchar (200) NOT NULL ,
        format_bouteille_cellier      Varchar (20) NOT NULL ,
        date_achat                    Date NOT NULL ,
        expiration                    Date NOT NULL ,
        quantite                      Int NOT NULL ,
        notes                         Varchar (200) NOT NULL ,
        millesime                     Varchar (20) NOT NULL
	,CONSTRAINT contient_PK PRIMARY KEY (id_bouteille,id_cellier)
	,CONSTRAINT contient_vino_bouteille_FK FOREIGN KEY (id_bouteille) REFERENCES vino_bouteille(id_bouteille)
	,CONSTRAINT contient_vino_cellier0_FK FOREIGN KEY (id_cellier) REFERENCES vino_cellier(id_cellier)
)ENGINE=InnoDB;

