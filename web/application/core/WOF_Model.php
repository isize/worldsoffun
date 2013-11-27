<?php 

	/**
	 * The project's own model
	 * @package default
	 * @author Stef Wijnberg  
	 */
	class WOF_Model extends CI_Model {
		
		/**
		 * The name of the table for the model,
		 * will be set in the constructor
		 * @var string
		 */
		public $table;
		
		/**
		 * Contains all the table field_data
		 * @var array
		 */
		public $fields;
		
		
		
		/**
		 * Validates the inputted data
		 * @return void
		 * @author Stef Wijnberg
		 */
		function validate($data) {
			
			$errors = array();
			
			$fields = $this->mandatoryFields();
			foreach($fields as $field=>$label){
				if(empty($data[$field])){
					$errors[] = 'Het veld "'.$label.'" is verplicht.';
				}
			}
			
			return $errors;
		}
		
		/**
		 * Finds the record by i'ts id
		 * @return void
		 * @author Stef Wijnberg
		 */
		function findByPK($id) {
			
			$result = $this->db->get_where($this->table,array('id'=>$id));
			return $result->row_array();
			
		}
		
		/**
		 * Delete record by id
		 * @return void
		 * @author Stef WIjnberg
		 */
		function delete($id) {
			$this->db->delete($this->table, array('id' => $id)); 
		}
		
		/**
		 * Finds the record by i'ts id
		 * @return void
		 * @author Stef Wijnberg
		 */
		function find($field,$value) {
			$result = $this->db->get_where($this->table,array($field=>$value));
			
			
			return $result->result_array();
		}
		
		/**
		 * Finds all the records
		 * @return void
		 * @author Stef Wijnberg
		 */
		function findAll() {
			$result = $this->db->get_where($this->table,array());
			return $result->result_array();
		}
		
		/**
		 * Finds the record by i'ts id
		 * @return void
		 * @author Stef Wijnberg
		 */
		function findRecord($field,$value) {
			$result = $this->db->get_where($this->table,array($field=>$value));
			return $result->row_array();
		}
		
		/**
		 * Updates data
		 * @return void
		 * @author stef wijnberg
		 */
		function update($data,$id) {
			$this->db->where('id', $id);
			$this->db->update($this->table, $data); 

		}
		
		/**
		 * Function for easy inserting
		 * Returns everything including the ID
		 * @return void
		 * @author Stef Wijnberg  
		 */
		function insert($data) {
			$this->db->insert($this->table,$data);
			
			$data['id'] = $this->db->insert_id();
			
			return $data;
		}
		
	} // END

?>