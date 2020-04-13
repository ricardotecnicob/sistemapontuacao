<?php 

	class consultController extends controller{
		
		public function __construct(){
			parent::__construct();	
				
			$u = new Users();
			$ip = $_SERVER['REMOTE_ADDR'];
			
			$ver = $u->isLogged($ip);
			if($ver == false){
				header("Location: ".BASE_URL."/painel/login");
			}
			
		}	
		
		public function index(){
			$data = array();	
				
			$u = new Users();
			$u->setLoggedUser();
			$company = new Companies($u->getCompany());
			$data['company_name'] = $company->getName();
			$data['company_logo'] = $company->getLogo();
			$data['user_name']	= $u->getName();	
			$data['user_email']	= $u->getEmail();
			$data['user_imagem']= $u->getImagem();	
			$data['sector'] = $u->getSector();	
			$data['iddd'] = $u->getId();	

			if($u->hasPermission('consultar_usuarios')){

				$c = new Clients();

				$data['listClients'] = $c->getClients();

				$this->loadTemplate("consult" , $data);
			}else{
				$data['naotempermissao'] = "NAO";
				$this->loadTemplate("home" , $data);
			}
		}

		public function edit($id){
			$data = array();	
				
			$u = new Users();
			$u->setLoggedUser();
			$company = new Companies($u->getCompany());
			$data['company_name'] = $company->getName();
			$data['company_logo'] = $company->getLogo();
			$data['user_name']	= $u->getName();	
			$data['user_email']	= $u->getEmail();
			$data['user_imagem']= $u->getImagem();	
			$data['sector'] = $u->getSector();	
			$data['iddd'] = $u->getId();	

			if($u->hasPermission('consultar_editar')){

				$c = new Clients();

				if(isset($_POST['n_cartao']) && !empty($_POST['n_cartao'])){
					$init_cartao = addslashes($_POST['init_cartao']);
					$n_cartao = addslashes($_POST['n_cartao']);
					$cpf = addslashes($_POST['cpf']);
					$name = addslashes($_POST['name']);
					$cell01 = addslashes($_POST['cell01']);
					$phone01 = addslashes($_POST['phone01']);
					$cep = addslashes($_POST['cep']);
					$address = addslashes($_POST['address']);
					$number_address = addslashes($_POST['number_address']);
					$neighb_address = addslashes($_POST['neighb_address']);
					$address2 = addslashes($_POST['address2']);
					$state_address = addslashes($_POST['state_address']);
					$city_address = addslashes($_POST['city_address']);
					$obs = addslashes($_POST['obs']);
					$idClient = addslashes($_POST['idClient']);
					$data_nasc = $_POST['data_nasc'];
					$idUserQuemEditou = addslashes($_POST['idUserQuemEditou']);



					if(!empty($cpf) && !empty($name) && !empty($cep) && !empty($address) && !empty($number_address) && !empty($neighb_address) && !empty($state_address) && !empty($city_address) && !empty($data_nasc) && !empty($idUserQuemEditou)){

						$return = $c->editClient($init_cartao,$n_cartao,$cpf,$name,$cell01,$phone01,$cep,$address,$number_address,$neighb_address,$address2,$state_address,$city_address,$obs,$idClient,$data_nasc,$idUserQuemEditou);

						if($return == true){
							$data['success'] = "<strong>Úsuario alterado com sucesso! </strong>";
						}

					}

				}	
				

				$data['listClientsId'] = $c->getClientsId($id);


				$this->loadTemplate("consult_edit" , $data);
			}else{
				$data['naotempermissao'] = "NAO";
				$this->loadTemplate("home" , $data);
			}
		}

		public function del($id){
			$c = new Clients();

			$u = new Users();
			$u->setLoggedUser();
			$company = new Companies($u->getCompany());
			$data['company_name'] = $company->getName();
			$data['company_logo'] = $company->getLogo();
			$data['user_name']	= $u->getName();	
			$data['user_email']	= $u->getEmail();
			$data['user_imagem']= $u->getImagem();	
			$data['sector'] = $u->getSector();	
			$data['iddd'] = $u->getId();	

			if($u->hasPermission('consultar_excluir')){

				$id = addslashes($id);

				$c->delClients($id);

				header("Location: ".BASE_URL."/painel/consult");
			}else{
				$data['naotempermissao'] = "NAO";
				$this->loadTemplate("home" , $data);
			}

		}


	}

?>