<?php ob_start(); ?>
	<div class="bloc_header" id="header_accueil_admin">

		<div class="image_header">
			<div class="bandeau_header_nom">
				<h1>Jean Forteroche</h1>
				<div class="separation"></div>
				<h2>Billet simple pour l'Alaska</h2>
			</div>
		</div>
		<div class="bandeau_menu">
			<nav>
				<ul>
					<li><a href="index.php?action=admin">Accueil</a></li>
					<li><a href="index.php?action=goToAddPost">Ajouter un post</a></li>
					<li><a href="index.php?action=listReportedComments">Commentaires</a></li>
					<li><a href="index.php?action=logout">Déconnexion</a></li>
				</ul>
			</nav>
		</div>
	</div>
<?php $headerContent = ob_get_clean(); ?>