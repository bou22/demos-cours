<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>420-149-AT</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Alpha</a> by HTML5 UP & BOU22</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Accueil</a></li>
							<li><a href="https://github.com/bou22/demos-cours" class="button">Cette démo sur GitHub</a></li>
						</ul>
					</nav>
				</header>

<!-- Main -->
    <section id="main" class="container">
        <header>
            <h2>PHP</h2>
            <p>L'écriture dans la sortie standard de PHP: le port de la réponse http</p>
        </header>
        <div class="row">
            <div class="col-12">

        <!-- Text -->
            <section class="box">
                <h3>Pour le cours 420-149-AT</h3>
                <p>L'écriture d'une réponse implique de générer dynamiquement du code.</p>
                <hr />
                <h3>echo, print et var_dump</h3>
            <?php 
                $variable = "Allo";
                $tableau = array("info1","info2");

                //echo et print inscrivent leur valeur dans le flux html.
                //Le "." fait la concaténation des caractères.
                echo "<p>Avec echo ".$variable."</p>";
                print "<p>Avec print ".$variable."</p>";

                //var_dump fourni n'importe quel type de données en chaîne de caractère. 
                //Il aide au débuggage.
                var_dump($tableau);

            ?>

            </div>
        </div>
        </section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon brands fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
            <script src="assets/js/demo.js"></script>

	</body>
</html>