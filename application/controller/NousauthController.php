<?php

class NousauthController extends Controller
{

	public function process()
	{
		if(isset($_GET['adminauth']) && $_GET['adminauth'] == "disconnect"){
			$_SESSION['adminauth'] = false;
			header("location:/nousauth");
		}
		if(isset($_SESSION['adminauth']) && $_SESSION['adminauth'] == true){
			header("location:/nous");
		}
		$auth = new Authentification($this->connection);
		$auth->checkAuth($_POST, "admins", "nous");
	}

}