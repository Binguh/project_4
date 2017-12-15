<?php
	namespace OpenClassrooms\LeBlog\Model;

	use \OpenClassrooms\LeBlog\Model\Manager;

	//require_once("model/Manager.php");

	class CommentManager extends Manager {
		public function getComments($postId) {
		    $db = $this->dbConnect();
		    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, reported_comment FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		    $comments->execute(array($postId));

		    return $comments;
		}

		public function postComment($postId, $author, $comment) {
			$db = $this->dbConnect();
			$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
			$affectedLines = $comments->execute(array($postId, $author, $comment));

			return $affectedLines;
		}

		public function reportComment($id) {
			$db = $this->dbConnect();
			$comments = $db->prepare('UPDATE comments SET reported_comment = \'reported\' WHERE id = ?');
			$reportedComment = $comments->execute(array($id));

			return $reportedComment;
		}

		public function getReportedComments() {
			$db = $this->dbConnect();
			$listReportedComments = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, reported_comment FROM comments WHERE reported_comment = \'reported\' ORDER BY comment_date DESC');

			return $listReportedComments;
		}

		public function deleteComment($id) {
			$db = $this->dbConnect();
			$comment = $db->prepare('DELETE FROM comments WHERE id = ?');
			$deletedComment = $comment->execute(array($id));

			return $deletedComment;
		}

		public function validateComment($id) {
			$db = $this->dbConnect();
			$comment = $db->prepare('UPDATE comments SET reported_comment = \'validated\' WHERE id = ?');
			$validatedComment = $comment->execute(array($id));

			return $validatedComment;
		}
	}