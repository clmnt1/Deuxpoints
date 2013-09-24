<?php

class Product
{
	
	private $productData = array();
	private $nbProduct;
	
	public function __construct(Connect $connect){
		$this->connect = $connect;
	}
	
	public function setIdProduct($id)
	{
		$this->id = $id;
	}
	
	public function getNbProduct(){
		$req = $this->connect->query('SELECT COUNT(idproduit) AS nbProduit FROM produits');
		$nbProduct = mysqli_fetch_array($req);
		return $nbProduct;
	}

	public function getProductData(){
		$req = $this->connect->query('SELECT * FROM produits');
		$productData = array();
		$productData = mysqli_fetch_all($req);
		/*while($productData = mysqli_fetch_assoc($req)){
			$productData[] = $productData;
			var_dump($productData);
		}*/
		return $productData;
	}
	
}