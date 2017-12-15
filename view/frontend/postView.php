<?php $title = $post['title'] . ' - Jean Forteroche'; ?>

<?php include 'header.php'; ?>

<?php ob_start(); ?>
	<div class="bloc_page">
		<div class="bloc_principal">
			<div class="news">			
				<div class="titre_et_date">			
					<h3>
						<?= $post['title']; ?>
					</h3>
					<p>
						<em>Publié le <?= $post['creation_date_fr']; ?></em>
						<em><?= $post['modification_date_fr'] != null ? ' - modifié le' . $post['modification_date_fr'] : ''; ?></em>
					</p>
				</div>
				<br>
				<p>
					<?= $post['content']; ?>
				</p>
				<br>
				<br>			
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
	<div class="bloc_commentaire">
		<div class="separation_com"></div>
		<div class="commentaires">
			<h3>Commentaires</h3>

			<?php
				while ($comment = $comments->fetch()) {
			?>		
					<div class="commentaire">
						<?php 
							if ($comment['reported_comment'] != null) {
								if ($comment['reported_comment'] != 'validated') {
						?>
									<p><strong><?= htmlspecialchars($comment['author']); ?></strong> - le <?= $comment['comment_date_fr']; ?></p>
									<p>Désolé, ce commentaire est en cours de modération.</p>
						<?php
								} else {
						?>
									<p><strong><?= htmlspecialchars($comment['author']); ?></strong> - le <?= $comment['comment_date_fr']; ?></p>
									<p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>
									<p class="signaler"><em>Valider par l'admin</em></p>
						<?php
								}
							} else {
						?>
								<p><strong><?= htmlspecialchars($comment['author']); ?></strong> - le <?= $comment['comment_date_fr']; ?></p>
								<p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>
								<p class="signaler"><a href="index.php?action=reportComment&amp;id=<?= $comment['id'] ?>&amp;idPost=<?= $post['id'] ?>">Signaler</a></p>
						<?php
							}
						?>
					</div>					
			<?php
				}
			?>
		</div>
		<div class="separation_com"></div>
		<div class="ajout_commentaire">
			<h3>Poster un commentaire</h3>
			<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post" >
				<div class="bloc_autheur">
					<input type="text" name="author" id="author" placeholder="Votre nom" required>
				</div>
				<div class="bloc_com">
					<textarea id="comment" name="comment" placeholder="Votre commentaire" required></textarea>
				</div>
				<div class="bloc_bouton">
					<input type="submit" name="" id="post_com" value="Ajouter le commentaire">
				</div>
			</form>
		</div>
	</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>