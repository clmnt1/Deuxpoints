<?php

class NousauthController extends Controller
{

	public function process(){
	
		$auth = new Authentification($this->connection);
		$auth->checkAuth($_POST);
	}

}