<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WOF_Controller extends CI_Controller {

	/**
	 * the template data
	 * @var array
	 */
	public $data = array();
	
	/**
	 * The errors for the template data
	 * @var array
	 */
	public $errors = array();
	
	/**
	 * The message for the template data
	 * @var string
	 */
	public $message = '';

	/**
	 * The loggedin client
	 * @var array
	 */
	public $user = NULL;
	
	/**
	 * The logged in admin
	 * @var array
	 */
	public $admin = NULL;
	

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->_init();
		
	}

	protected function _init()
	{
		$this->output->set_template('default');

		// load jquery
		$this->load->js('static/js/jquery.js');
		$this->load->js('static/js/main.js');
		
		// set sessions
		$this->client = $this->session->userdata('client');
		$this->admin = $this->session->userdata('admin');
		
		// set title and metatags
		$this->setSEO();
	}
	
	/**
	 * Sets the template data
	 * @return void
	 * @author Stef Wijnberg
	 */
	function set($name,$value) {
		$this->data[$name] = $value;
	}

	public function loadView($view){
		
		$this->data['errors'] = count($this->errors) > 0 ? $this->errors : false;
		$this->data['message'] = $this->message != ''? $this->message : false;
		$this->load->view($view,$this->data);
	}
	
	/**
	 * Checks if a user is logged in
	 * @return void
	 * @author Stef Wijnberg
	 */
	function isClient($client_id = null) {
		
		$this->client = $this->session->userdata('client');
		
		if(!$this->client){
			$this->redirect('/client/login');
			return;
		}
		if($client_id != null){
			if($this->client['id'] != $client_id){
				$this->redirect('/inloggen');
				return;	
			}
		}
	}
	
	
	/**
	 * Set all the Title tags, Keywords and meta descriptions
	 * @return void
	 * @author Stef Wijnberg
	 */
	function setSEO() {
		
		$key = $this->router->fetch_class() .'_'.$this->router->fetch_method();
		
		$this->config->load('seo');
		$seoConfig = ($this->config->config['seo']);
		
		if(isset($seoConfig[$key])){
			
			$this->set('page_title',$seoConfig[$key]['title']);
			$this->set('meta_keywords',$seoConfig[$key]['keywords']);  
			$this->set('meta_description',$seoConfig[$key]['description']); 
		
		}else{
			$this->set('meta_keywords', $key);
		}
	}
	
	/**
	 * Redirects
	 * @return void
	 * @author Stef Wijnberg
	 */
	function redirect($uri) {
		redirect($uri);
	}

}
