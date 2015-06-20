<?php
//bloqueia acesso direto pela url
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

class Conecta
{
	private $host;
	private $user;
	private $pwd;
	private $db;
	
	public function __construct($host, $user, $pwd, $db)
	{
		$this->host = $host;
		$this->user = $user;
		$this->pwd = $pwd;
		$this->db = $db;
	}
	
	public function conectaMySql()
	{
		try
		{
			return mysqli_connect($this->host, $this->user, $this->pwd, $this->db);
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
	}
}