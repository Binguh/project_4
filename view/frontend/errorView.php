<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<div class="message_erreur">
	<p>Erreur : <?= $errorMessage ?></p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>