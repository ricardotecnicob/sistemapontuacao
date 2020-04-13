<?php 
	class tablesController extends controller{
		
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
			$data['grupo'] = $u->getGroupUser();


			if($u->hasPermission('minhas_tabelas')){

				

				$this->loadTemplate("tables" , $data);
			}else{
				$data['naotempermissao'] = "NAO";
				$this->loadTemplate("home" , $data);
			}

		}

		public function info_table_pontos(){
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
			$data['grupo'] = $u->getGroupUser();


			if($u->hasPermission('minhas_tabelas')){

				$t = new Tables();

				if(isset($_POST['nameProd'])){
					$nameProd = addslashes($_POST['nameProd']);
					$valueProd = addslashes($_POST['valueProd']);

					$valueProd = explode(',', $valueProd);
					$valueProd = implode('.',$valueProd);

					$t->addProducts($nameProd,$valueProd);

					header("Location: ".BASE_URL."/painel/tables/info_table_pontos");

				}

				if(isset($_POST['nameProdE'])){
					$nameProdE = addslashes($_POST['nameProdE']);
					$valueProdE = addslashes($_POST['valueProdE']);
					$idE = addslashes($_POST['idE']);

					$valueProdE = explode(',', $valueProdE);
					$valueProdE = implode('.',$valueProdE);



					$t->editProducts($nameProdE,$valueProdE,$idE);

					header("Location: ".BASE_URL."/painel/tables/info_table_pontos");

				}


				$data['listProdu'] = $t->getListProd();

				$this->loadTemplate("tables_pontos" , $data);
			}else{
				$data['naotempermissao'] = "NAO";
				$this->loadTemplate("home" , $data);
			}

		}

		public function delitempontos($id){
			$data = array();
			$t = new Tables();

			$id = addslashes($id);

			$t->delitem($id);

			header("Location: ".BASE_URL."/painel/tables/info_table_pontos");
		}


	}

?>
