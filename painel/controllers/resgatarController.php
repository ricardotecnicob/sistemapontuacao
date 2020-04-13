<?php 
	class resgatarController extends controller{
		
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


			if($u->hasPermission('resgatar_viwer')){
				$resgatar = new Resgatar();


				$this->loadTemplate("resgatar" , $data);
			}else{
				header("Location: ".BASE_URL."/painel/resgatar/listapremios");
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
			$data['grupo'] = $u->getGroupUser();


			if($u->hasPermission('resgatar_add')){
				$resgatar = new Resgatar();

				if(isset($_POST['name']) && !empty($_POST['name']) && $_FILES['imagempremio']['tmp_name']){
					$image = $_FILES['imagempremio'];
					$name = addslashes($_POST['name']);
					$quantestoque = addslashes($_POST['quantestoque']);
					$pontos = addslashes($_POST['pontos']);
					$busca = ",";

					if(strstr($pontos, $busca) == TRUE){
						$pontos = str_replace(",", ".", $pontos);
					}


						//TRATAMENTO IMAGEM PRINCIPAL
						$filename1 = $image['tmp_name'];


						$largura1 = 100;// Maxíma
						$altura1 = 100;// Maxíma
						
						//TAMANHO ORIGINAL DA IMAGEM
						list($largura1Original, $altura1Original) = getimagesize($filename1);

						$ratio1 = $largura1Original / $altura1Original;

						//ALTURA DA IMAGEM 200px LARGURA VAI SER PROPOCIONAL 
						$largura1 = $altura1 * $ratio1;

						$image100_final1 = imagecreatetruecolor($largura1,$altura1);//criar uma imagem com essa altura e essa largura
						if($image['type'] == 'image/jpeg'){
							$imagem_original1 = imagecreatefromjpeg($filename1);
						}else if($image['type'] == 'image/png'){
							$imagem_original1 = imagecreatefrompng($filename1);
						}else if($image['type'] == 'image/gif'){
							$imagem_original1 = imagecreatefromgif($filename1);
						}

						imagecopyresampled($image100_final1, $imagem_original1, 0, 0, 0, 0, $largura1, $altura1, $largura1Original, $altura1Original); 

						if($image['type'] == 'image/jpeg'){
							$nameImg100x100 = "min_100x100".md5(rand(0,999).time().rand(0,999)).".jpg";//mandando image 200px
							imagejpeg($image100_final1, "assets/images/".$nameImg100x100);
						}else if($image['type'] == 'image/png'){
							$nameImg100x100 = "min_100x100".md5(rand(0,999).time().rand(0,999)).".png";//mandando image 200px
							imagepng($image100_final1, "assets/images/".$nameImg100x100);
						}else if($image['type'] == 'image/gif'){
							$nameImg100x100 = "min_100x100".md5(rand(0,999).time().rand(0,999)).".gif";//mandando image 200px
							imagegif($image100_final1, "assets/images/".$nameImg100x100);
						}


						$resgatar->add($nameImg100x100,$name,$quantestoque,$pontos);

						header("Location: ".BASE_URL."/painel/resgatar/listapremios");

				}
				

				$this->loadTemplate("resgatar_add" , $data);
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
			$data['grupo'] = $u->getGroupUser();


			if($u->hasPermission('resgatar_edit')){
				$resgatar = new Resgatar();

				$id = addslashes($id);

			if($resgatar->veryIdPremio($id) == true){

					if(isset($_POST['name']) && !empty($_POST['name'])){
						$image = $_FILES['imagempremio'];
						$name = addslashes($_POST['name']);
						$quantestoque = addslashes($_POST['quantestoque']);
						$pontos = addslashes($_POST['pontos']);
						$busca = ",";

						if(strstr($pontos, $busca) == TRUE){
							$pontos = str_replace(",", ".", $pontos);
						}

						$resgatar->editPremio01($name,$quantestoque,$pontos,$id);

						if(isset($_FILES['imagempremio']) && !empty($_FILES['imagempremio']['tmp_name'])){

							//TRATAMENTO IMAGEM PRINCIPAL
							$filename1 = $image['tmp_name'];


							$largura1 = 200;// Maxíma
							$altura1 = 200;// Maxíma
							
							//TAMANHO ORIGINAL DA IMAGEM
							list($largura1Original, $altura1Original) = getimagesize($filename1);

							$ratio1 = $largura1Original / $altura1Original;

							//ALTURA DA IMAGEM 200px LARGURA VAI SER PROPOCIONAL 
							$largura1 = $altura1 * $ratio1;

							$image100_final1 = imagecreatetruecolor($largura1,$altura1);//criar uma imagem com essa altura e essa largura
							if($image['type'] == 'image/jpeg'){
								$imagem_original1 = imagecreatefromjpeg($filename1);
							}else if($image['type'] == 'image/png'){
								$imagem_original1 = imagecreatefrompng($filename1);
							}else if($image['type'] == 'image/gif'){
								$imagem_original1 = imagecreatefromgif($filename1);
							}

							imagecopyresampled($image100_final1, $imagem_original1, 0, 0, 0, 0, $largura1, $altura1, $largura1Original, $altura1Original); 

							if($image['type'] == 'image/jpeg'){
								$nameImg100x100 = "min_100x100".md5(rand(0,999).time().rand(0,999)).".jpg";//mandando image 200px
								imagejpeg($image100_final1, "assets/images/".$nameImg100x100);
							}else if($image['type'] == 'image/png'){
								$nameImg100x100 = "min_100x100".md5(rand(0,999).time().rand(0,999)).".png";//mandando image 200px
								imagepng($image100_final1, "assets/images/".$nameImg100x100);
							}else if($image['type'] == 'image/gif'){
								$nameImg100x100 = "min_100x100".md5(rand(0,999).time().rand(0,999)).".gif";//mandando image 200px
								imagegif($image100_final1, "assets/images/".$nameImg100x100);
							}

							$resgatar->editPremio02($nameImg100x100,$id);

						}
						
						header("Location: ".BASE_URL."/painel/resgatar/edit/".$id);

					}


					$data['infopremio'] = $resgatar->getInfoId($id);
					

					$this->loadTemplate("resgatar_edit" , $data);

				}else{
					header("Location: ".BASE_URL."/painel/resgatar/listapremios");
				}
				
			}else{
				$data['naotempermissao'] = "NAO";
				$this->loadTemplate("home" , $data);
			}
		}



		public function del($id){
			$resgatar = new Resgatar();
			$id = addslashes($id);

			if(!empty($id)){
				$resgatar->delPremio($id);
			}

			header("Location: ".BASE_URL."/painel/resgatar/listapremios");
		}


		public function listapremios(){
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


			if($u->hasPermission('resgatar_list')){
				$resgatar = new Resgatar();
				

				$data['lista_premios'] = $resgatar->getInfo();

				$this->loadTemplate("resgatar_lista" , $data);
			}else{
				$data['naotempermissao'] = "NAO";
				$this->loadTemplate("home" , $data);
			}
		}


	}

?>
