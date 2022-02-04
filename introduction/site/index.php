<html>
    <head>
    <meta charset="utf-8">
        <title>Une page web</title>
        <style>
            table {
                width: 50%;
                border-collapse: collapse;
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <p>Allo ! <a href="tableau.php">Tableau</a>
            <b>toi !</b>
            <?php
                echo ' Tu viens de La Sarre ?';
                
            ?>
            <script type="text/javascript"> 
                window.document.write("  Ou du Temiscamingue ?")
            </script>
            <?php
                echo ' Peut-être de Guigues ?';
            ?>
            </p>

            <table>
            <?php
                $debut = mb_ord("A", "UTF-8");
                $fin = mb_ord("Z", "UTF-8");
                $ligne = $debut;
                $cellule = $debut;

                while ($cellule <= $fin)
                {
                    $position = $cellule-$ligne; //différence max de 5.

                    switch ($position)
                    {
                        case 0:
                            echo "<tr><td>". chr($cellule)."<td>";

                            if($cellule==$fin && $position < 4) //dernière ligne non complète
                            {
                                $fin = $fin+4-$position;
                            }
                            $cellule++;
                            break;
                        case 4:
                            echo "<td>".chr($cellule)."<td><tr>";

                            $cellule++;
                            $ligne = $ligne+5;
                            break;
                        default:
                            echo "<td>".chr($cellule)."<td>";

                            if($cellule==$fin && $position < 4) //dernière ligne non complète
                            {
                                $fin = $fin+4-$position;
                            }
                            $cellule++;                         
                    }
                }
            ?>      
            </table>  
        
    </body>
</html>