<?php 

	class registerController extends controller{
		
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

			if($u->hasPermission('registar_usuarios')){

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
					$pontos = 0;
					$ultimo_user_pontuar = 0;
					$idUserQueCadastrou = addslashes($_POST['idUserQueCadastrou']);
					$data_nasc = $_POST['data_nasc'];


					if(!empty($cpf) && !empty($name) && !empty($cep) && !empty($address) && !empty($number_address) && !empty($neighb_address) && !empty($state_address) && !empty($city_address) && !empty($idUserQueCadastrou) && !empty($data_nasc)){

						$return = $c->addClient($init_cartao,$n_cartao,$cpf,$name,$cell01,$phone01,$cep,$address,$number_address,$neighb_address,$address2,$state_address,$city_address,$obs,$pontos ,$ultimo_user_pontuar,$idUserQueCadastrou,$data_nasc);

						if($return == true){
							$data['success'] = "<strong>Úsuario cadastrado com sucesso! </strong>";
						}else{
							$data['error'] = "<strong>CPF já cadastrado!</strong>";
						}

					}else{
						$data['error'] = "<strong>Preencha todos os campos!</strong>";
					}

				}	


				$this->loadTemplate("register" , $data);
			}else{
				$data['naotempermissao'] = "NAO";
				$this->loadTemplate("home" , $data);
			}
		}


	}

?>