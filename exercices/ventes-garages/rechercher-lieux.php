<html>
    <head>
        <meta charset="utf-8">
        <link href="main.css" rel="stylesheet">
        <title>Ventes de garage point com</title>
    </head>
    <body>
        <h1 id="enTete">Dans une vente de garage près de chez-vous</h1>
        <div id="barre">
            <form method="get" action="rechercher-lieux.php">
                <input type="search" id="recherche" name="recherche" size="40" placeholder="Rechercher un destination vente de garage">
                <input type="submit" class="floatRight" value="&#x1F50D;">
        </form>
        </div>
        <div id="menu">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="ajouter-un-lieu.php">Mes ventes de garage</a></li>
                <li><a href="nouveau-compte.php">Devenir membre</a></li>
                <li><a href="rechercher-lieux.php">Trouver une vente de garage</a></li>
            </ul>
        </div>
        <div id="main">
            <h2>Ventes de garage pour Palmarolle le 24 juin</h2>
            <table>
                <tr>
                    <th>Adresses</th><th>Permis</th>
                </tr>
        <?php
            for ($i=0; $i < 50; $i++) { 
                echo "<tr>";
                echo "<td>".($i*2+16).", rue Principale</td>";
                echo "<td>".($i+$i*24)."</td>";
                echo "</tr>";
            }
        ?>
            </table>
        </div>
        <div id="pied">
            <dl>
                <dt>gravida vel libero</dt>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                
            </dl>
            <dl>
                <dt>magna sed ligula</dt>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                
            </dl>
            <dl>
                <dt>ut leo leo</dt>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                    <dd><a>venenatis</a></dd>
                
            </dl>
        </div>
    </body>
</html>