<?php 


	/**
	 * undocumented class
	 *
	 * @package default
	 * @author  
	 */
	class Machine extends WOF_Controller {
		
		/**
		 *
		 * @return void
		 * @author Stef Wijnberg
		 */
		function select($company_id) {
			
			$this->isClient();
			
			// FIXME add security
			
			$this->load->model('CompanyModel');
			$company = $this->CompanyModel->findByPK($company_id);
			$this->set('company',$company);
			
			$this->load->model('MachineModel');
			$machines = $this->MachineModel->findByCompany($company_id);
			$this->set('machines',$machines);
			
			$this->loadView('machine/select');
		}
		
		/**
		 * 
		 * @return void
		 * @author Stef Wijnberg
		 */
		function change($company_id) {
				
			// FIXME ADD SECURITY
			
			$this->load->model('CompanyModel');
			$this->load->model('MachineModel');
			
			$company = $this->CompanyModel->findByPK($company_id);
			$machines = $this->MachineModel->findAll();
			
			if(IS_POST){
				
				if(count($_POST['machine']) > 2 ){
					$this->errors[] = 'U hebt meer dan twee speelautomaten geselecteerd';
				}
				
				if(count($_POST['machine']) == 0){
					$this->errors[] = 'U hebt geen speelautomaten geselecteerd';
				}
				
				if(count($this->errors) == 0){
					
					foreach($_POST['machine'] as $machine_id){
						$this->CompanyModel->addMachine($company_id,$machine_id);
					}
					
					$this->redirect('client/registered');
				}
				
			}

			
			$this->set('company',$company);
			$this->set('machines',$machines);
			
			$this->loadView('machine/change');
		}
		
	} // END

?>