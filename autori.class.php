<?php
class autori extends dbo
{
	protected $id_autore=null;
	protected $autore;
	protected $nazionalita;
	
	
	function __construct(){
		parent::__construct();
		$this->table = "libreria";
	}
	
	function getid_autori()
	{
		return $this->id_autori;
	}
	
	function getautore()
	{
		return $this->autore;
	}
	
	function getnazionalita()
	{
		return $this->nazionalita;
	}
	
	
	function setid_autori($val)
	{
		$this->id_autori=$val;
	}
	
	function setautore($val)
	{
		$this->autore=$val;
	}
	
	function setnazionalita($val)
	{
		$this->nazionalita=$val;
	}
	
	
	
	
	
	
	function load($id_autori)
	{
		$where['id_autori']=$id_autori;
		$result = $this->select($where);
		$this->copy($result[0]);
		return $this->id_autori!=null;
	}
}
