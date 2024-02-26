<?php

    require_once 'config.include.php';

    class Articles
    {
        protected $pdo;
        protected $dsn;

        public function __construct(){
            $this->dsn = 'mysql:dbname='.MARIADB_NOMBD.';host=127.0.0.1;charset=UTF8';
            $this->pdo = new PDO($this->dsn, MARIADB_USAGER, MARIADB_PWD);
        }

        /*** Récupère un article à partir du id */
        public function getArticleById($id){
            $requete = $this->pdo->query('select titre, texte from articles where id=2');
            $requete->execute();
            return $requete->fetchObject();
        }

        /** Sélection des titres et de leur id pour les liens de gauche */
        public function getTitres(){
            $requete = $this->pdo->query('select id,titre from articles');
            $requete->execute();
            return $requete->fetchAll();
        }
    }
    