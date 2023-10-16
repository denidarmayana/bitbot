<?php
/**
 * 
 */
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		cekSession();
	}
	public function index()
	{
		$data = [
			'title'=>"Dashboard",
			'menu'=>"home"
		];
		$this->template->load("template",'home',$data);
	}
}