<?php

class NousController extends Controller
{

	public function process(){
		var_dump($_SESSION['adminauth']);
		if(!$_SESSION['adminauth']){
			header("location:/nousauth");
		}
	}

}