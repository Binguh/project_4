<?php
	use \OpenClassrooms\LeBlog\Model\PostManager;
	use \OpenClassrooms\LeBlog\Model\CommentManager;

	function listPostsAdmin() {
		$postManager = new PostManager();

		$posts = $postManager->getPosts();

		require('view/backend/listPostsView.php');
	}

	function postAdmin() {
		$postManager = new PostManager();
		$commentManager = new CommentManager();

		$post = $postManager->getPost($_GET['id']);
		$comments = $commentManager->getComments($_GET['id']);

		require('view/backend/postView.php');
	}

	function listAllPostsAdmin() {
		$postManager = new PostManager();

		$posts = $postManager->getPosts();
		$allPosts = $postManager->getAllPostsReverse();

		require('view/backend/listAllPostsView.php');
	}

	function addPost($title, $content) {
		$postManager = new PostManager();

		$newPost = $postManager->newPost($title, $content);
		if ($newPost === false) {
			throw new Exception('Impossible d\'ajouter le billet !');
			
		} else {
			header('Location: index.php?action=admin');
		}
	}

	function deletePost($id) {
		$postManager = new PostManager();

		$deletedPost = $postManager->deletePost($id);

		header('Location: index.php?action=admin');
	}

	function goToUpdatePost($id) {
		$postManager = new PostManager();

		$post = $postManager->getPost($_GET['id']);
		$posts = $postManager->getPosts();

		require('view/backend/updatePostView.php');
	}

	function updatePost($id, $title, $content) {
		$postManager = new PostManager();

		$updatedPost = $postManager->updatePost($id, $title, $content);

		header('Location: index.php?action=admin');
	}

	function listReportedComments() {
		$commentManager = new CommentManager();
		$postManager = new PostManager();

		$listReportedComments = $commentManager->getReportedComments();
		$posts = $postManager->getPosts();

		require('view/backend/reportedCommentsView.php');
	}

	function deleteComment($id)	{
		$commentManager = new CommentManager();

		$deletedComment = $commentManager->deleteComment($id);

		header('Location: index.php?action=listReportedComments');
	}

	function validateComment($id) {
		$commentManager = new CommentManager();

		$validatedComment = $commentManager->validateComment($id);

		header('Location: index.php?action=listReportedComments');
	}

	function goToAddPost() {
		$postManager = new PostManager();

		$posts = $postManager->getPosts();

		require('view/backend/addPostView.php');
	}

	function seePost($id) {
		$postManager = new PostManager();

		$posts = $postManager->getPosts();
		$postWatched = $postManager->getPost($_GET['id']);

		require('view/backend/seePostView.php');
	}