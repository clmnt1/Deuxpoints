<?php

class Product
{
	
	private $productData = array();
	
	public function __construct(Connect $connect){
		$this->connect = $connect;
	}
	
	public function setIdProduct($id)
	{
		$this->id = $id;
	}
	
	public function getProductData(){
		$req = $this->connect->query('SELECT * FROM produits WHERE idProduit =' . $this->id);
		$productData = mysqli_fetch_array($req);
		return $productData;
	}
	
	public function nbProduct(){
		$req = $this->connect->query('SELECT COUNT(idproduit) AS nbProduit FROM produits');
		$nbProduct = mysqli_fetch_array($req);
		return $nbProduct;
	}

}