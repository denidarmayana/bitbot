<?php
/**
 * 
 */
class Wallet extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		cekSession();
	}
	public function index()
	{
		$data = [
			'title'=>"My Wallet",
			'menu'=>"wallet"
		];
		$this->template->load("template",'wallet',$data);
	}
	public function address()
	{
		jsons();
		$input = $this->input->post();
		$response = $this->crypto->getAddress($input['token'],$input['coin']);
		echo $response;
	}
	public function getSoket()
	{
		jsons();
		$input = $this->input->post();
		$response = $this->crypto->socket($input['token']);
		echo $response;
	}
	public function save()
	{
		jsons();
		$input = $this->input->post();
		$cek = $this->db->get_where("wallet",['coin'=>$input['coin'],'members'=>$this->session->userdata("username")])->num_rows();
		if ($cek == 0) {
			$this->db->insert("wallet",[
				'coin'=>$input['coin'],
				'balance'=>$input['balance'],
				'address'=>$input['address'],
				'members'=>$this->session->userdata("username")
			]);
		}else{
			$this->db->update("wallet",['balance'=>$input['balance']],[
				'coin'=>$input['coin'],
				'address'=>$input['address'],
				'members'=>$this->session->userdata("username")
			]);
		}
	}
}