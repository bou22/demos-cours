<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script type="text/javascript" src="evenement.js"></script>
        <style type="text/css">
            @import url('evenement.css');
        </style>
        <meta charset="UTF-8">
        <title>Démonstration sur les événements</title>
    </head>
    <body onload="ajouterEcouteurs();">
        <?php
        echo __FILE__;
        echo "<br>";
        echo __DIR__;
        echo "<br>";
        echo $_SERVER['REQUEST_URI'];
        ?>
        <h1 onclick="texteInterieur(this)" id="h1">Le texte est un header 1 <span>de l'interface graphique</span></h1>
        <p>Petit paragraphe.</p>
        <table id="t1">
            <tr><td id="c1">c1</td><td>c2</td></tr>
        </table>
        <p>Petit paragraphe.</p>
        <table id="t2">
            <tr><td id="c3">c3</td><td>c4</td></tr>
        </table>
    </body>
</html>
