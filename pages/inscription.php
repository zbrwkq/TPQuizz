<?php
require_once "header.php";
?>

<link rel="stylesheet" href="styleInscriptionConnexion.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

<body>
	<main>
		<div class="column left">
			<div class="left-content">
				<h1>S'inscrire !</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<p>ou utiliser un identifiant pour s'inscrire</p>
				<div class="form-inscription">
					<form action="#" method="POST">
						<input type="text" name="identifiant" id="identifiant" placeholder="Identifiant">
						<input type="password" name="mdp" id="mdp" placeholder="Mot de passe">
						<input type="password" name="confirmationMdp" id="confirmationMdp" placeholder="Confirmez">
						<button type="submit">S'inscrire</button>
					</form>
				</div>
			</div>
		</div>
		<div class="column right">
			<div class="right-content">
				<h1>Déjà membre ?</h1>
				<p>
					Si vous souhaitez vous inscrire, c'est par ici que ca se passe !
					<br>
					Il vous faudra votre identifiant ainsi que votre mot de passe.
				</p>
				<a href="#">Se connecter</a>
			</div>
		</div>
	</main>

	<script src="script.js"></script>
</body>
</html>