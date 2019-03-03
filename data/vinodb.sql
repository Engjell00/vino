
--
-- Base de données: `vinodb`
--
-- --------------------------------------------------------

--
-- Structure de la table `vino_type` TESTÉ
--

DROP TABLE IF EXISTS `vino_type`;
CREATE TABLE `vino_type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type` varchar(20) NOT NULL,
 CONSTRAINT vino_type_PK PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vino_type` TESTÉ
--

INSERT INTO `vino_type` VALUES(1, 'Vin rouge');
INSERT INTO `vino_type` VALUES(2, 'Vin blanc');



-- --------------------------------------------------------



--
-- Structure de la table `vino_bouteille` TESTÉ
--

DROP TABLE IF EXISTS `vino_bouteille`;
CREATE TABLE `vino_bouteille` (
  `id_bouteille`  int(11) NOT NULL AUTO_INCREMENT,
  `nom_bouteille` varchar(200) DEFAULT NULL,
  `image_bouteille` varchar(200) DEFAULT NULL,
  `code_saq` varchar(50) DEFAULT NULL,
  `pays_bouteille` varchar(50) DEFAULT NULL,
  `description_bouteille` varchar(200) DEFAULT NULL,
  `prix_saq_bouteille` varchar (10) NOT NULL,
  `url_saq_bouteille` varchar(200)  NOT NULL,
  `url_img_bouteille` varchar(200) NOT NULL,
  `format_bouteille` varchar(20) DEFAULT NULL,
  `id_type_bouteille` int(11) DEFAULT NULL,
  CONSTRAINT vino_bouteille_PK PRIMARY KEY (`id_bouteille`),
  CONSTRAINT contient_vino_type_bouteille0_FK FOREIGN KEY (`id_type_bouteille`) REFERENCES vino_type(`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `vino_bouteille` TESTÉ
--

