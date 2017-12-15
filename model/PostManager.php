<?php
	namespace OpenClassrooms\LeBlog\Model;

	use OpenClassrooms\LeBlog\Model\Manager;

	

	class PostManager extends Manager {
		public function getPosts() { 
			$db = $this->dbConnect();
			$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr, DATE_FORMAT(modification_date, \'%d/%m/%Y\') AS modification_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

			return $req;
		}

		public function getPost($postId) {
		    $db = $this->dbConnect();
		    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr, DATE_FORMAT(modification_date, \'%d/%m/%Y\') AS modification_date_fr FROM posts WHERE id = ?');
		    $req->execute(array($postId));
		    $post = $req->fetch();

		    return $post;
		}

		public function getAllPosts() { 
			$db = $this->dbConnect();
			$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr, DATE_FORMAT(modification_date, \'%d/%m/%Y\') AS modification_date_fr FROM posts ORDER BY creation_date');

			return $req;
		}

		public function getAllPostsReverse() { 
			$db = $this->dbConnect();
			$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr, DATE_FORMAT(modification_date, \'%d/%m/%Y\') AS modification_date_fr FROM posts ORDER BY creation_date DESC');

			return $req;
		}

		public function getLastPost() {
			$db = $this->dbConnect();
			$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr, DATE_FORMAT(modification_date, \'%d/%m/%Y\') AS modification_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 1');

			return $req;
		}

		public function newPost($title, $content) {
			$db = $this->dbConnect();
			$post = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
			$newPost = $post->execute(array($title, $content));

			return $newPost;
		}

		public function deletePost($id) {
			$db = $this->dbConnect();
			$post = $db->prepare('DELETE FROM posts WHERE id = ?');
			$deletedPost = $post->execute(array($id));

			return $deletedPost;
		}

		public function updatePost($id, $title, $content) {
			$db = $this->dbConnect();
			$post = $db->prepare('UPDATE posts SET title = ?, content = ?, modification_date = NOW() WHERE id = ?');
			$updatedPost = $post->execute(array($title, $content, $id));

			return $updatedPost;
		}
	}