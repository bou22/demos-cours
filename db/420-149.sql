--
-- Base de données :  
--
-- create database 420-149;
use 420-149;
-- --------------------------------------------------------

--
-- Structure de la table fleurs
--

CREATE TABLE fleurs (
  id int(16) NOT NULL AUTO_INCREMENT,
  nom varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE travaux (
  id int(16) NOT NULL AUTO_INCREMENT,
  nom varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE users (
  id int(16) NOT NULL AUTO_INCREMENT,
  nom varchar(255) NOT NULL,
  mdp varchar(255) NOT NULL,
  PRIMARY KEY (id)
);


--
-- Insertions des données des tables
--

INSERT INTO fleurs (nom) VALUES('Tulipe');
INSERT INTO fleurs (nom) VALUES('Marguerite');
INSERT INTO fleurs (nom) VALUES('Crokus');
INSERT INTO fleurs (nom) VALUES('Pissenlit');
INSERT INTO fleurs (nom) VALUES('Crokus');
INSERT INTO fleurs (nom) VALUES('Pissenlit');

--
-- Insertions des données de la table fleurs
--

INSERT INTO travaux (nom) VALUES('Ramassser les crottes du chien');
INSERT INTO travaux (nom) VALUES('Bêcher le jardin');
INSERT INTO travaux (nom) VALUES('Faire le ménage du garage');
INSERT INTO travaux (nom) VALUES('Laver les vitres des fenêtres');
INSERT INTO travaux (nom) VALUES('Prendre une bière au soleil');
INSERT INTO travaux (nom) VALUES('Sortir et allumer le BBQ');