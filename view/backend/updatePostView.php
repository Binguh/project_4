<?php session_start(); ?>

<?php $title = $post['title'] . ' - Jean Forteroche'; ?>

<?php include 'header.php'; ?>

<?php ob_start(); ?>
	<div class="bloc_page">
		<div class="bloc_principal">
			<div class="modifier_com">
				<form action="index.php?action=updatePost&amp;id=<?= $post['id'] ?>" method="post">
					<div>
						<label for="title">Titre</label><br>
						<input type="text" name="title" id="title" value="<?= htmlspecialchars($post['title']); ?>">
					</div>
					<div>
						<label for="content">Contenu</label><br>
						<textarea class="admin_textarea" id="content" name="content"><?= nl2br(htmlspecialchars($post['content'])); ?></textarea>
					</div>
					<div>
						<input type="submit" name="" id="update_post">
					</div>
				</form>
			</div>
		</div>

			
		<div class="bloc_widget">
			<?php include 'blocWidget.php'; ?>
		</div>
		
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>