INSERT INTO `vino_bouteille` VALUES(1, 'Borsao Seleccion', '//s7d9.scene7.com/is/image/SAQ/10324623_is?$saq-rech-prod-gril$', '10324623', 'Espagne', 'Vin rouge Espagne, 750 ml Code SAQ : 10324623', 11, 'https://www.saq.com/page/fr/saqcom/vin-rouge/borsao-seleccion/10324623', '//s7d9.scene7.com/is/image/SAQ/10324623_is?$saq-rech-prod-gril$', '750', 1);
INSERT INTO `vino_bouteille` VALUES(2, 'Monasterio de Las Vinas Gran Reserva', '//s7d9.scene7.com/is/image/SAQ/10359156_is?$saq-rech-prod-gril$', '10359156', 'Espagne', 'Vin rouge Espagne, 750 ml    Code SAQ : 10359156', 19, 'https://www.saq.com/page/fr/saqcom/vin-rouge/monasterio-de-las-vinas-gran-reserva/10359156', '//s7d9.scene7.com/is/image/SAQ/10359156_is?$saq-rech-prod-gril$', ' 750 ml', 1);
INSERT INTO `vino_bouteille` VALUES(3, 'Castano Hecula', '//s7d9.scene7.com/is/image/SAQ/11676671_is?$saq-rech-prod-gril$', '11676671', 'Espagne', 'Vin rougeEspagne, 750 ml Code SAQ : 11676671', 12, 'https://www.saq.com/page/fr/saqcom/vin-rouge/castano-hecula/11676671', '//s7d9.scene7.com/is/image/SAQ/11676671_is?$saq-rech-prod-gril$', '750', 1);
INSERT INTO `vino_bouteille` VALUES(4, 'Campo Viejo Tempranillo Rioja', '//s7d9.scene7.com/is/image/SAQ/11462446_is?$saq-rech-prod-gril$', '11462446', 'Espagne', 'Vin rouge Espagne, 750 ml Code SAQ : 11462446', 14, 'https://www.saq.com/page/fr/saqcom/vin-rouge/campo-viejo-tempranillo-rioja/11462446', '//s7d9.scene7.com/is/image/SAQ/11462446_is?$saq-rech-prod-gril$', '750', 1);
INSERT INTO `vino_bouteille` VALUES(5, 'Bodegas Atalaya Laya 2017', '//s7d9.scene7.com/is/image/SAQ/12375942_is?$saq-rech-prod-gril$', '12375942', 'Espagne', 'Vin rouge  Espagne, 750 ml Code SAQ : 12375942', 17, 'https://www.saq.com/page/fr/saqcom/vin-rouge/bodegas-atalaya-laya-2017/12375942', '//s7d9.scene7.com/is/image/SAQ/12375942_is?$saq-rech-prod-gril$', '750', 1);
INSERT INTO `vino_bouteille` VALUES(6, 'Vin Vault Pinot Grigio', '//s7d9.scene7.com/is/image/SAQ/13467048_is?$saq-rech-prod-gril$', '13467048', 'États-Unis', 'Vin blanc États-Unis, 3 L Code SAQ : 13467048', 34, 'https://www.saq.com/page/fr/saqcom/vin-blanc/vin-vault-pinot-grigio/13467048', '//s7d9.scene7.com/is/image/SAQ/13467048_is?$saq-rech-prod-gril$', ' 3 L', 2);
INSERT INTO `vino_bouteille` VALUES(7, 'Huber Riesling Engelsberg 2017', '//s7d9.scene7.com/is/image/SAQ/13675841_is?$saq-rech-prod-gril$', '13675841', 'Autriche', 'Vin blanc Autriche, 750 ml  Code SAQ : 13675841', 22, 'https://www.saq.com/page/fr/saqcom/vin-blanc/huber-riesling-engelsberg-2017/13675841', '//s7d9.scene7.com/is/image/SAQ/13675841_is?$saq-rech-prod-gril$', '750', 2);
INSERT INTO `vino_bouteille` VALUES(8, 'Dominio de Tares Estay Castilla y Léon 2015', '//s7d9.scene7.com/is/image/SAQ/13802571_is?$saq-rech-prod-gril$', '13802571', 'Espagne', 'Vin rouge Espagne, 750 ml  Code SAQ : 13802571', 18, 'https://www.saq.com/page/fr/saqcom/vin-rouge/dominio-de-tares-estay-castilla-y-leon-2015/13802571', '//s7d9.scene7.com/is/image/SAQ/13802571_is?$saq-rech-prod-gril$', '750', 1);
INSERT INTO `vino_bouteille` VALUES(9, 'Tessellae Old Vines Côtes du Roussillon 2016', '//s7d9.scene7.com/is/image/SAQ/12216562_is?$saq-rech-prod-gril$', '12216562', 'France', 'Vin rouge France, 750 ml Code SAQ : 12216562', 21, 'https://www.saq.com/page/fr/saqcom/vin-rouge/tessellae-old-vines-cotes-du-roussillon-2016/12216562', '//s7d9.scene7.com/is/image/SAQ/12216562_is?$saq-rech-prod-gril$', '750', 1);
INSERT INTO `vino_bouteille` VALUES(10, 'Tenuta Il Falchetto Bricco Paradiso -... 2015', '//s7d9.scene7.com/is/image/SAQ/13637422_is?$saq-rech-prod-gril$', '13637422', 'Italie', 'Vin rouge Italie, 750 ml Code SAQ : 13637422', 34, 'https://www.saq.com/page/fr/saqcom/vin-rouge/tenuta-il-falchetto-bricco-paradiso---barbera-dasti-superiore-docg-2015/13637422', '//s7d9.scene7.com/is/image/SAQ/13637422_is?$saq-rech-prod-gril$', '750', 1);



-- --------------------------------------------------------

--
-- Structure de la table `vino_usager` TESTÉ
--

CREATE TABLE `vino_usager`(
        `id_usager`           Int NOT NULL AUTO_INCREMENT,
        `nom_usager`          Varchar (50) NOT NULL ,
        `mot_de_passe_usager` Varchar (255) NOT NULL ,
        `nom` Varchar (50) NOT NULL ,
        `prenom` Varchar (50) NOT NULL ,
        `courriel` Varchar (50) NOT NULL ,
        `description_usager`  Varchar (200),
        `autorisation`  int (2)

	,CONSTRAINT vino_usager_PK PRIMARY KEY (`id_usager`)
)ENGINE=InnoDB;

--
-- Contenu de la table `vino_usager` TESTÉ
--

