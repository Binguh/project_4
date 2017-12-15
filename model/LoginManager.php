<?php
	namespace OpenClassrooms\LeBlog\Model;

	use OpenClassrooms\LeBlog\Model\Manager;

	

	class LoginManager extends Manager {
		public function getLogin() { 
			$db = $this->dbConnect();
			$req = $db->query('SELECT login, password FROM logins');

			return $req;
		}
	}