<?php 


	/**
	 * undocumented class
	 *
	 * @package default
	 * @author  
	 */
	class Failure extends WOF_Controller {
		
		/**
		 * undocumented function
		 *
		 * @return void
		 * @author  
		 */
		function select($company_id,$machine_id) {
			
			$failures = array(
				'Stroing A',
				'Lampje knippert',
				'Centen storing 3',
				'Bakje kapot',
				'Knop zit vast'
			);
			
			$this->set('failures',$failures);
			
			$this->loadView('failure/select');
		}
		
		/**
		 * undocumented function
		 *
		 * @return void
		 * @author  
		 */
		function send() {
			$this->loadView('failure/send');
		}
		
	} // END

?>