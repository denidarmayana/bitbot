<?php

if (!function_exists("cekSession")) {
	function cekSession()
	{
		$app =& get_instance();
		if ($app->session->userdata("login") == TRUE) {
			return TRUE;
		}else{
			redirect("auth");
		}
	}
}

if (!function_exists("json_success")) {
	function json_success($message,$data)
	{
		$data = [
			'code'=>200,
			'message'=>$message,
			'data'=>$data,
		];
		echo json_encode($data);
	}
}

if (!function_exists("json_error")) {
	function json_error($message,$data)
	{
		$data = [
			'code'=>203,
			'message'=>$message,
			'data'=>$data,
		];
		echo json_encode($data);
	}
}

if (!function_exists("jsons")) {
	function jsons()
	{
		return header('Content-Type: application/json');
	}
}

if (!function_exists("number")) {
	function number($no) {
	    return number_format($no,0,',','.');
	}
}

if (!function_exists("selisih_waktu")) {
	function selisih_waktu($original) {
	  	date_default_timezone_set('Asia/Jakarta');
	  	$awal  = date_create($original);
		$akhir = date_create();
		$diff  = date_diff( $awal, $akhir );
		return $diff;
	}
}