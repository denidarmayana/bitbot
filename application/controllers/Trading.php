<?php
/**
 * 
 */
class Trading extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		cekSession();
	}
	public function index()
	{
		$data = [
			'title'=>"Trading Board",
			'user'=>$this->db->get_where("members",['username'=>$this->session->userdata('username')])->row(),
			'login'=>$this->db->get_where("last_login",['members'=>$this->session->userdata('username'),'status'=>0])->row(),
		];
		$this->template->load('template','trading',$data);
	}
}