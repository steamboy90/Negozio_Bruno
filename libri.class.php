<?php

class libri extends dbo
{
	protected $id_libri=null;
	protected $isbn;
	protected $titolo;
	protected $editore;
	protected $prezzo;
	protected $anno;
	
	
	function __construct(){
		parent::__construct();
		$this->table = "libreria";
	}
	
	function getid_libri()
	{
		return $this->id_libri;
	}
	
	function getisbn()
	{
		return $this->isbn;
	}
	
	function gettitolo()
	{
		return $this->titolo;
	}
	
	function geteditore()
	{
		return $this->editore;
	}
	
	
	function getprezzo()
	{
		return $this->prezzo;
	}
	
	function getanno()
	{
		return $this->anno;
	}
	
	
	function setid_libri($val)
	{
		$this->id_libri=$val;
	}
	
	function setisbn($val)
	{
		$this->isbn=$val;
	}
	
	function settitolo($val)
	{
		$this->titolo=$val;
	}
	
	function seteditore($val)
	{
		$this->editore=$val;
	}
	
	function setprezzo($val)
	{
		$this->prezzo=$val;
	}
	
	function setanno($val)
	{
		$this->anno=$val;
	}
	
	
	
	
	function load($id_libri)
	{
		$where['id_libri']=$id_libri;
		$result = $this->select($where);
		$this->copy($result[0]);
		return $this->id_libri!=null;
	}
}
