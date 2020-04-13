<?php
	class controller{
		protected $db;

		public function __construct() {
			global $config;
			$this->db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
		}

		
		public function loadView($viewName, $viewData = array()){
			extract($viewData);
			require 'views/'.$viewName.'.php';
		}	
		public function loadTemplate($viewName, $viewData = array()){

			$data = array();
			$menuPermissoes = array();
			$menuUsuarios = array();
			$minhasTabelas = array();

			$u = new Users();
			$u->setLoggedUser();
			$company = new Companies($u->getCompany());
			$data['company_name'] = $company->getName();
			$data['company_logo'] = $company->getLogo();
			$data['user_name']	= $u->getName();		
			$data['user_email']	= $u->getEmail();
			$data['user_imagem'] = $u->getImagem();	
			$data['sector'] = $u->getSector();

			if($u->hasPermission('permissions_view')){
				$menuPermissoes = 1;
			}else{
				$menuPermissoes = '';
			}

			if($u->hasPermission('ver_usuarios')){
				$menuUsuarios = 1;
			}else{
				$menuUsuarios = '';
			}

			if($u->hasPermission('editar_usuarios')){
				$menuPerfil = 1;
			}else{
				$menuPerfil = '';
			}

			if($u->hasPermission('ver_usuarios')){
				$menuUsuarios = 1;
			}else{
				$menuUsuarios = '';
			}

			if($u->hasPermission('minhas_tabelas')){
				$minhasTabelas = 1;
			}else{
				$minhasTabelas = '';
			}
			

			require 'views/template.php';	
		}
		public function loadInTemplate($viewName,$viewData = array()){
			extract($viewData);
			require 'views/'.$viewName.'.php';	
		}
		public function loadLibrary($lib){
			if(file_exists('libraries/'.$lib.'.php')){
				include 'libraries/'.$lib.'.php';
			}
		}
	}	


?>