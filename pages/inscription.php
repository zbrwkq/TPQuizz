<?php
require_once "header.php";
require_once "../traitements/inscription.php";
?>

<link rel="stylesheet" href="styleInscriptionConnexion.css">

<body>
	<main>
		<div class="column left">
			<div class="left-content">
				<h1>S'inscrire !</h1>
				<p>utilisez votre identifiant pour vous inscrire</p>
				<div class="form-inscription">
					<form action="../traitements/inscription.php" method="POST">
						<input type="text" name="identifiant" id="identifiant" placeholder="Identifiant">
						<input type="password" name="mdp" id="mdp" placeholder="Mot de passe">
						<input type="password" name="confirmationMdp" id="confirmationMdp" placeholder="Confirmez le mot de passe">
						<select name="questionSecrete" id="questionSecrete">
							<option value="">-- Question Secrète --</option>
							<option value="question1">Dans quelle ville êtes-vous né(e) ?</option>
							<option value="question2">Combien avez-vous de frères et soeurs ?</option>
							<option value="question3">Quel surnom vous donne vos proches ?</option>
						</select>
						<input type="text" name="reponseQuestionSecrete" id="reponseQuestionSecrete" placeholder="Réponse de la question secrète">
						<button type="submit" name="envoi" value="1">S'inscrire</button>
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