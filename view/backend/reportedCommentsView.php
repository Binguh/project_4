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
			<?php include 'blocWidget.php'; ?>
		</div>
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>