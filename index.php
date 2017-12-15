<?php 
	require('model/Manager.php');
	require('model/PostManager.php');
	require('model/CommentManager.php');
	require('controler/frontend.php');
	require('controler/backend.php');

	try {
		if (isset($_GET['action'])) {
			if ($_GET['action'] === 'listPosts') {
				listPosts();
			} elseif ($_GET['action'] === 'post') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					post();
				} else {
					throw new Exception('Aucun identifiant de billet envoyé');
				}
			} elseif ($_GET['action'] === 'listAllPosts') {
				listAllPosts();
			} elseif ($_GET["action"] === 'addComment') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					if (!empty($_POST['author']) && !empty($_POST['comment'])) {
						addComment($_GET['id'], $_POST['author'], $_POST['comment']);
					} else {
						throw new Exception('Tous les champs ne sont pas remplis');		
					}
				} else {
					throw new Exception('Aucun identifiant de billet envoyé');	
				}
			} elseif ($_GET['action'] === 'admin') {
				listAllPostsAdmin();
			} elseif ($_GET["action"] === 'addPost') {
				if (!empty($_POST['title']) && !empty($_POST['content'])) {
					addPost($_POST['title'], $_POST['content']);
				} else {
					throw new Exception('Tous les champs ne sont pas remplis');		
				}
			} elseif ($_GET['action'] === 'deletePost') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					deletePost($_GET['id']);
				} else {
					throw new Exception('Aucun identifiant de billet envoyé');
				}
			} elseif ($_GET['action'] === 'goToUpdatePost') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					goToUpdatePost($_GET['id']);
				} else {
					throw new Exception('Aucun identifiant de billet envoyé');
				}
			} elseif ($_GET["action"] === 'updatePost') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					if (!empty($_POST['title']) && !empty($_POST['content'])) {
						updatePost($_GET['id'], $_POST['title'], $_POST['content']);
					} else {
						throw new Exception('Tous les champs ne sont pas remplis');		
					}
				} else {
					throw new Exception('Aucun identifiant de billet envoyé');	
				}
			} elseif ($_GET['action'] === 'reportComment') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					reportComment($_GET['id'], $_GET['idPost']);
				} else {
					throw new Exception('Aucun identifiant de commentaire envoyé');
				}
			} elseif ($_GET['action'] === 'listReportedComments') {
				listReportedComments();
			} elseif ($_GET['action'] === 'deleteComment') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					deleteComment($_GET['id']);
				} else {
					throw new Exception('Aucun identifiant de commentaire envoyé');
				}
			} elseif ($_GET['action'] === 'validateComment') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					validateComment($_GET['id']);
				} else {
					throw new Exception('Aucun identifiant de commentaire envoyé');
				}
			} elseif ($_GET['action'] === 'goToAddPost') {
				goToAddPost();
			} elseif ($_GET['action'] === 'seePost') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					seePost($_GET['id']);
				} else {
					throw new Exception('Aucun identifiant de billet envoyé');
				}
			} elseif ($_GET['action'] === 'goToAdmin') {
				goToAdmin();
			}
		} else {
			listPosts();
		}
	} catch(Exception $e) {
		$errorMessage = $e->getMessage();
		require('view/frontend/errorView.php');
	}