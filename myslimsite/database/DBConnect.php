<?php

class DBH {

	private $serverName;
	private $dbName;
	private $userName;
	private $password;

	public function connect() {
		// $this->serverName = 'localhost';
		// $this->dbName = 'whatsnext';

		$this->serverName = 'mysql:host=localhost;dbname=myslimsite';
		$this->userName = 'root';
		$this->password = '';
		
		$conn = new PDO($this->serverName, $this->userName, $this->password);

		return $conn;
	
	}

}


?>
