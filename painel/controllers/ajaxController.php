<?php 
	class ajaxController extends controller{//confirmesenha
		
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

		}

		public function listClients(){
			$data = array(); 

		      $cli = new Clients();

		      if(isset($_POST['buscar']) && !empty($_POST['buscar'])){
		        $buscar = addslashes($_POST['buscar']);

		        $data = $cli->getClientsBusca($buscar);

		      }

		      echo json_encode($data);
		}

		public function listClients2(){
			$data = array(); 

		      $cli = new Clients();

		      if(isset($_POST['buscar']) && !empty($_POST['buscar'])){
		        $buscar = addslashes($_POST['buscar']);

		        $data = $cli->getClientsBusca2($buscar);

		      }

		      echo json_encode($data);
		}

		public function cidade1(){
		      $data = array(); 

		      $cli = new Clients();

		      if(isset($_POST['state']) && !empty($_POST['state'])){
		        $state = addslashes($_POST['state']);

		        $data = $cli->getCidades1($state);

		      }

		      echo json_encode($data);
		}

		public function infopontuacao(){
			$data = array();

			$s = new Stitches();

			if(isset($_POST['dadoinfo1'])){
				$info = addslashes($_POST['dadoinfo1']);

				$data = $s->getInfo1($info);

			}

			if(isset($_POST['dadoinfo2'])){
				$info = addslashes($_POST['dadoinfo2']);

				$data = $s->getInfo2($info);

			}

			if(isset($_POST['dadoinfo3'])){
				$info = addslashes($_POST['dadoinfo3']);

				$data = $s->getInfo3($info);

			}

			echo json_encode($data);

		}

		public function confirmesenha(){
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
			$data['ID_GROUP_ON'] = $u->getGroupUser();

			$s = new Stitches();

			if(isset($_POST['senha']) && !empty($_POST['senha'])){
				$senha = addslashes($_POST['senha']);
				$cpf = addslashes($_POST['cpf']);
				$coo = addslashes($_POST['coo']);
				$ativo = addslashes($_POST['ativo']);
				$ativo2 = addslashes($_POST['ativo2']);
				$ativo3 = addslashes($_POST['ativo3']);
				$qntLitro = addslashes($_POST['qntLitro']);
				$qntLitro2 = addslashes($_POST['qntLitro2']);
				$qntLitro3 = addslashes($_POST['qntLitro3']);
				$redificacao = addslashes($_POST['redificacao']);
				$busca = ",";

				if(strstr($qntLitro, $busca) == TRUE){
					$qntLitro = str_replace(",", ".", $qntLitro);
				}

				if(strstr($qntLitro2, $busca) == TRUE){
					$qntLitro2 = str_replace(",", ".", $qntLitro2);
				}

				if(strstr($qntLitro3, $busca) == TRUE){
					$qntLitro3 = str_replace(",", ".", $qntLitro3);
				}

				$tamanho = strlen($qntLitro);

				if($tamanho == 2 || $tamanho == 1){
					$qntLitro = $qntLitro.'.000'; 
				}


				$tamanho2 = strlen($qntLitro2);

				if($tamanho2 == 2 || $tamanho2 == 1){
					$qntLitro2 = $qntLitro2.'.000'; 
				}

				$tamanho3 = strlen($qntLitro3);

				if($tamanho3 == 2 || $tamanho3 == 1){
					$qntLitro3 = $qntLitro3.'.000'; 
				}


				$data = $s->confereSenha($senha,$cpf,$coo,$ativo,$ativo2,$ativo3,$qntLitro,$qntLitro2,$qntLitro3,$redificacao,$data['ID_GROUP_ON']);

				if($data == true){
					$data = 1;
				}else{
					$data = 2;
				}

			}

			echo json_encode($data);
		}




		public function confirmesenhaRegister(){
			$data = array();
			$s = new Stitches();

			if(isset($_POST['senha']) && !empty($_POST['senha'])){
				$senha = addslashes($_POST['senha']);

				$res = $s->confereSenhaRegister($senha);

				if(!empty($res)){
					$data = $res;
				}else{
					$data = 2;
				}

			}

			echo json_encode($data);

		}

		public function pontos(){
			$data = array();

			$s = new Stitches();

			if(isset($_POST['cpf']) && !empty($_POST['cpf'])){
				$cpf = addslashes($_POST['cpf']);

				$data = $s->conferePontos($cpf);


			}

			echo json_encode($data);
		}


		public function cooConfere(){
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
			$data['ID_GROUP_ON'] = $u->getGroupUser();

			$s = new Stitches();

			if(isset($_POST['value']) && !empty($_POST['value'])){
				$value = addslashes($_POST['value']);

				$data = $s->confereCoo($value,$data['ID_GROUP_ON']);

			}

			echo json_encode($data);
		}


		public function conferecad(){
			$data = array();

			$s = new Stitches();

			if(isset($_POST['card']) && !empty($_POST['card'])){
				$card = addslashes($_POST['card']);

				$data = $s->confereCard($card);


			}

			echo json_encode($data);
		}


		public function pegardadospremios(){
			$data = array();

			$r = new Resgatar();

			if(isset($_POST['id']) && !empty($_POST['id'])){
				$id = addslashes($_POST['id']);

				$data = $r->getInfoId($id);


			}

			echo json_encode($data);
		}


		public function confirmesenhaModal(){
			$data = array();

			$r = new Resgatar();

			if(isset($_POST['senha']) && !empty($_POST['senha'])){
				$senha = addslashes($_POST['senha']);
				$pontos = addslashes($_POST['pontos']);
				$cpf = addslashes($_POST['cpf']);
				$quantidade = addslashes($_POST['quantidade']);
				$idPremio = addslashes($_POST['idPremio']);

				$busca = ",";

				if(strstr($pontos, $busca) == TRUE){
					$pontos = str_replace(",", ".", $pontos);
				}

				$data = $r->confereSenhaPremio($senha,$pontos,$cpf,$quantidade,$idPremio);

				if($data == 2){
					$data = 2;
				}else if(strlen($data) == 4){
					$data = $data;
				}else if($data == 4){
					$data = 4;
				}

			}

			echo json_encode($data);
		}

		public function quantipontos(){
			$data = array();

			$cli = new Clients();

			if(isset($_POST['cpf'])  ){//
				$cpfoucard = addslashes($_POST['cpf']);

				$data = $cli->numerodepontos($cpfoucard);

			}

			echo json_encode($data);
		}


	}//FIM

?>