<?php $title = 'Jean Forteroche'; ?>

<?php include 'header.php'; ?>

<?php ob_start(); ?>
	<div class="bloc_page">
		<div class="bloc_principal">
			<div class="formulaire_connexion">
				<form action="index.php?action=verifyLogin" method="post">
					<div class="input_login">
						<input type="text" name="login" id="login" placeholder="Identifiant" required>
					</div>
					<div class="input_login">
						<input type="password" name="password" id="password" placeholder="Mot de passe" required>
					</div>
					<div class="input_login">
						<input type="submit" name="connexion" id="connexion" value="Connexion">
					</div>
				</form>
			</div>
		</div>

			
		<div class="bloc_widget">
			<?php include 'blocWidget.php'; ?>
		</div>
		
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>