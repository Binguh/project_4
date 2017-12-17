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
	<p><a href="https://fr-fr.facebook.com/"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
	<a href="https://twitter.com/"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a></p>
</div>