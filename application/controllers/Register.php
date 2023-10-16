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
		$this->template->load("login",'register',$data);
	}
	public function action()
	{
		jsons();
		$input = $this->input->post();
		$response = $this->crypto->register($input['username'],$input['email'],$input['password'],$input['upline']);
		$json = json_decode($response);
		if ($json->success == false) {
			$this->db->insert("members",[
				'username'=>$input['username'],
				'email'=>$input['email'],
				'upline'=>$input['upline'],
				'password'=>password_hash($input['password'], PASSWORD_DEFAULT),
			]);
			json_error($json->message,null);
		}else{
			json_success($json->message,$json->login_token);
		}
	}
}