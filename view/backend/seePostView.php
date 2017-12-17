<?php session_start(); ?>

<?php $title = 'Jean Forteroche'; ?>

<?php include 'header.php'; ?>

<?php ob_start(); ?>
	<div class="bloc_page">
		<div class="bloc_principal">			
			<div class="news">
		
						<div class="titre_et_date">			
							<h3>
								<?= $postWatched['title']; ?>
							</h3>
							<p>
								<em>Publié le <?= $postWatched['creation_date_fr']; ?></em>
								<em><?= $postWatched['modification_date_fr'] != null ? ' - modifié le ' . $postWatched['modification_date_fr'] : ''; ?></em>
							</p>
						</div>
						<br>
						<p>
							<?= $postWatched['content']; ?>
						</p>
						<br>

			</div>
			
		</div>
		<div class="bloc_widget">
			<?php include 'blocWidget.php'; ?>
		</div>
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>