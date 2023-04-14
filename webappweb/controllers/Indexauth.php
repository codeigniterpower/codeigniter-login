<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indexauth extends CP_Controller {

	function __construct()
	{
		parent::__construct();
	}

	/**	http://127.0.0.1/codeigniterpower/index.php/indexcontroler/index */
	public function index($data = NULL)
	{
		$this->load->view('header.php',$data);
		$this->load->view('inicion.php',$data);
		$this->load->view('footer.php',$data);
	}

	public function auth($action = 'logout', $username = NULL, $userclave = NULL)
	{
		if($usernname == NULL)
			$username = $this->input->post('username');
		if($userclave == NULL)
			$userclave = $this->input->post('userclave');

		if ( $action == 'login' )
		{
			$this->load->model('usersmodel');
			
			$im_access = $this->usersmodel->loginimap($username, $userclave);
			
			$rs_access = $this->usersmodel->logindb($username, $userclave);
		}

		$data = array();
		$message = 'Invalid login parameters or session ended';
		if($rs_access AND $im_access)
		{
			$message = 'Session initialized';
			$viewtitle = 'index at Pagetest';
			$data['message'] = $message;
			$this->session->set_userdata('userdata', $rs_access);
			$this->session->set_flashdata('error',$message);
			redirect('Indexhome');
		}
		else
		{
			$data['message'] = $message;
			$this->session->sess_destroy();
			$this->session->set_flashdata('error',$message);
			header('location:'.site_url('/Indexauth'));
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
