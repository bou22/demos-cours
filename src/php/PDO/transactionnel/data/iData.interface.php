<?php

interface iData {
    public function getSelectAll();
    public function supprimerById($id);
    public function insererUnElement($objet);
}