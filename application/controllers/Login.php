<?php
/**
 * 
 */
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view("login_panel");
	}
	public function action()
	{
		jsons();
		$input = $this->input->post();
		if ($input['username'] == "galaxy" && $input['password'] == "galaxy@2023") {
			$this->session->set_userdata([
				'panel'=>TRUE,
			]);
			json_success("Success",null);
		}else{
			json_error("Error",null);
		}
	}
}