<?php

class IndexController extends Controller
{
	
	public function process(){
		$this->view->isHomepage = true;
		
		$this->product->setIdProduct(2);
		$this->view->productData = $this->product->getProductData();
		$this->view->nbProduct = $this->product->nbProduct();
	}
	
}