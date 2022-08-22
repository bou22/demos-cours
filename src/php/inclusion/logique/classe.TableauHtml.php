<?php

include_once 'Abstract.Html.php';

class TableauHtml extends Html
{
    public function generer()
    {
        $this->setDonnees();
        $this->structureHtml = "<table>";
        foreach ($this->donnees as $clef=>$item){
            $this->structureHtml .= "<tr><td>".$clef."</td><td>".$item."</td></tr>";
        }
        $this->structureHtml .= "</table>";
        return $this->structureHtml;
    }
}