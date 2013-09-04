<?php

class View
{
	
	/**
	 * @param field_type $layout
	 */
	public function setLayout($layout) 
	{
		$this->layout = $layout;
	}
	
	public function render($filename)
	{
		ob_start();
		require_once VIEW_PATH . DS . $this->layout; 
		require_once VIEW_PATH . DS . $filename;
		return ob_get_clean();
	}
	
}