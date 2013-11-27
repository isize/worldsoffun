<?php 

	/**
	 * 
	 * @package default
	 * @author Stef Wijnberg  
	 */
	class MachineModel extends WOF_Model {
		
		/**
		 * undocumented function
		 *
		 * @return void
		 * @author  
		 */
		function __construct() {
			WOF_Model::__construct();
			$this->table = 'machine';
		}
		
		/**
		 * Finds the machine for the current company
		 * @return void
		 * @author  Stef Wijnberg
		 */
		function findByCompany($company_id) {
			
			
			$this->db->select('machine.*');
			$this->db->join('company_machine','company_machine.machine_id = machine.id');
			$this->db->where('company_machine.company_id',$company_id);
			
			return $this->db->get('machine')->result_array();
		}
	}