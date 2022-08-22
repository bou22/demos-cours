<html>
    <head>
        <meta charset="utf-8">
        <link href="main.css" rel="stylesheet">
        <script src="listes.js"></script>
        <script src="dom.js"></script>
        <script src="recherche.js"></script>
        <title>Ventes de garage point com</title>
    </head>
    <body>
        <h1 id="enTete">Dans une vente de garage près de chez-vous</h1>
        <div id="barre">
            <form method="get" action="rechercher-lieux.php">
                <input type="input" id="recherche" name="recherche" size="40" placeholder="Inscrire votre mot clé ici">
                <input onclick="rechercherLeMot(recherche.value)" type="button" class="floatRight" value="&#x1F50D;">
            </form>
        </div>
        <div id="menu">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a>Mes ventes de garage</a></li>
                <li><a>Devenir membre</a></li>
                <li><a onclick="recupererAvecId('main')">Trouver une vente de garage</a></li>
            </ul>
        </div>
        <div id="main">
            <h2 onclick="contenuElement(this)">Donec ante tellus</h2>
            <p onclick="modifierContenuElement(this,'Nouveau contenu')">Ut leo leo, gravida vel libero in, venenatis auctor tellus. Nam eu magna sed ligula convallis blandit. In hac habitasse platea dictumst. Fusce non dolor ac mauris auctor finibus sit amet non quam. Integer hendrerit, mi id laoreet suscipit, diam turpis malesuada sem, sed vestibulum eros justo eget ligula. Aenean et ultricies augue. Suspendisse potenti. Morbi sed nisl eu est congue suscipit sed eget sem. Quisque mauris felis, ultrices id auctor sed, porta quis ex.</p>
            <h2>Nulla vel velit commodo</h2>
            <p onclick="parcourirSesSemblables(this)">Ut leo leo, gravida vel libero in, venenatis auctor tellus. Nam eu magna sed ligula convallis blandit. In hac habitasse platea dictumst. Fusce non dolor ac mauris auctor finibus sit amet non quam. Integer hendrerit, mi id laoreet suscipit, diam turpis malesuada sem, sed vestibulum eros justo eget ligula. Aenean et ultricies augue. Suspendisse potenti. Morbi sed nisl eu est congue suscipit sed eget sem. Quisque mauris felis, ultrices id auctor sed, porta quis ex.</p>
            <h2>Donec ante tellus</h2>
            <p>Ut leo leo, gravida vel libero in, venenatis auctor tellus. Nam eu magna sed ligula convallis blandit. In hac habitasse platea dictumst. Fusce non dolor ac mauris auctor finibus sit amet non quam. Integer hendrerit, mi id laoreet suscipit, diam turpis malesuada sem, sed vestibulum eros justo eget ligula. Aenean et ultricies augue. Suspendisse potenti. Morbi sed nisl eu est congue suscipit sed eget sem. Quisque mauris felis, ultrices id auctor sed, porta quis ex.</p>
            <h2>Nulla vel velit commodo</h2>
            <p>Ut leo leo, gravida vel libero in, venenatis auctor tellus. Nam eu magna sed ligula convallis blandit. In hac habitasse platea dictumst. Fusce non dolor ac mauris auctor finibus sit amet non quam. Integer hendrerit, mi id laoreet suscipit, diam turpis malesuada sem, sed vestibulum eros justo eget ligula. Aenean et ultricies augue. Suspendisse potenti. Morbi sed nisl eu est congue suscipit sed eget sem. Quisque mauris felis, ultrices id auctor sed, porta quis ex.</p>
            <h2>Donec ante tellus</h2>
            <p>Ut leo leo, gravida vel libero in, venenatis auctor tellus. Nam eu magna sed ligula convallis blandit. In hac habitasse platea dictumst. Fusce non dolor ac mauris auctor finibus sit amet non quam. Integer hendrerit, mi id laoreet suscipit, diam turpis malesuada sem, sed vestibulum eros justo eget ligula. Aenean et ultricies augue. Suspendisse potenti. Morbi sed nisl eu est congue suscipit sed eget sem. Quisque mauris felis, ultrices id auctor sed, porta quis ex.</p>
            <h2>Nulla vel velit commodo</h2>
            <p>Ut leo leo, gravida vel libero in, venenatis auctor tellus. Nam eu magna sed ligula convallis blandit. In hac habitasse platea dictumst. Fusce non dolor ac mauris auctor finibus sit amet non quam. Integer hendrerit, mi id laoreet suscipit, diam turpis malesuada sem, sed vestibulum eros justo eget ligula. Aenean et ultricies augue. Suspendisse potenti. Morbi sed nisl eu est congue suscipit sed eget sem. Quisque mauris felis, ultrices id auctor sed, porta quis ex.</p>
            <h2>Donec ante tellus</h2>
            <p>Ut leo leo, gravida vel libero in, venenatis auctor tellus. Nam eu magna sed ligula convallis blandit. In hac habitasse platea dictumst. Fusce non dolor ac mauris auctor finibus sit amet non quam. Integer hendrerit, mi id laoreet suscipit, diam turpis malesuada sem, sed vestibulum eros justo eget ligula. Aenean et ultricies augue. Suspendisse potenti. Morbi sed nisl eu est congue suscipit sed eget sem. Quisque mauris felis, ultrices id auctor sed, porta quis ex.</p>
            <h2>Nulla vel velit commodo</h2>
            <p>Ut leo leo, gravida vel libero in, venenatis auctor tellus. Nam eu magna sed ligula convallis blandit. In hac habitasse platea dictumst. Fusce non dolor ac mauris auctor finibus sit amet non quam. Integer hendrerit, mi id laoreet suscipit, diam turpis malesuada sem, sed vestibulum eros justo eget ligula. Aenean et ultricies augue. Suspendisse potenti. Morbi sed nisl eu est congue suscipit sed eget sem. Quisque mauris felis, ultrices id auctor sed, porta quis ex.</p>
            <p  onclick="document.write(listeUL(jours));">Remplacer le contenu par le tableau</p>
            <p>Insérer le tableau ici
            <script>
                let tableauHTML = new String("<ul>");
                for (let index = 0; index < jours.length; index++) {
                    console.log(jours[index]);
                    tableauHTML += "<li>"+jours[index]+"</li>";
                }
                tableauHTML += "<ul>";
                document.write(tableauHTML);
            </script>
        </p>
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