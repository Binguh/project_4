<?php $title = 'Jean Forteroche'; ?>

<?php ob_start(); ?>

<div class="message_erreur">
	<p>Erreur : <?= $errorMessage ?></p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>