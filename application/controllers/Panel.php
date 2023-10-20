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
			'new'=>$this->db->order_by('id','desc')->like('created_at',date("Y-m-d"))->get("members")->result(),
			'count'=>$this->db->get("members")->num_rows(),
			'wd'=>$this->db->order_by('id','desc')->like('created_at',date("Y-m-d"))->get("withdrawal")->result(),
		];
		$this->template->load("panel",'admin/home',$data);
	}
	public function members()
	{
		$data = [
			'members'=>$this->db->order_by('id','desc')->get("members")->result(),
		];
		$this->template->load("panel",'admin/members',$data);
	}
	public function wd()
	{
		$data = [
			'wd'=>$this->db->order_by('id','desc')->get("withdrawal")->result(),
		];
		$this->template->load("panel",'admin/wd',$data);
	}
	public function deposit()
	{
		$data = [
			'depo'=>$this->db->order_by('id','desc')->get("wallet")->result(),
		];
		$this->template->load("panel",'admin/deposit',$data);
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
}