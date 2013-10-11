<?php

class Product
{
	
	private $productData = array();
	private $nbProduct;
	
	public function __construct(Connect $connect){
		$this->connect = $connect;
		$connect = $connect->connect();
	}
	
	public function setIdProduct($id)
	{
		$this->id = $id;
	}
	
	public function addImgName(){
		$upload = new Upload();
		$dataUpload = $upload->fileUpload();
		return $dataUpload;
	}
	
	public function getNbProduct(){
		$reqSql = "SELECT COUNT(idproduit) AS nbProduit FROM produits";
		$req = $this->connect->query($reqSql);
		$nbProduct = mysqli_fetch_array($req);
		return $nbProduct;
	}

	public function getProductData(){
		$reqSql = "SELECT * FROM produits";
		$req = $this->connect->query($reqSql);
		$productData = array();
		$productData = mysqli_fetch_all($req);
		return $productData;
	}
	
	public function addProductData(array $data){
		$dataUpload = $this->addImgName();
		$reqSql = "INSERT INTO produits (nomProduit, descProduit, prixUnitaire, Qte, TypeProduit, imgProduit) VALUES('" . $data['addTitle'] . "', '" . $data['addDesc'] . "', '" . $data['addQte'] . "', '" . $data['addPrice'] . "', '" . $data['addType'] . "', '" . $dataUpload['file'] . "');";
		$req = $this->connect->query($reqSql);
		var_dump($req);
		die();
		return $dataUpload['message'];
	}
	
	public function setProductData(array $data){
		$dataUpload = $this->addImgName();
		$reqSql = "UPDATE produits SET nomProduit='" . $data['modTitle'] . "', descProduit='" . $data['modDesc'] . "', Qte='" . $data['modQte'] . "', prixUnitaire='" . $data['modPrice'] . "', typeProduit='" . $data['modType'] . "' WHERE idProduit =" . $data['mod'] . ";";
		$req = $this->connect->query($reqSql);
		return $dataUpload['message'];
	}
	
	public function deleteProduct($id){
		$reqSql = "DELETE FROM produits WHERE idProduit ='" . $id . "';";
		$req = $this->connect->query($reqSql);
	}
	
}