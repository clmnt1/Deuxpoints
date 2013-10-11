<?php
class Message
{	
	public function displayMessage($message)
	{
		ob_start();
		echo $message;
		return ob_get_clean();
	}
}