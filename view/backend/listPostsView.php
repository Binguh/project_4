<?php $title = 'Le blog'; ?>

<?php include 'header.php'; ?>

<?php ob_start(); ?>
		<p><a href="index.php">Retour au blog</a></p>
		<h1>Le blog</h1>
		<p>Les derniers billets :</p>

		
		<?php
			while ($data = $posts->fetch()) {
		?>
				<div class="news">
					<h3>
						<?= $data['title']; ?> - 
						<em>publié le <?= $data['creation_date_fr']; ?></em>
						<em><?= $data['modification_date_fr'] != null ? ' </em>-<em> modifié le ' . $data['modification_date_fr'] : ''; ?></em>
					</h3>

					<p><?= $data['content']; ?></p>
					<p class="update_delete"><a href="index.php?action=goToUpdatePost&amp;id=<?= $data['id'] ?>">Modifier</a> - 
					<a href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>">Supprimer</a></p>
				</div>
		<?php
			}
		?>

		<div class="ajout_billet">
			<form action="index.php?action=addPost" method="post" >
				<div>
					<label for="title">Titre</label><br>
					<input type="text" name="title" id="title">
				</div>
				<div>
					<label for="content">Contenu</label><br>
					<textarea class="admin_textarea" id="content" name="content"></textarea>
				</div>
				<div>
					<input type="submit" name="">
				</div>
			</form>
		</div>

		<p><a href="index.php?action=listReportedComments">Modération des commentaires</a></p>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>