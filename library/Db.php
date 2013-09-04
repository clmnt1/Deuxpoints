<?php

class Db
{

	private $config = array();
	private $connected = false;
	
	/**
	 * @param multitype: $config
	 */
	public function setConfig($config)
	{
		if('null' !== $config){
			if(is_array($config)){
				$this->config = $config;
			}else{
				throw new InvalidArgumentException('Le paramètre doit être un tableau');
			}
		}
	}
	
	public function __construct($config)
	{
		$this->setConfig($config); //On lui passe le tableau de config à la déclaration de l'objet = new Db($config);
	}
	
	public function connect()
	{
		$link = mysqli_connect(
				$this->config['host'],
				$this->config['user'],
				$this->config['password'],
				$this->config['base']
				);
		
		if(!$link){
			throw new ErrorException('Connexion à la base de donnée impossible');
		}
		
		$this->connected = true;
		$this->connection = $link;
	}
	
	public function isConnect()
	{
		return $this->connected;
	}
	
	public function query($query)
	{
		if(!$this->connected){
			$this->connect();
			$result = mysqli_query($query);
			return $result;
		}
	}
}