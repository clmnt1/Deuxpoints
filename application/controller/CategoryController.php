<?php

class CategoryController extends Controller
{

	public function process(){
		$product = new Product();
		$this->view->nbProduct = $product->getNbProduct();
		$this->view->productData = $product->getProductData();
	}

}