<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("traits/New_trait.php");
use traits\New_trait;
use traits\New2;
include_once("traits\New2.php");
class Welcome extends CI_Controller {
	use New_trait, New2;
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$R=$this->in();
		$s=$this->inoo();
		$this->load->view('welcome_message',["r"=>$R,"s"=>$s]);
	}
}
