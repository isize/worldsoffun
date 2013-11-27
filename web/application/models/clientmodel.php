<?php 

	/**
	 * 
	 * @package default
	 * @author Stef Wijnberg  
	 */
	class ClientModel extends WOF_Model {
		
		/**
		 * undocumented function
		 *
		 * @return void
		 * @author  
		 */
		function __construct() {
			WOF_Model::__construct();
			$this->table = 'client';
		}
		
		/**
		 * undocumented function
		 *
		 * @return void
		 * @author  
		 */
		function fields() {
			return array(
				'name' => 'Uw naam',
				'phone' => 'Uw 06-nummer',
				'email' => 'Uw e-mailadres'
			);
		}
		
		
		
		/**
		 * undocumented function
		 *
		 * @return void
		 * @author  
		 */
		function mandatoryFields() {
			return $this->fields();
		}
	}
	