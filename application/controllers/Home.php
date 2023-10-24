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
		$socket = $this->crypto->socket($this->session->userdata("login_token"));
		$s = json_decode($socket);
		$cek = $this->db->get_where("last_login",['members'=>$this->session->userdata("username"),'status'=>0])->num_rows();
		if ($cek == 0) {
			$this->db->insert("last_login",[
				'members'=>$this->session->userdata("username"),
				'token'=>$this->session->userdata("login_token"),
				'socket'=>$s->socket_token
			]);
		}else{
			$this->db->update("last_login",[
				'token'=>$this->session->userdata("login_token"),
				'socket'=>$s->socket_token
			],[
				'members'=>$this->session->userdata("username"),
				'status'=>0
			]);
		}
		$data = [
			'title'=>"Dashboard",
			'menu'=>"home",
			'user'=>$this->db->get_where("members",['username'=>$this->session->userdata('username')])->row(),
			'login'=>$this->db->order_by('id','desc')->get_where("last_login",['members'=>$this->session->userdata('username'),'status'=>0])->row(),
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
	public function getType()
	{
		return mt_rand(0, 1);
	}
	public function getStatus()
	{
		return mt_rand(0, 1);
	}
	public function trade()
	{
		jsons();
		$input = $this->input->post();
		$type = $this->getType();
		$status = $this->getStatus();
		$opit = $input['profit'] - $input['base'];
		if ($status == 1) {
			$balance = $input['balance']+$opit;
			$profit = $input['profit'];
		}else{
			$balance = $input['balance']-$input['base'];
			$profit = $input['base'];
		}
		$this->db->insert("trade",[
			'members'=>$this->session->userdata("username"),
			'coin'=>$input['coin'],
			'base'=>$input['base'],
			'chance'=>$input['chance'],
			'payout'=>$input['payout'],
			'profit'=>$input['profit'],
			'balance'=>$balance,
			'type'=>$type,
			'status'=>$status
		]);
		$this->db->update("wallet",['balance'=>$balance],['coin'=>$input['coin'],'members'=>$this->session->userdata("username")]);
		json_success("Success",[
			'type'=>$type,
			'base'=>$input['base'],
			'profit'=>$profit,
			'balance'=>$balance,
			'status'=>$status
		]);
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