<?php session_start(); 
if (isset($_SESSION['login'])) {
?>
	<?php $title = 'Jean Forteroche'; ?>

	<?php include 'header.php'; ?>

	<?php ob_start(); ?>
		<div class="bloc_page">
			<div class="bloc_principal">			
				<div class="news">
					<?php
						while ($post = $allPosts->fetch()) {
					?>		
							<div class="titre_et_date">			
								<h3>
									<?= $post['title']; ?>
								</h3>
								<p>
									<em>Publié le <?= $post['creation_date_fr']; ?></em>
									<em><?= $post['modification_date_fr'] != null ? ' - modifié le ' . $post['modification_date_fr'] : ''; ?></em>
								</p>
								<p class="update_delete">
									<a href="index.php?action=seePost&amp;id=<?= $post['id'] ?>">Afficher</a> - 
									<a href="index.php?action=goToUpdatePost&amp;id=<?= $post['id'] ?>">Modifier</a> - 
									<a href="index.php?action=deletePost&amp;id=<?= $post['id'] ?>">Supprimer</a>
								</p>
							</div>
							<br>
					<?php
						}
					?>
				</div>
				
			</div>
			<div class="bloc_widget">
				<?php include 'blocWidget.php'; ?>
			</div>
		</div>
	<?php $content = ob_get_clean(); ?>

	<?php require('view/template.php'); ?>

<?php 
} else {
	header('Location: index.php?action=goToAdmin');
}
?>