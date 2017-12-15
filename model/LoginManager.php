<?php
	namespace OpenClassrooms\LeBlog\Model;

	use OpenClassrooms\LeBlog\Model\Manager;

	

	class LoginManager extends Manager {
		public function getLogin() { 
			$db = $this->dbConnect();
			$req = $db->query('SELECT id, title, content FROM login_&_pass');

			return $req;
		}
	}