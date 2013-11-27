<?php 

	/**
	 * 
	 * @package default
	 * @author Stef Wijnberg  
	 */
	class CompanyModel extends WOF_Model {
		
		/**
		 * undocumented function
		 *
		 * @return void
		 * @author  
		 */
		function __construct() {
			WOF_Model::__construct();
			$this->table = 'company';
		}
		
		/**
		 * undocumented function
		 *
		 * @return void
		 * @author  
		 */
		function fields() {
			return array(
				'name' => 'Bedrijfsnaam',
				'contact' => 'Contactpersoon',
				'address' => 'Adres',
				'zip' => 'Postcode',
				'city' => 'Plaats',
				'email' => 'E-mailadres van bedrijf'
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
		
		/**
		 * Adds the client to the company
		 * @return void
		 * @author Stef Wijnberg
		 */
		function addClient($company_id,$client_id) {
			
			$this->db->insert('company_client',array(
				'company_id' => $company_id,
				'client_id' => $client_id
			));
			
		}
		/**
		 * Adds the machine to the company
		 * @return void
		 * @author Stef Wijnberg
		 */
		function addMachine($company_id,$machine_id) {
			
			$this->db->insert('company_machine',array(
				'machine_id' => $machine_id,
				'company_id' => $company_id
			));
			
		}

		/**
		 * Finds the companies for the current client
		 * @return void
		 * @author Stef Wijnberg
		 */
		function findByClient($client_id) {
			$this->db->select('company.*');
			$this->db->join('company_client','company_client.company_id = company.id');
			$this->db->where('company_client.client_id',$client_id);
			
			return $this->db->get('company')->result_array();
		}
		
		
		
		
	}