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
			    "email":"'.$email.'",
			    "password":"'.$password.'"
			}';
		return $this->curl("http://localhost:3000/api/auth",$data);
	}
	public function getAddress($token,$coin)
	{
		$data = '{
			"token":"'.$token.'",
			"coin":"'.$coin.'"
		}';
		return $this->curl("http://localhost:3000/api/address",$data);
	}
	public function socket($token)
	{
		$data = '{
			"token":"'.$token.'"
		}';
		return $this->curl("http://localhost:3000/api/socket",$data);
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
			"username":"'.$username.'",
			"email":"'.$email.'",
			"password":"'.$password.'"
		}';
		return $this->curl("http://localhost:3000/api/register",$data);
	}
}