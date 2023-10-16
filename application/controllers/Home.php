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
	public function getcoin()
	{
		jsons();
		$input = $this->input->post();
		$cek = $this->db->get_where("wallet",['coin'=>$input['coin'],'members'=>$this->session->userdata("username")]);
		if ($cek->num_rows() == 0) {
			json_error("Coin not Fount",null);
		}else{
			json_success("Coin Found",$cek->row());
		}
	}
	public function updatebalance()
	{
		jsons();
		$input = $this->input->post();
		$update = $this->db->update("wallet",['balance'=>$input['balance']],['coin'=>$input['coin'],'members'=>$this->session->userdata('username')]);
		if ($update) {
			json_success("Success",$update);
		}else{
			json_error("Error",null);
		}
	}
}