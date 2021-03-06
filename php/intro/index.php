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
						<h2>PHP et les requêtes http</h2>
						<p>Comment la requête est reçue sur le serveur</p>
					</header>
					<div class="row">
						<div class="col-12">

							<!-- Text -->
								<section class="box">
									<h3>Pour le cours 420-149-AT</h3>
									<p>Le langage PHP utilise une variable "super-globale" pour stocker les données reçues 
                                                                        de requêtes d'un formulaire client.</p>

									<hr />

							<!-- Form -->
								<section class="box">
									<h3>Demande de rendez-vous à la clinique</h3>
									<form method="post" action="./recoit-requete.php">
										<div class="row gtr-uniform gtr-50">
											<div class="col-6 col-12-mobilep">
												<input type="text" name="name" id="name" value="" required placeholder="Nom" />
											</div>
											<div class="col-12">
												<select name="category" id="category">
													<option value="">- Votre dossier clinique -</option>
													<option value="1">Déjà client à la clinique</option>
													<option value="2">Nouveau client</option>
												</select>
											</div>
											<div class="col-4 col-12-narrower">
												<input type="radio" value="0" id="priority-low" name="priority" checked>
												<label for="priority-low">Pas de presse</label>
											</div>
											<div class="col-4 col-12-narrower">
												<input type="radio" value="1" id="priority-normal" name="priority">
												<label for="priority-normal">Priorité normale</label>
											</div>
											<div class="col-4 col-12-narrower">
												<input type="radio" value="2" id="priority-high" name="priority">
												<label for="priority-high">Rendez-vous urgent</label>
											</div>
											<div class="col-12">
												<ul class="actions">
                                                    <li><input type="submit" id="boutonSubmit" value="Compléter la demande" /></li>
													<li><input type="reset" value="Effacer les informations" class="alt" /></li>
												</ul>
											</div>										</div>
									</form>


								</section>

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