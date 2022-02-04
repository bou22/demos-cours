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
        table tr td {
            border: 1px solid black;
            background-color: #ddd;
        }

    </style>
    <script src="listes.js" type="text/javascript"></script>

    </head>
    <body>
        <h1>Listes HTML non-ordonnée UL</h1>
        
        <?php
            $liste = "<ul name='liste1' id='ul' onclick='changerNom(this);'>";
            $a = 1;
            
            while ($a <= 10) {
                $liste .= "<li>Item # ".$a++."</li>";
            }
            

            $liste .= "</ul>";

            echo $liste;
        ?>
        <h1>Listes HTML non-ordonnée OL</h1>
        
        <?php
            $liste = "<ol>";
            $a = 1;
            
            while ($a <= 10) {
                $liste .= "<li>Item # ".$a++."</li>";
            }
            

            $liste .= "</ol>";

            echo $liste;
        ?>
        <h1>Liste de description HTML</h1>
        
        <?php
            $liste = "<dl>";
            $a = 1;
            
            for ($i=1; $i <= 5; $i++) { 
                $liste .= "<dt>Bloc #".$i."</dt>";
                for ($j=1; $j <= 3; $j++) { 
                    $liste .= "<dd>Item #".$j."</dd>";
                }
            }
            

            $liste .= "</dl>";

            echo $liste;
        ?>

    </body>
</html>