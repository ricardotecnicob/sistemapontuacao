<?php
	class Users extends model { //analize
		
		private $userInfo;
		private $permissions;
		private $very;

		public function desbloquearConta($id){
			$sql = "UPDATE users SET lock_tela = :lock_tela WHERE id = :id ";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':lock_tela', 0);
			$sql->bindValue(':id', $id);
			$sql->execute();
		}
		
		public function isLogged($ip){
			
			if(isset($_SESSION['sistemadepontuacao']) && !empty($_SESSION['sistemadepontuacao'])){

				$array = array();

				$sql = $this->db->prepare("SELECT * FROM users WHERE area = :opt1  ");
				//$sql->bindValue(":ip", $ip);
				$sql->bindValue(':opt1', 2);
				
				$sql->execute();

				if($sql->rowCount() > 0){
					return true;
				}else{
					return false;
				}

			}else{
				return false;
			}
			
		}

		public function isLock($id,$ip){
			$array = array();

			$sql = $this->db->prepare("SELECT * FROM users WHERE id = :id ");
			$sql->bindValue(":id", $id);
			// $sql->bindValue(":ip", $ip);
			$sql->execute();

			if($sql->rowCount() > 0){
				$sql = $sql->fetch();	
				$array = $sql['lock_tela'];
			}

			return $array;
		}



		public function img_addlist($imageName){

			$array = array();

			$sql = "SELECT * FROM manipula_img_user WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id',1);
			$sql->execute();

			if($sql->rowCount() > 0){
				$sql = $sql->fetch();
				$array = $sql['imagem'];

				if(!empty($array)){
					unlink('../painel/assets/images/'.$array);
				}

			}

			$sql = "UPDATE manipula_img_user SET imagem = :imagem WHERE id = :id ";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':imagem', $imageName);
			$sql->bindValue(':id', 1);
			$sql->execute();

		}
		
		public function doLogin($email,$pass){

			$area = array();

			$sql = $this->db->prepare("SELECT * FROM users WHERE name = :name AND password = :password  ");
			$sql->bindValue(':name',$email);
			$sql->bindValue(':password',md5($pass));
			$sql->execute();
			
			if($sql->rowCount() > 0){
				$sql = $sql->fetch();
				$area = $sql['area'];
				$ip = $_SERVER['REMOTE_ADDR'];


				if($area == 2){
					$_SESSION['sistemadepontuacao'] = $sql['id'];
					$id = $_SESSION['sistemadepontuacao'];

					$sql = "UPDATE users SET ip = :ip WHERE id = :id ";
					$sql = $this->db->prepare($sql);
					$sql->bindValue(':id', $id);
					$sql->bindValue(':ip', $ip);
					$sql->execute();

					return true;
				}else{
					return false;
				}

			}else{
				return false;	
			}	
		}

		public function analize($email){
			$sql = $this->db->prepare("SELECT * FROM users WHERE name = :name ");
			$sql->bindValue(':name',$email);
			$sql->execute();

			if($sql->rowCount() > 0){
				$sql = $sql->fetch();
				$area = $sql['area'];

				if($area == 2){
					return true;
				}else{
					return false;
				}

				
			}else{
				return false;
			}

		}
		
		public function setLoggedUser(){
			if(isset($_SESSION['sistemadepontuacao']) && !empty($_SESSION['sistemadepontuacao'])){
				$id = $_SESSION['sistemadepontuacao'];
				
					$sql = $this->db->prepare("SELECT * FROM users WHERE id = :id ");
					$sql->bindValue(':id',$id);
					$sql->execute();
				
				if($sql->rowCount() > 0){
					$this->userInfo = $sql->fetch();	
					$this->permissions = new Permissions();
					$this->permissions->setGroup($this->userInfo['id_group'],$this->userInfo['id_company']);
				}
				
			}
		}


		public function unlock($email,$pass){
			$array = array();

			$sql = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password AND id = :id");
			$sql->bindValue(":email", $email);
			$sql->bindValue(":password", md5($pass));
			$sql->bindValue(":id", $_SESSION['sistemadepontuacao']);
			$sql->execute();

			if($sql->rowCount() > 0){
				$sql = $this->db->prepare("UPDATE users SET lock_tela = :lock_tela WHERE id = :id");	
				$sql->bindValue(":lock_tela", 0);
				$sql->bindValue(":id", $_SESSION['sistemadepontuacao']);
				$sql->execute();
				return true;
			}else{
				return false;
			}

		}

		public function logout(){
			unset($_SESSION['sistemadepontuacao']);
		}

		public function changeUser($email,$pass){

			$array = array();
			$sql = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password ");
			$sql->bindValue(':email',$email);
			$sql->bindValue(':password',md5($pass));
			$sql->execute();
			
			if($sql->rowCount() > 0){
				unset($_SESSION['sistemadepontuacao']);

				$sql = $sql->fetch();	
				$_SESSION['sistemadepontuacao'] = $sql['id'];
				
				$array = true;
				
			}else{
				$array = false;	
			}


			return $array;

		}
		
		public function hasPermission($name){
			return $this->permissions->hasPermission($name);
		}

		public function getCompany(){
			if(isset($this->userInfo['id_company'])){
				return $this->userInfo['id_company'];
			}else{
				return 0;
			}
		}

		public function getGroupUser(){
			if(isset($this->userInfo['id_group'])){
				return $this->userInfo['id_group'];
			}else{
				return 0;
			}
		}

		

		public function getName(){
			if(isset($this->userInfo['name'])){
				return $this->userInfo['name'];
			}else{
				return '';
			}
		}

		public function getEmail(){
			if(isset($this->userInfo['email'])){
				return $this->userInfo['email'];
			}else{
				return '';
			}
		}

		public function getImagem(){
			if(isset($this->userInfo['imagem'])){
				return $this->userInfo['imagem'];
			}else{
				return '';
			}
		}

		public function getId(){
			if(isset($this->userInfo['id'])){
				return $this->userInfo['id'];
			}else{
				return '';
			}
		}

		public function getSector(){
			if(isset($this->userInfo['sector'])){
				return $this->userInfo['sector'];
			}else{
				return '';
			}
		}

		public function getCodePesonReseller(){
			if(isset($this->userInfo['codi_reseller'])){
				return $this->userInfo['codi_reseller'];
			}else{
				return '';
			}
		}

		

		public function veryIdBlock($id,$id_company){
			$sql = $this->db->prepare("SELECT id FROM users WHERE id = :id AND id_company = :id_company");
			$sql->bindValue(":id", $id);
			$sql->bindValue(":id_company", $id_company);
			$sql->execute();

			if($sql->rowCount() > 0){

				$sql = $this->db->prepare("UPDATE users SET lock_tela = :lock_tela WHERE id = :id AND id_company = :id_company");
				$sql->bindValue(":lock_tela",1);
				$sql->bindValue(":id", $id);
				$sql->bindValue(":id_company", $id_company);
				$sql->execute();

				return true;
			}else{
				return false;
			}

		}

		public function getInfo($id, $id_company){
			$array = array();

			$sql = $this->db->prepare("SELECT * FROM users WHERE id = :id AND id_company = :id_company  ");
			$sql->bindValue(':id', $id);
			$sql->bindValue(':id_company', $id_company);
			$sql->execute();
			
			if($sql->rowCount() > 0){
				$array = $sql->fetch();
			}

			return $array;
		}

		public function getInfoGeral($id_company){
			$array = array();

			$sql = $this->db->prepare("SELECT * FROM users WHERE id_company = :id_company AND area = :opt1  ");
			$sql->bindValue(':id_company', $id_company);
			$sql->bindValue(':opt1',3);
			$sql->bindValue(':opt2',2);
			$sql->execute();
			
			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}

			return $array;
		}


		public function findUsersInGroup($id){
			$sql = $this->db->prepare("SELECT COUNT(*) as c FROM users WHERE id_group = :group");
			$sql->bindValue(':group', $id);
			$sql->execute();
			$row = $sql->fetch();

			if($row['c'] == 0){
				return false;
			}else{
				return true;
			}

		}	

		public function getList($id_company){
			$array = array();

			$sql = $this->db->prepare("	
				SELECT 
					users.id, 
					users.area, 
					users.name as namee,
					users.email, 
					permission_groups.name,
					users.id_group
				FROM  users 
				LEFT JOIN permission_groups ON permission_groups.id = users.id_group
				WHERE users.id_company = :id_company AND users.area = :opt1");

			$sql->bindValue(':id_company',$id_company);
			$sql->bindValue(':opt1', 2);
			
			$sql->execute();
			
			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();	
			}

			return $array;
		}


		//adicionar sempre que tiver um novo caixa
		public function add($name,$email,$passEmMd5,$group,$id_company,$funcao){
			
			$sql = $this->db->prepare("SELECT COUNT(*) as c FROM users WHERE name = :name");
			$sql->bindValue(':name', $name);
			$sql->execute();
			$row = $sql->fetch();



			if($row['c'] == 0){
				$sql = $this->db->prepare("INSERT INTO users SET id_company = :id_company, name = :name, email = :email, password = :password, password_pontuar = :password_pontuar,  id_group = :id_group, sector = :sector, area = :area ");
				$sql->bindValue(':id_company', $id_company);
				$sql->bindValue(':name', $name);
				$sql->bindValue(':email', $email);

				// else if($group == 15){
				// 	$sql->bindValue(':password', $passEmMd5);
				// 	$sql->bindValue(':password_pontuar', $passEmMd5);
				// }else if($group == 16){
				// 	$sql->bindValue(':password', $passEmMd5);
				// 	$sql->bindValue(':password_pontuar', $passEmMd5);
				// }

				if($group == 2){
					$sql->bindValue(':password', $passEmMd5);
					$sql->bindValue(':password_pontuar', $passEmMd5);
				}else if($group == 13){
					$sql->bindValue(':password', $passEmMd5);
					$sql->bindValue(':password_pontuar', $passEmMd5);
				}else if($group == 14){
					$sql->bindValue(':password', $passEmMd5);
					$sql->bindValue(':password_pontuar', $passEmMd5);
				}else if($group == 19){
					$sql->bindValue(':password', $passEmMd5);
					$sql->bindValue(':password_pontuar', $passEmMd5);
				}else{
					$sql->bindValue(':password', '');
					$sql->bindValue(':password_pontuar', $passEmMd5);
				}

				$sql->bindValue(':id_group', $group);
				$sql->bindValue(':sector', $funcao);
				$sql->bindValue(':area', 2);
				$sql->execute();

				return '1';
			}else{
				return '0';
			}
			
		}

		public function edit($name,$pass,$group,$id,$id_company,$funcao){

			$sql = $this->db->prepare("UPDATE users SET name = :name, id_group = :id_group, sector = :sector  WHERE id = :id AND id_company = :id_company");
			$sql->bindValue(':id', $id);
			$sql->bindValue(':id_company', $id_company);
			$sql->bindValue(':id_group', $group);
			$sql->bindValue(':sector', $funcao);
			$sql->bindValue(':name', $name);
			$sql->execute();

			if(!empty($pass)){
				$passEmMd5 = md5($pass);
				$sql = $this->db->prepare("UPDATE users SET  password = :password, password_pontuar = :password_pontuar  WHERE id = :id AND id_company = :id_company");
				$sql->bindValue(':id', $id);
				$sql->bindValue(':id_company', $id_company);

				// else if($group == 15){
				// 	$sql->bindValue(':password', $passEmMd5);
				// 	$sql->bindValue(':password_pontuar', $passEmMd5);
				// }else if($group == 16){
				// 	$sql->bindValue(':password', $passEmMd5);
				// 	$sql->bindValue(':password_pontuar', $passEmMd5);
				// }

				if($group == 2){
					$sql->bindValue(':password', $passEmMd5);
					$sql->bindValue(':password_pontuar', $passEmMd5);
				}else if($group == 13){
					$sql->bindValue(':password', $passEmMd5);
					$sql->bindValue(':password_pontuar', $passEmMd5);
				}else if($group == 14){
					$sql->bindValue(':password', $passEmMd5);
					$sql->bindValue(':password_pontuar', $passEmMd5);
				}else if($group == 19){
					$sql->bindValue(':password', $passEmMd5);
					$sql->bindValue(':password_pontuar', $passEmMd5);
				}else{
					$sql->bindValue(':password', '');
					$sql->bindValue(':password_pontuar', $passEmMd5);
				}
				
				$sql->execute();
			}

		}

		public function delete($id, $id_company){
			$sql = $this->db->prepare("DELETE FROM users WHERE id = :id AND id_company = :id_company");
			$sql->bindValue(':id', $id);
			$sql->bindValue(':id_company', $id_company);
			$sql->execute();
		}

		public function dataPerson(){
			return $this->userInfo;
		}

		public function editName($nameNew,$id_company,$id){
			$array = array();
			$array2 = array();

			$sql = "SELECT * FROM manipula_img_user";
			$sql = $this->db->prepare($sql);
			$sql->execute();

			if($sql->rowCount() > 0){
				$sql = $sql->fetch();
				$array = $sql['imagem'];
			}

			if(empty($array)){
				$sql = $this->db->prepare("UPDATE users SET name = :name  WHERE id = :id AND id_company = :id_company");
				$sql->bindValue(':id', $id);
				$sql->bindValue(':id_company', $id_company);
				$sql->bindValue(':name', $nameNew);
				$sql->execute();
			}else{


				$sql = "SELECT * FROM users WHERE id = :id";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id',$id);
				$sql->execute();

				if($sql->rowCount() > 0){
					$sql = $sql->fetch();
					$array2 = $sql['imagem'];

					if(!empty($array2)){
						unlink('../painel/assets/images/'.$array2);
					}

				}


				$sql = $this->db->prepare("UPDATE users SET name = :name, imagem = :imagem WHERE id = :id AND id_company = :id_company");
				$sql->bindValue(':id', $id);
				$sql->bindValue(':id_company', $id_company);
				$sql->bindValue(':name', $nameNew);
				$sql->bindValue(':imagem',$array);
				$sql->execute();

				$sql = $this->db->prepare("UPDATE manipula_img_user SET imagem = :imagem WHERE id = :id ");
				$sql->bindValue(':id', 1);
				$sql->bindValue(':imagem', '');
				$sql->execute();

			}
			
		}

		public function alterarPass($pass01,$id_company,$id){

			$array = array();
			$array2 = array();

			$sql = "SELECT * FROM manipula_img_user";
			$sql = $this->db->prepare($sql);
			$sql->execute();

			if($sql->rowCount() > 0){
				$sql = $sql->fetch();
				$array = $sql['imagem'];
			}

			if(empty($array)){
				$sql = $this->db->prepare("UPDATE users SET password = :password, password_pontuar = :password_pontuar  WHERE id = :id AND id_company = :id_company");
				$sql->bindValue(':id', $id);
				$sql->bindValue(':id_company', $id_company);
				$sql->bindValue(':password', md5($pass01));
				$sql->bindValue(':password_pontuar', md5($pass01));
				$sql->execute();
			}else{


				$sql = "SELECT * FROM users WHERE id = :id";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id',$id);
				$sql->execute();

				if($sql->rowCount() > 0){
					$sql = $sql->fetch();
					$array2 = $sql['imagem'];

					if(!empty($array2)){
						unlink('../painel/assets/images/'.$array2);
					}

				}


				$sql = $this->db->prepare("UPDATE users SET password = :password, password_pontuar = :password_pontuar imagem = :imagem  WHERE id = :id AND id_company = :id_company");
				$sql->bindValue(':id', $id);
				$sql->bindValue(':id_company', $id_company);
				$sql->bindValue(':password', md5($pass01));
				$sql->bindValue(':password_pontuar', md5($pass01));
				$sql->bindValue(':imagem',$array);
				$sql->execute();

				$sql = $this->db->prepare("UPDATE manipula_img_user SET imagem = :imagem WHERE id = :id ");
				$sql->bindValue(':id', 1);
				$sql->bindValue(':imagem', '');
				$sql->execute();

			}

		}



		public function userBloqueadoLogin($email){
			$sql = $this->db->prepare("SELECT email FROM users  WHERE email = :email ");
				$sql->bindValue(':email', $email);
				$sql->execute();

			if($sql->rowCount() > 0){
				$sql = $this->db->prepare("UPDATE users SET  user_lock = :user_lock  WHERE email = :email");
					$sql->bindValue(':user_lock', 1);
					$sql->bindValue(':email', $email);
					$sql->execute();
			}else{
				unset($_SESSION['sistemadepontuacao']);
			}
		}

		public function veryemail($email){
			$sql = $this->db->prepare("SELECT email FROM users WHERE email = :email ");
			$sql->bindValue(":email", $email);
			$sql->execute();

			if($sql->rowCount() > 0){
				return true;
			}else{
				return false;
			}

		}

		public function salveCodeUser($email,$code){
			$u = new Users();
			if($u->veryemail($email) == true){
				$sql = $this->db->prepare("UPDATE users SET code_pass = :code_pass WHERE email = :email");
				$sql->bindValue(":email", $email);
				$sql->bindValue(":code_pass", $code);
				$sql->execute();
			}
		}

		public function veryCodCerto($cod){

			$sql = "SELECT * FROM users WHERE code_pass = :code_pass ";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':code_pass',$cod);
			$sql->execute();

			if($sql->rowCount() > 0){
				return true;
			}else{
				return false;
			}

		}

		public function desativarCode($cod){
			$array = array(); 

			$sql = "SELECT * FROM users WHERE code_pass = :code_pass ";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':code_pass',$cod);
			$sql->execute();

			if($sql->rowCount() > 0){
				$sql = $sql->fetch();
				$array = $sql['id'];
			}

			$sql = $this->db->prepare("UPDATE users SET code_pass = :code_pass WHERE id = :id ");
			$sql->bindValue(':id',$array);
			$sql->bindValue(':code_pass','');
			$sql->execute();

			return $array;
		}

		public function limparCode($email){
			$array = array(); 

			$sql = "SELECT * FROM users WHERE email = :email ";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':email',$email);
			$sql->execute();

			if($sql->rowCount() > 0){
				$sql = $sql->fetch();
				$array = $sql['id'];
			}

			$sql = $this->db->prepare("UPDATE users SET code_pass = :code_pass WHERE id = :id");
			$sql->bindValue(':id',$array);
			$sql->bindValue(':code_pass','');
			$sql->execute();

			return $array;
		}

		public function verifikId($id){

			$array = array(); 

			$sql = "SELECT * FROM users WHERE id = :id ";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id',$id);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = $sql->fetch();

				return true;
			}else{
				return false;
			}

		}

		public function recuperarSenha($id,$password1){

			$sql = $this->db->prepare("UPDATE users SET password = :password WHERE id = :id");
			$sql->bindValue(':id',$id);
			$sql->bindValue(':password',md5($password1));
			$sql->execute();

			$array = array(); 

			$sql = "SELECT * FROM users WHERE id = :id ";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id',$id);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = $sql->fetch();
			}

			return $array;


		}
		
	}/// FIM MODEL 

?>