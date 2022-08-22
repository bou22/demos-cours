<?php

include_once 'Abstract.Html.php';

class ListeHtml extends Html
{
    public function generer()
    {
        $this->setDonnees();
        $this->structureHtml = "<ul>";
        foreach ($this->donnees as $clef=>$item){
            $this->structureHtml .= "<li>".$clef.": ".$item."</li>";
        }
        $this->structureHtml .= "</ul>";
        return $this->structureHtml;
    }
}