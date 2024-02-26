--
-- Base de données :  
--
create database articles
    CHARACTER SET = 'utf8'
    COLLATE = 'utf8_general_ci ';

use articles;
-- --------------------------------------------------------

--
-- Structure de la table articles
--

CREATE TABLE articles (
  id int(16) NOT NULL AUTO_INCREMENT,
  titre varchar(255) NOT NULL,
  texte text(1000),
  PRIMARY KEY (id)
);

--
-- Insertions des données de la table fleurs
--

INSERT INTO fleurs (titre,texte) VALUES('Article 1','Texte article 1');
INSERT INTO fleurs (titre,texte) VALUES('Article 2','Texte article 2');