INSERT INTO `vino_usager` VALUES(1, 'engjell', '$2y$10$sJd63E.S0p8vwUFw8TzXs.uAkefR5BmGuzQ8lbiODvjJlvr0RxQ.C', 'bislimi','engjell','engjell@yahoo.ca','ma description','1');
INSERT INTO `vino_usager` VALUES(2, 'reda', '$2y$10$/I9tQhJiSCPgm5.enKEmw.dOHOjV3HaF70R7SmX/O.l/sp0GCgC2m','jeffal','reda','redajeffal@yahoo.ca','ma description','1');
INSERT INTO `vino_usager` VALUES(3, 'louisalexandre', '$2y$10$wBrr00/MmRTYWJO0OGqF2.hCcba4FEADUR5MDfezgNvWU1u2yQ1oe', 'Simard','Louis-Alexandre','alex@yahoo.ca','ma description','1');
INSERT INTO `vino_usager` VALUES(4, 'alexanne', '$2y$10$62Kftw/PRJEf8JCD0H6jV.BRr/3aj2BgUcvfTny3odyPOnPhodIFG', 'alexanne','alexanne','','','');



-- --------------------------------------------------------

--
-- Structure de la table `vino_cellier` TESTÉ
--

CREATE TABLE `vino_cellier`(
        `id_cellier`  Int NOT NULL AUTO_INCREMENT,
        `nom_cellier` Varchar (20) NOT NULL ,
        `id_usager`   Int NOT NULL
	,CONSTRAINT vino_cellier_PK PRIMARY KEY (`id_cellier`)
	,CONSTRAINT vino_cellier_vino_usager_FK FOREIGN KEY (`id_usager`) REFERENCES `vino_usager`(`id_usager`)
)ENGINE=InnoDB;

--
-- Contenu de la table `vino_cellier` TESTÉ
--

INSERT INTO `vino_cellier` VALUES(1, 'Mon Cellier', 1);
INSERT INTO `vino_cellier` VALUES(2, 'Mon deuxieme Cellier', 1);
INSERT INTO `vino_cellier` VALUES(3, 'CELLIER SOUS SOL', 2);
INSERT INTO `vino_cellier` VALUES(4, 'CELLIER CUISINE', 2);
INSERT INTO `vino_cellier` VALUES(5, 'Prenier Cellier', 3);
INSERT INTO `vino_cellier` VALUES(6, 'Deuxieme Cellier', 3);
INSERT INTO `vino_cellier` VALUES(7, 'CELLIER 1', 4);
INSERT INTO `vino_cellier` VALUES(8, 'CELLIER 2', 4);


-- --------------------------------------------------------



--
-- Structure de la table `contient` TESTÉ
--
DROP TABLE IF EXISTS `contient`;
CREATE TABLE `contient` (
        `id_bouteille_cellier`          Int NOT NULL AUTO_INCREMENT,
        `id_bouteille`                  Int ,
        `id_cellier`                    Int NOT NULL ,
        `nom_bouteille_cellier`         Varchar (200) NOT NULL ,
        `image_bouteille_cellier`       Varchar (200) NOT NULL ,
        `code_saq_cellier`              Varchar (200) NOT NULL ,
        `pays_cellier`                  Varchar (200) NOT NULL ,
        `description_bouteille_cellier` Varchar (200) NOT NULL ,
        `prix_a_lachat`                 Varchar (10) NOT NULL ,
        `url_saq_cellier`               Varchar (200) NOT NULL ,
        `url_image_cellier`             Varchar (200) NOT NULL ,
        `format_bouteille_cellier`      Varchar (20) NOT NULL ,
        `id_type`                       Int NOT NULL ,
        `date_achat`                    Date NOT NULL ,
        `expiration`                    Date DEFAULT NULL ,
        `quantite`                      Int NOT NULL ,
        `notes`                         Varchar (200) NOT NULL ,
        `millesime`                     Varchar (20) DEFAULT NULL,
     `commentaire`             Varchar (200)
	,CONSTRAINT contient_PK PRIMARY KEY (`id_bouteille_cellier`)
	,CONSTRAINT contient_vino_cellier0_FK FOREIGN KEY (`id_cellier`) REFERENCES vino_cellier(`id_cellier`)
	,CONSTRAINT contient_vino_type0_FK FOREIGN KEY (`id_type`) REFERENCES vino_type(`id_type`)

)ENGINE=InnoDB;
