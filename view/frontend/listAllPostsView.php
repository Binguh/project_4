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
								<a href="index.php?action=post&amp;id=<?= $post['id'] ?>"><?= $post['title']; ?></a>
							</h3>
							<p>
								<em>Publié le <?= $post['creation_date_fr']; ?></em>
								<em><?= $post['modification_date_fr'] != null ? ' - modifié le ' . $post['modification_date_fr'] : ''; ?></em>
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