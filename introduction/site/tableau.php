<?php
    set_time_limit(0);
?>
<html>
    <head>
    <meta charset="utf-8">
    <title>Création d'un tableau dynamique</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            background-color: #ddd;
        }

    </style>
    </head>
    <body>
        <h1>Caractères unicode</h1>
        <h2><a href="https://unicode-table.com/en/blocks/unified-canadian-aboriginal-syllabics/">Tableau de caractères unicode</a></h2>
        <h2><a href="https://fr.wikipedia.org/wiki/Unicode#UTF.2C_Universal_Transformation_Format">Tableau de caractères unicode</a></h2>
        <p>Ce tableau créé dynamiquement contient une liste des caractères unicode.</p>
        <p>Ce n'est pas une représentation fidèle des caractères contenu dans UTF-8. Le tableau représente les caractères des points de code de 0000 à 7FFFFFFF.</p>
        <table>
            <tr><th>Hexadécimales</th><th>Caractères</th><th>Hexadécimales</th><th>Caractères</th></tr>
        <?php

            $debut = hexdec("0");
            $finA = hexdec("F");
            $finBCD = hexdec("FFFF");

            for ($d=0; $d < $finBCD; $d++)
            {
                echo "<tr>";
                echo "<td>U+".strtoupper(dechex($debut))."</td><td>".mb_chr($debut++,'UTF-8')."</td>";
                if ($d<$finBCD)
                {
                    $d++;
                    echo "<td>U+".strtoupper(dechex($debut))."</td><td>". mb_chr($debut++,'UTF-8')."</td>";
                }else 
                {
                    echo "<td>&nbsp;</td><td>&nbsp;</td>";
                }
                
                echo "</tr>";
            }
        ?>            
        </table>
    </body>
</html>