<?php
require_once "header.php";
?>

<link rel="stylesheet" href="styleInscriptionConnexion.css">

<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="#">
				<h1>Inscription</h1>
				<input type="text" placeholder="Identifiant...">
				<input type="password" placeholder="Mot de passe...">
				<button>S'inscrire</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="#">
				<h1>Se connecter</h1>
				<input type="email" placeholder="Identifiant...">
				<input type="password" placeholder="Mot de passe...">
				<a href="#">Mot de passe oublié ? C'est ICI</a>
				<button>Se connecter</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>De retour !</h1>
					<p>Vous êtes déjà membre ? Dans ce cas, cliquez sur le bouton ci-dessous.</p>
					<button class="ghost" id="signIn">Se connecter</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Nouveau parmis nous !?</h1>
					<p>Entrez les informations demandées et accéder au site avec vos informations.</p>
					<button class="ghost" id="signUp">S'inscrire</button>
				</div>
			</div>
		</div>
	</div>

	<script src="script.js"></script>
</body>
</html>