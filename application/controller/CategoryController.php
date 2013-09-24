<?php

class CategoryController extends Controller
{

	public function process(){
		$this->view->nbProduct = $this->product->getNbProduct();
		$this->view->productData = $this->product->getProductData();
	}

}