<?php 

	class permissionsController extends controller{
		
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
			$data['grupo'] = $u->getGroupUser();

			if($u->hasPermission('permissions_view')){

				
				$permissions = new Permissions();
				$data['permissions_list'] = $permissions->getList($u->getCompany());
				$data['permissions_group_list'] = $permissions->getGroupList($u->getCompany());

				$this->loadTemplate("permissions" , $data);
			}else{
				$data['naotempermissao'] = "NAO";
				$this->loadTemplate("home" , $data);
			}
		}
		
		public function add(){
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


			if($u->hasPermission('permissions_view')){
					$permissions = new Permissions();
				if(isset($_POST['name']) && !empty($_POST['name'])){
					$pname = addslashes($_POST['name']);
					$descricion = addslashes($_POST['descricion']);
					$permissions->add($pname, $u->getCompany(),$descricion);
					header("Location: ".BASE_URL."/painel/permissions");
				}

				$this->loadTemplate("permissions_add" , $data);
			}else{
				$data['naotempermissao'] = "NAO";
				$this->loadTemplate("home" , $data);
			}
		}

		public function add_group(){
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


			if($u->hasPermission('permissions_view')){
					$permissions = new Permissions();

				if(isset($_POST['name']) && !empty($_POST['name'])){
					$pname = addslashes($_POST['name']);
					$plist = $_POST['permissions'];

					$permissions->addGroup($pname, $plist ,$u->getCompany());
					header("Location: ".BASE_URL."/painel/permissions");
				}

				$data['permissions_list'] = $permissions->getList($u->getCompany());

				$this->loadTemplate("permissions_addgroup" , $data);
			}else{
				$data['naotempermissao'] = "NAO";
				$this->loadTemplate("home" , $data);
			}
		}

		public function delete($id){
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

			if($u->hasPermission('permissions_view')){
					$permissions = new Permissions();
					
					$permissions->delete($id);
					header("Location: ".BASE_URL."/painel/permissions");
			}else{
				$data['naotempermissao'] = "NAO";
				$this->loadTemplate("home" , $data);
			}
		}

		public function delete_group($id){
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

			if($u->hasPermission('permissions_view')){
					$permissions = new Permissions();
					
					$permissions->deleteGroup($id);
					header("Location: ".BASE_URL."/painel/permissions");
			}else{
				$data['naotempermissao'] = "NAO";
				$this->loadTemplate("home" , $data);
			}
		}

		public function edit_group($id){
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

			if($u->hasPermission('permissions_view')){
					$permissions = new Permissions();

				if(isset($_POST['name']) && !empty($_POST['name'])){
					$pname = addslashes($_POST['name']);
					$plist = $_POST['permissions'];

					$permissions->editGroup($pname, $plist , $id, $u->getCompany());
					header("Location: ".BASE_URL."/painel/permissions");
				}

				$data['permissions_list'] = $permissions->getList($u->getCompany());
				$data['group_info'] = $permissions->getGroup($id,$u->getCompany());



				$this->loadTemplate("permissions_editgroup" , $data);
			}else{
				$data['naotempermissao'] = "NAO";
				$this->loadTemplate("home" , $data);
			}
		}
	}

?>
