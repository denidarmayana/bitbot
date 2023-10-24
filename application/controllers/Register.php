<?php
/**
 * 
 */
class Register extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

	}
	public function index()
	{
		$data = [
			'title'=>"Register"
		];
		$this->load->view('register',$data);
	}
	public function action()
	{
		jsons();
		$input = $this->input->post();
		$response = $this->crypto->register($input['username'],$input['email'],$input['password']);
		$json = json_decode($response);
		if ($json->success == false) {
			json_error($json->message,null);
		}else{
			$cek_upline = $this->db->get_where("members",['username'=>$input['upline']])->num_rows();
			if ($cek_upline == 1) {
				$upline = $input['upline'];
			}else{
				$upline = "galaxy";
			}
			$this->db->insert("members",[
				'username'=>$input['username'],
				'email'=>$input['email'],
				'upline'=>$upline,
				'password'=>password_hash($input['password'], PASSWORD_DEFAULT),
			]);
			json_success($json->message,$json->login_token);
		}
	}
}