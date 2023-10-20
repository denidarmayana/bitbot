<?php
/**
 * 
 */
use WebSocket\Client;

class Sockets 
{
	public function connect()
	{
		$app =& get_instance();
		$token = $app->db->order_by('id','desc')
		->get_where("last_login",['members'=>$app->session->userdata('username'),'status'=>0])
		->row();
		echo '<script>setTimeout(function() {
	  		var pesan = JSON.stringify({method:"initialization",socket_token:"'.$token->socket.'"})
	  		socket.send(pesan)
	  	},1000)</script>';
	}
	
}