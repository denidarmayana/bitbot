<?php
/**
 * 
 */
class Crypto 
{
	
	public function curl($url,$data)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>$data,
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json'
		  ),
		));
		return curl_exec($curl);
	}
	public function login($email,$password)
	{
		$data = '{
			    "user":"'.$email.'",
			    "password":"'.$password.'",
			    "api_key":"31c84acdf24da08c2e60fcf28ee08a64792d38692182533905dc62c04776f8d4"
			}';
		return $this->curl("https://api.pasino.io/api/login",$data);
	}
	public function getAddress($token,$coin)
	{
		$data = '{
			"token":"'.$token.'",
			"coin":"'.$coin.'"
		}';
		return $this->curl("https://api.pasino.io/deposit/get-deposit-information",$data);
	}
	public function socket($token)
	{
		$data = '{
			"token":"'.$token.'"
		}';
		return $this->curl("https://api.pasino.io/account/get-socket-token",$data);
	}
	public function auth_socket($token)
	{
		$data = '{
			"token":"'.$token.'"
		}';
		return $this->curl("http://localhost:3000/api/socket",$data);
	}
	public function getBalance($coin)
	{
		$data = '{
			"coin":"'.$coin.'"
		}';
		return $this->curl("http://localhost:3000/api/address",$data);
	}
	public function send($token,$coin,$address,$amount)
	{
		$data = '{
			"token":"'.$token.'",
			"coin":"'.$coin.'",
			"method":"DIRECT",
			"address":"'.$address.'",
			"amount":"'.$amount.'",
		}';
		return $this->curl("https://api.pasino.io/withdraw/place-withdrawal",$data);
	}
	public function register($username,$email,$password)
	{
		$data = '{
			"user_name":"'.$username.'",
			"user_email":"'.$email.'",
			"password":"'.$password.'",
			"agreement":"1",
      		"referrer":"1234556",
      		"api_key":"31c84acdf24da08c2e60fcf28ee08a64792d38692182533905dc62c04776f8d4"
		}';
		return $this->curl("https://api.pasino.io/api/register",$data);
	}
}