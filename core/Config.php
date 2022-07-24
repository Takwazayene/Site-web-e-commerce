<?php
  class Config {
		private static $instance = NULL;
		public static function getConnexion() {
			if (!isset(self::$instance)) {
				try{
				    self::$instance = new PDO("mysql:host=localhost;dbname=projet", 'root', '');
					self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}catch(Exception $e){
				    die('Erreur: '.$e->getMessage());
				}
			}
		return self::$instance;
		}
		public static function getUserSession(){
			if(!isset($_SESSION))
			{
				session_start();
			}
			if(!isset($_SESSION["id"])) {
				return null;
			}else{
				$user = new User();
				$user->setId($_SESSION["id"]);
				$user->setName($_SESSION["name"]);
				$user->setSurname($_SESSION["surname"]);
				$user->setUsername($_SESSION["username"]);
				$user->setEmail($_SESSION["email"]);
				$user->setPassword($_SESSION["password"]);
				$user->setRole($_SESSION["role"]);
				$user->setNumber($_SESSION["number"]);
				return $user;
			}
		}

	  public static function setUserSession(User $user){
		  if(!isset($_SESSION))
		  {
			  session_start();
		  }
		  $_SESSION["id"] = $user->getId();
		  $_SESSION["name"] = $user->getName();
		  $_SESSION["surname"] = $user->getSurname();
		  $_SESSION["username"] = $user->getUsername();
		  $_SESSION["email"] = $user->getEmail();
		  $_SESSION["password"] = $user->getPassword();
		  $_SESSION["role"] = $user->getRole();
		  $_SESSION["number"] = $user->getNumber();
	  }

	  public static function unsetSession(){
		  if(!isset($_SESSION))
		  {
			  session_start();
		  }
		  unset($_SESSION["id"]);
		  unset($_SESSION["name"]);
		  unset($_SESSION["surname"]);
		  unset($_SESSION["username"]);
		  unset($_SESSION["email"]);
		  unset($_SESSION["password"]);
		  unset($_SESSION["role"]);
		  unset($_SESSION["number"]);
	  }
  }
?>