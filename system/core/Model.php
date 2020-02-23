<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Model {

	var $pdo;
	public function __construct() {
		/* Connect to an ODBC database using driver invocation */
$dsn = 'mysql:host=localhost;dbname=croissantage-simple';
$user = 'root';
$password = '';

	try {
		$this->pdo = new PDO($dsn, $user, $password);
		
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
	}

	
	public function __get($key)
	{
		// Debugging note:
		//	If you're here because you're getting an error message
		//	saying 'Undefined Property: system/core/Model.php', it's
		//	most likely a typo in your model code.
		return get_instance()->$key;
	}

}
