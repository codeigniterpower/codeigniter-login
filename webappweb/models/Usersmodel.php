<?php

class Usersmodel extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function logindb($username, $password)
	{
		log_message('info', __METHOD__ .' begin ');

		$this->load->database();
		$query = $this->db->get_where('users', array('username'=>$username, 'userpass'=>$password));
		$array_result = $query->row_array();

		log_message('info', __METHOD__ .' ended with '.print_r($array_result,TRUE));
		return $array_result;
	}

	public function loginimap($username, $password)
	{
		log_message('info', __METHOD__ .' begin ');

		$config = array('plain'=> TRUE, 'username' => $username, 'password' => $password);
		$this->load->library('Imap', $config);
		$valid  = $this->imap->connect($config);

		log_message('info', __METHOD__ .' ended with '.print_r($valid,TRUE));
		return $valid;
	}

}

?>
