<?php

class IndexController extends Controller
{
	
	public function process(){
		$this->view->isHomepage = true;
	}
	
}