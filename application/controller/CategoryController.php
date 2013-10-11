<?php

class CategoryController extends Controller
{

	public function process(){
		$product = new Product($this->connection);
		$this->view->nbProduct = $product->getNbProduct();
		$this->view->productData = $product->getProductData();
	}

}