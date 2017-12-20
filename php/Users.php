<?php


class Users {
	
	public $user_id;
	public $nom;
	public $password;
	public $mail;
	public $modo;
	
	function createUser() {
		
		//try en cas d'erreur
		try{
			$bdd = new pdo('mysql:host=127.0.0.1;dbname=projetTrello;charset=utf8','admin','admin');
			
			//insertion des données du user dans Users de la db projetTrello
			$insertion = $bdd->exec('INSERT INTO Users ( name, password, email) VALUES ("$this->nom", "$this->password", "$this->mail")');
		
		$req = $bdd->prepare($insertion);
		
		$req->execute();
		
		$req = NULL;
		$bdo = NULL;
		}
		catch(Exception $e) {
			
			die('Erreur: '.$e->getMessage());
		}
		
	}
	
	function updateUserInfo() {
		
		
	}
	
	function removeUser() {
		
		
	}
}

?>