--
-- Base de données :  
--
create database printemps;
use printemps;
-- --------------------------------------------------------

--
-- Structure de la table fleurs
--

CREATE TABLE fleurs (
  id int(16) NOT NULL AUTO_INCREMENT,
  nom varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

--
-- Insertions des données de la table fleurs
--

INSERT INTO fleurs (nom) VALUES('Tulipe');
INSERT INTO fleurs (nom) VALUES('Marguerite');
INSERT INTO fleurs (nom) VALUES('Crokus');
INSERT INTO fleurs (nom) VALUES('Pissenlit');
INSERT INTO fleurs (nom) VALUES('Crokus');
INSERT INTO fleurs (nom) VALUES('Pissenlit');

