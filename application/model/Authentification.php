<?php

class Authentification
{
	
	private $connected;
	
	public function __construct(Connect $connect){
		require_once APP_PATH . DS . '/config.php';
		$this->connect = $connect;
		$connect = $connect->connect(); 
	}
	
	public function isConnected()
	{
		return $this->connected;
	}
	
	public function setConnected($connected)
	{
		$this->connected = $connected;
	}
	
	public function checkAuth(array $params){
		sleep(2);
		if($params){
		$sqlAuth = "SELECT *,(CASE WHEN admin_password = '". $params['password'] . "' THEN 1 ELSE 0 END) AS result FROM admins WHERE admin_login = '" . $params['login'] . "';";
		if($req = $this->connect->query($sqlAuth)){
			$_SESSION['login'] = $params['login'];
			$_SESSION['adminauth'] = true;
			header("location:/nous");
		}
		/*$reqAuth = $connexion->prepare($sqlAuth);
		$reqAuth->execute($params);
		$resultAuth = $reqAuth->fetch();
		
		if((isset($result['result']) && 0 == $result['result'] || false === $result)){
			$auth = false;
		}else{
			$auth = true;
			$sqlName = "SELECT user_pseudo, user_id FROM users WHERE user_login = '" . $params['login'] . "'";
			$reqName = $connexion->query($sqlName);
			$resultName = $reqName->fetch();
			$_SESSION['pseudo'] = utf8_encode($resultName[0]);
			$_SESSION['id'] = $resultName[1];
		}
		
		return $resultAuth['result'];*/
		}
	}

}