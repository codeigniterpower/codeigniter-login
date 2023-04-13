<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indexhome extends CI_Controller {

	private $sessobj;

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url','html'));
		$this->load->library('table');
		$this->load->library('session');
		$this->sessobj = $this->session->userdata('userdata');
		$this->output->enable_profiler(TRUE);
	}

	/**	http://127.0.0.1/codeigniterpower/index.php/indexcontroler/index */
	public function index()
	{
		if($this->sessobj == NULL)
		{
			redirect('Indexauth');
			return;
		}
		$data = array();
		$data['viewtitle'] = 'index at Pagetest';
		$this->load->view('header.php',$data);
		$this->load->view('homesview.php',$data);
		$this->load->view('footer.php',$data);
	}

	public function testfunct()
	{
		if($this->sessobj == NULL)
		{
			redirect('Indexauth');
			return;
		}
		$data = array();
		$data['viewtitle'] = 'testfunc at Pagetest';
		$this->load->view('header.php',$data);
		$this->load->view('homesview.php',$data);
		$this->load->view('footer.php',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
