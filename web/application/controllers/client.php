<?php 


	/**
	 * undocumented class
	 *
	 * @package default
	 * @author  
	 */
	class Client extends WOF_Controller {
		
		/**
		 * undocumented functio
		 *
		 * @return void
		 * @author Stef Wijnberg
		 */
		function register() {
			
			$this->load->model('ClientModel');
			$this->load->model('CompanyModel');
			
			if(IS_POST){
				
				
				$clientErrors 	= $this->ClientModel->validate($_POST['client']);
				$companyErrors 	= $this->CompanyModel->validate($_POST['company']);
				
				$this->errors = array_merge($companyErrors,$clientErrors);
				
				if(count($this->errors) == 0){
					
					$client = $this->ClientModel->insert($_POST['client']);
					$company = $this->CompanyModel->insert($_POST['company']);
					
					$this->session->set_userdata('client',$client);
					
					$this->CompanyModel->addClient($company['id'],$client['id']);
					
					$this->message = 'OK';
					
					$this->redirect('/machine/change/'.$company['id']."?fromreg=1");
				}
				
				
				$this->set('client',$_POST['client']);
				$this->set('company',$_POST['company']);
				
			}else{
				$this->set('client',array());
				$this->set('company',array());
			}
			
			$this->set('company_fields',$this->CompanyModel->fields());
			$this->set('client_fields',$this->ClientModel->fields());
			
			
			
			$this->loadView('client/register');
		}

		/**
		 * undocumented function
		 *
		 * @return void
		 * @author  
		 */
		function registered() {
			$this->loadView('client/registered');
		}
		
		/**
		 * 
		 * @return void
		 * @author Stef Wijnberg
		 */
		function login() {
			
			if(IS_POST){
				
				// FIXME get client id from phone id
				$client_id = $this->client['id'];
				$this->load->model('ClientModel');
				$client = $this->ClientModel->findByPK($client_id);
				
				$loginCode = implode('',$_POST['code']);
				if($client['login'] == $loginCode){
					
					$this->session->set_userdata('client',$client);
					
					if($client['change_code'] == 1){
						
						$this->redirect('/client/changecode');
					}else{
						$this->redirect('/company/select');
					}
				}
				
			}
			
			$this->loadView('client/login');
			
		}
		
		
		/**
		 * Allows the user to change the code
		 * @return void
		 * @author Stef Wijnberg
		 */
		function changecode() {
			
			$this->isClient();
			
			
			if(IS_POST){
				
				$loginCode = implode('',$_POST['code']);
				$codeRepeat = implode('',$_POST['code_repeat']);
				
				if($loginCode != $codeRepeat){
					$this->errors[] = 'De codes komen niet overeen';
				}else{
					$this->load->model('ClientModel');
					$this->ClientModel->update(array(
						'change_code' => 0,
						'login' => $loginCode
					),$this->client['id']);
					
					
					$this->redirect('/company/select');
				}
				
				
				
			}
			
			$this->loadView('client/changecode');
			
		}
		
	} // END

?>