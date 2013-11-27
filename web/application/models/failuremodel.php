<?php 

	/**
	 * 
	 * @package default
	 * @author Stef Wijnberg  
	 */
	class FailureModel extends WOF_Model {
		
		/**
		 * undocumented function
		 *
		 * @return void
		 * @author  
		 */
		function __construct() {
			WOF_Model::__construct();
			$this->table = 'failure';
		}
	}