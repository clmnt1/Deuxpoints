<?php
class Upload
{
	
	private $data = array();
	
	public function fileUpload()
	{
		$dir = PUB_PATH . DS . "img/products/";
		$file = basename($_FILES['avatar']['name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['avatar']['name'], '.');
		$maxSize = 100000;
		$size = filesize($_FILES['avatar']['tmp_name']);
		
		$file = strtr($file,
				'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
				'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		$file = preg_replace('/([^.a-z0-9]+)/i', '-', $file);
		$file = strtolower($file);
		$data['file'] = $file;
		
		if(in_array($extension, $extensions)){
			
			if($size <= $maxSize){
				if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dir . $file)){
					$data['message'] = "Uploadée avec succès";
				}else{
					$data['message'] = "erreur";
				}
			}else{
				$data['message'] = "Le fichier est trop lourd";
			}
		}else{
			$data['message'] = "Mauvaise extension : Accepte seulement .png, .jpg, .jpeg, .gif";
		}
		
		return $data;
	}
}