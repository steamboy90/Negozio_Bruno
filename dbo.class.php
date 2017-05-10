<?php

class dbo
{
	protected $table;
	protected $db;
	
	function __construct()
	{
		$this->db = new Database();
	}
	
	function setTable($table)
	{
		$this->table = $table;
	}
	
	/**
	$data array associativo coppie chiave valore
	*/
	function insert($data)
	{
		//"INSERT into <table> (col1,col2,col3...) values ('v1','v2','v3'....)";
		$cols = array_keys($data);
		$values = array_values($data);
		$fields = "(".implode(",",$cols).")";
		$binds = "('".implode("','",$values)."')";
		$sql = "INSERT INTO ".$this->table." ".$fields." VALUES ".$binds;
		
		return $this->db->query($sql);
		
	}
	
	function update($data,$where)
	{
		foreach ($data as $k=>$v)
			$fields[] = "'".$k."'='".$v."'";
		$sql = "UPDATE ".$this->table." SET ".implode(",",$fields);
		$cond = "WHERE ";
		foreach($where as $k=>$v)
			$conds[] = "'".$k."'='".$v."'";
		$cond .= implode(" AND ",$conds);
		$sql.=" ".$cond;
		return $this->db->query($sql);
		
	}
	
	function select($where=null, $field="*")
	{
		if(is_array($where))
		{
			foreach($where as $k=>$v)
				$condition[] = $this->table.".".$k."='".$v."'";
			
			$where = implode(" AND ", $condition);
		}
		if($where)
			$where = "where ".$where;
		
		if(is_array($field))
		{
			foreach($field as $v)
				$column[] = $this->table.".".$v;
			
			$field = implode(", ", $column);
		}
		
		$sql = "select ".$field." from ".$this->table." ".$where;
		return $this->db->query($sql);
	}
	
	/**
	@param $data è array associativo con attributi e valori da settare
	*/
	function copy($data)
	{
		//Verifica che $data sia un array
		if(is_array($data))
		{
			//Loop sui valori di $data, $k è una chiave, $v + il valore 
			foreach ($data as $k=>$v)
			{
				//Metodo set per impostare il valore della proprietà $k
				$setter = "set".$k;
				//Test di esistenza del metodo $setter nella classe Cliente
				if(method_exists($this,$setter))
					//Invocazione sull'oggetto istanza di Cliente ($this)
					// del metodo $setter, con argomenti di chiamata in array($v)
					call_user_func_array(array($this,$setter),array($v));
			}
		}
		
	}
}
