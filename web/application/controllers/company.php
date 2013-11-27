<?php 


	/**
	 * undocumented class
	 *
	 * @package default
	 * @author  
	 */
	class Company extends WOF_Controller {
		
		/**
		 * undocumented function
		 *
		 * @return void
		 * @author  
		 */
		function index() {
			$this->loadView('company/index');
		}
		
		/**
		 * undocumented function
		 *
		 * @return void
		 * @author  
		 */
		function select() {
			
			$this->isClient();
			$this->load->model('CompanyModel');
			
			$companies = $this->CompanyModel->findByClient($this->client['id']);
			
			if(count($companies) == 1){
				
				$this->redirect('/machine/select/'.$companies[0]['id']);
			}
			
			
		}
		
	} // END

?>