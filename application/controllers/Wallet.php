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
			'menu'=>"wallet",
			'user'=>$this->db->get_where("members",['username'=>$this->session->userdata('username')])->row(),
		];
		$this->template->load("template",'wallet',$data);
	}
	public function address()
	{
		jsons();
		$input = $this->input->post();
		$token = $this->db->order_by('id','desc')
		->get_where("last_login",['members'=>$this->session->userdata('username'),'status'=>0])
		->row();
		if ($input['coin'] == "MBIT") {
			$cek = $this->db->get_where("wallet",['coin'=>"MBIT",'members'=>$this->session->userdata("username")])->num_rows();
			if ($cek == 0) {
				$this->db->insert("wallet",[
					'coin'=>"MBIT",
					'address'=>"0x8CFcecf2B70a4Cb6FB955775380E714580Cfd749",
					'members'=>$this->session->userdata("username")
				]);
			}else{
				$this->db->update("wallet",[
					'address'=>"0x8CFcecf2B70a4Cb6FB955775380E714580Cfd749",
				],[
					'coin'=>"MBIT",
					'members'=>$this->session->userdata("username")
				]);
			}
		}else{
			$response = $this->crypto->getAddress($token->token,$input['coin']);
			$row = json_decode($response);
			$cek = $this->db->get_where("wallet",['coin'=>$input['coin'],'members'=>$this->session->userdata("username")])->num_rows();
			if ($cek == 0) {
				$this->db->insert("wallet",[
					'coin'=>$input['coin'],
					'address'=>$row->address,
					'members'=>$this->session->userdata("username")
				]);
			}else{
				$this->db->update("wallet",[
					'address'=>$row->address,
				],[
					'coin'=>$input['coin'],
					'members'=>$this->session->userdata("username")
				]);
			}
		}
		$data = $this->db->get_where("wallet",['coin'=>$input['coin'],'members'=>$this->session->userdata("username")])->row();
		$wallets = $this->db->get_where("my_wallet",['coin'=>$input['coin']])->row();
		$res = [
			'address'=>$data->address,
			'qr'=>'https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl='.$data->address,
			'balance'=>$data->balance,
			'minimun'=>$wallets->minimun
		];
		echo json_encode($res);
		
	}
	public function send_coin($coin,$amount)
	{
		$wallet = $this->db->get_where("my_wallet",['coin'=>$coin])->row();
		$token = $this->db->order_by('id','desc')->get_where("last_login",['members'=>$this->session->userdata('username'),'status'=>0])->row();
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.pasino.io/withdraw/place-withdrawal',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{
		    "token":"'.$token->token.'",
		    "coin":"'.$coin.'",
		    "method":"DIRECT",
		    "address":"'.$wallet->address.'",
		    "amount":"'.$amount.'"
		}',
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json'
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}
	public function save()
	{
		jsons();
		$input = $this->input->post();
		$cek = $this->db->get_where("deposit",['members'=>$this->session->userdata("username"),'coin'=>$input['coin']]);
		$this->db->insert("deposit",['members'=>$this->session->userdata("username"),'coin'=>$input['coin'],'balance'=>$input['balance']]);
		$send = $this->send_coin($input['coin'],$input['balance']);
		$send_coin = json_decode($send);
		if ($send_coin->success == true) {
			$row = $this->db->get_where("wallet",['coin'=>$input['coin'],'members'=>$this->session->userdata("username")])->row();
			$new_balance = $row->balance+$input['balance'];
			$this->db->update("wallet",['balance'=>$new_balance],['coin'=>$input['coin'],'members'=>$this->session->userdata("username")]);
			$rows = $this->db->get_where("wallet",['coin'=>$input['coin'],'members'=>$this->session->userdata("username")])->row();
			$data = [
				'balance'=>$rows->balance,
			];
		}else{
			echo json_encode($send);	
		}
		
		
	}
	public function penarikan()
	{
		jsons();
		$input = $this->input->post();
		$this->db->insert("withdrawal",[
			'members'=>$this->session->userdata("username"),
			'coin'=>$input['coin'],
			'amount'=>$input['balance'],
			'address'=>$input['address']
		]);
		json_success("Success",null);
	}
}