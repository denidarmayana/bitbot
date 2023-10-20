<?php
/**
 * 
 */
class Auth extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
		$data = [
			'title'=>"Sign In"
		];
		$this->template->load("login",'auth',$data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("auth");
	}
	public function login()
	{
		jsons();
		$input = $this->input->post();
		$members = $this->db->get_where("members",['username'=>$input['username']]);
		if ($members->num_rows() == 0) {
			json_error("Username not registerd",null);
		}else{
			$row = $members->row();
			if(password_verify($input['password'], $row->password)){
				$response = $this->crypto->login($row->email,$input['password']);
				$json = json_decode($response);
				if($json->success == true){
					$socket = $this->crypto->socket($json->token);
					$soket = json_decode($socket);
					if ($soket->success == true) {
						$this->db->insert("last_login",[
							'members'=>$row->username,
							'token'=>$json->token,
							'socket'=>$soket->socket_token,
							'last_login'=>date("Y-m-d H:i:s")
						]);
						$this->session->set_userdata([
							'login'=>true,
							'username'=>$row->username
						]);
						json_success($json->message,null);
					}else{
						json_error($soket->message,null);
					}
					
				}else{
					json_error($json->message,null);
				}
			}else{
				json_error("The password you entered does not match",null);
			}
		}
	}
}