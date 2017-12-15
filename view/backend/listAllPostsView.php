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
			<div class="dernier_chapitres">
				<h3>Derniers chapitres publiés</h3>
				<?php
					while ($data = $posts->fetch()) {
				?>
						<div class="derniers_titres">
							<p>
								<a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><i class="fa fa-genderless" aria-hidden="true"></i> <?= $data['title']; ?></a>
							</p>	
						</div>						
						<?php
					}	
						?>
			</div>
			<div class="reseaux_sociaux">
				<h3>Réseaux sociaux</h3>
				<i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i>
				<i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i>
			</div>
		</div>
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>