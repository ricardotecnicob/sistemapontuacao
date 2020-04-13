<?php 
	class ncardController extends controller{
		
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


			if($u->hasPermission('ncard_viwer')){
				$n = new Ncard();

				if(isset($_POST['nCardAntigo']) && !empty($_POST['nCardAntigo'])){
					$nCardAntigo = addslashes($_POST['nCardAntigo']);
					$nCardNovo = addslashes($_POST['nCardNovo']);
					$idPessoa = addslashes($_POST['idPessoa']);
					$senhaQuemAlterou = addslashes($_POST['senhaQuemAlterou']);

					$n->trocacard($nCardAntigo,$nCardNovo,$idPessoa,$senhaQuemAlterou);

					header("Location: ".BASE_URL."/painel/");
				}

				$this->loadTemplate("ncard" , $data);
			}else{
				header("Location: ".BASE_URL."/painel/");
			}

		}


	}

?>
