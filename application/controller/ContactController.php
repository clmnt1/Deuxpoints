<?php

class ContactController extends Controller
{

	public function process(){
		$this->view->var = "Salut"; //Toujours faire $this-> pour le transmettre à la vue  pour que la variable puisse être affichée		
		/*$result = $this->db->query('SELECT * FROM user'); //Exemple de connection à la base de données*/
	}

}