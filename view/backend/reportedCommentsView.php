<?php session_start(); ?>

<?php $title = 'Jean Forteroche'; ?>

<?php include 'header.php'; ?>

<?php ob_start(); ?>
	<div class="bloc_page">
		<div class="bloc_principal">			
			<div class="commentaires">
				<h3>Commentaires à modérer</h3>
				<?php
					while ($listComments = $listReportedComments->fetch()) {
				?>
						<div class="commentaire">
							<p><strong><?= htmlspecialchars($listComments['author']); ?></strong> - le <?= $listComments['comment_date_fr']; ?></p>
							<p><?= nl2br(htmlspecialchars($listComments['comment'])); ?></p>
							<p class="choix_mod"><a href="index.php?action=validateComment&amp;id=<?= $listComments['id'] ?>">Valider</a> - <a href="index.php?action=deleteComment&amp;id=<?= $listComments['id'] ?>">Supprimer</a></p>
						</div>
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