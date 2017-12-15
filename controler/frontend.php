<?php
	use \OpenClassrooms\LeBlog\Model\PostManager;
	use \OpenClassrooms\LeBlog\Model\CommentManager;

	function listPosts() {
		$postManager = new PostManager();

		$posts = $postManager->getPosts();
		$lastPost = $postManager->getLastPost();

		require('view/frontend/listPostsView.php');
	}

	function post() {
		$postManager = new PostManager();
		$commentManager = new CommentManager();

		$posts = $postManager->getPosts();
		$post = $postManager->getPost($_GET['id']);
		$comments = $commentManager->getComments($_GET['id']);

		require('view/frontend/postView.php');
	}

	function listAllPosts() {
		$postManager = new PostManager();

		$posts = $postManager->getPosts();
		$allPosts = $postManager->getAllPosts();

		require('view/frontend/listAllPostsView.php');
	}

	function addComment($postId, $author, $comment) {
		$commentManager = new CommentManager();

		$affectedLines = $commentManager->postComment($postId, $author, $comment);
		if ($affectedLines === false) {
			throw new Exception('Impossible d\'ajouter le commentaire !');
			
		} else {
			header('Location: index.php?action=post&id=' . $postId);
		}
	}

	function reportComment($id, $idPost) {
		$commentManager = new CommentManager();

		$reportedComment = $commentManager->reportComment($id);

		header('Location: index.php?action=post&id=' . $idPost);
	}

	function goToAdmin() {
		$postManager = new PostManager();

		$posts = $postManager->getPosts();

		require('view/frontend/loginView.php');
	}