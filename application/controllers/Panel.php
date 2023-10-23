<?php
/**
 * 
 */
class Panel extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		cekPanel();
	}
	public function index()
	{
		$data = [
			'members'=>$this->db->order_by('id','desc')->get("members")->result(),
			'wd'=>$this->db->order_by('id','desc')->get("withdrawal")->result(),
			'depo'=>$this->db->order_by('id','desc')->get("wallet")->result(),
		];
		$this->template->load("panel",'admin/home',$data);
	}
	public function show()
	{
		$data = "<option>Select Members</option>";
		$result = $this->db->order_by('id','desc')->get("members")->result();
		foreach ($result as $key) {
			$data.="<option>".$key->username."</option>";
		}
		echo $data;
	}
	public function update()
	{
		jsons();
		$input = $this->input->post();
		$cek = $this->db->get_where('wallet',['members'=>$input['username'],'coin'=>"MBIT"])->row();
		if ($cek) {
			$new_balance = floatval($cek->balance)+floatval($input['balance']);
			$this->db->update('wallet',['balance'=>$new_balance],['members'=>$input['username'],'coin'=>"MBIT"]);
			$this->db->insert("deposit",[
				'members'=>$input['username'],
				'coin'=>"MBIT",
				'balance'=>$input['balance'],
			]);
		}else{
			$this->db->insert("wallet",[
				'members'=>$input['username'],
				'coin'=>"MBIT",
				'address'=>"0x8CFcecf2B70a4Cb6FB955775380E714580Cfd749",
				'balance'=>$input['balance']
			]);
		}
		
		json_success("Success",null);
	}
}