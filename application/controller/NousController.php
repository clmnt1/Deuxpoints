<?php

class NousController extends Controller
{

	public function process()
	{	
		// SESSION
		if(!$_SESSION['adminauth']){
			header("location:/nousauth");
		}
		// CONNECT DB
		$product = new Product($this->connection);
		// ADD PRODUCT
		if(!empty($_POST) && isset($_POST['addTitle']) && isset($_POST['addDesc']) && isset($_POST['addQte']) && isset($_POST['addPrice']) && isset($_POST['addType']) && isset($_FILES['avatar'])){
			$this->view->message = $product->addProductData($_POST);
		}
		// MODIFY PRODUCT
		if(!empty($_POST) && isset($_POST['modTitle']) && isset($_POST['modDesc']) && isset($_POST['modQte']) && isset($_POST['modPrice']) && isset($_POST['modType'])){
			$this->view->message = $product->setProductData($_POST);
		}
		// DELETE PRODUCT
		if(!empty($_POST) && isset($_POST['delete-product'])){
			$this->view->message = $product->deleteProduct($_POST['mod']);
		}
		$this->view->nbProduct = $product->getNbProduct();
		$this->view->productData = $product->getProductData();
	}
	
}