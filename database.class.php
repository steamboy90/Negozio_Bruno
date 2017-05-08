<?php

class Database 
{
	protected $connection;
	function __construct()
	{
		include_once(__DIR__."/dbconfig.inc.php");
		try {
		
		  // stringa di connessione al DBMS
		  $this->connection = new PDO($driver.":host=".$host.";dbname=".$db, $user, $password);
		  $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  // notifica in caso di connessione effettuata
		  //echo "Connessione a MySQL tramite PDO effettuata.";
		  // chiusura della connessione
		  
		}
		catch(PDOException $e)
		{
		  $this->connection = null;
		  // notifica in caso di errore nel tentativo di connessione
		  echo $e->getMessage();
		}
	}
	
	function __destruct()
	{
		$this->connection = null;
	}
	
	function query($sql)
	{
		$result = null;
		if($this->connection)
		{
			$data = $this->connection->query($sql);
			try{
				while($row = $data->fetch(PDO::FETCH_ASSOC)) {
					  $result[]=$row;
				}
			}
			catch(PDOException $e)
			{}
		}
		return $result;
	}
}
