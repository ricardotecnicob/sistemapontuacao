<?php
	/**
	*  getGroupList
	*/
	class Permissions extends model{ 

		private $group;
		private $permissions;

		public function setGroup($id,$id_company){
			$this->group = $id;
			$this->permissions = array();

			$sql = $this->db->prepare("SELECT params FROM permission_groups WHERE id = :id AND id_company = :id_company ");
			$sql->bindValue(':id',$id);
			$sql->bindValue(':id_company',$id_company);
			$sql->execute();

			if($sql->rowCount() > 0){
				$row = $sql->fetch();

				if(empty($row['params'])){
					$row['params'] = '0';
				}

				$params = $row['params'];

				$sql = $this->db->prepare("SELECT name FROM permission_params WHERE id IN ($params) AND id_company = :id_company");
				$sql->bindValue(':id_company', $id_company);	
				$sql->execute();

				if($sql->rowCount() > 0){
					foreach ($sql->fetchAll() as $item) {
						$this->permissions[] = $item['name'];
					}
				}
			}	
		}

		public function hasPermission($name){
			if(in_array($name, $this->permissions)){
				return true;
			}else{
				return false;
			}
		}

		public function getList($id_company){
			$array = array();

				$sql = $this->db->prepare("SELECT * FROM permission_params WHERE id_company = :id_company AND area = :opt1 || area = :opt2 ");
				$sql->bindValue(':id_company', $id_company);
				$sql->bindValue(':opt1', 3);
				$sql->bindValue(':opt2', 2);
				$sql->execute();


				if($sql->rowCount() > 0){
					$array = $sql->fetchAll();
				}

			return $array;
		}

		public function getGroupList($id_company){
			$array = array();

				$sql = $this->db->prepare("SELECT * FROM permission_groups WHERE id_company = :id_company AND area = :opt1 ");
				$sql->bindValue(':id_company', $id_company);
				$sql->bindValue(':opt1', 2);
				$sql->execute();


				if($sql->rowCount() > 0){
					$array = $sql->fetchAll();
				}

			return $array;
		}

		public function getGroup($id,$id_company){
			$array = array();

				$sql = $this->db->prepare("SELECT * FROM permission_groups WHERE id = :id AND id_company = :id_company AND area = :opt2 ");
				$sql->bindValue(':id', $id);
				$sql->bindValue(':id_company', $id_company);
				$sql->bindValue(':opt2', 2);
				$sql->execute();


				if($sql->rowCount() > 0){
					$array = $sql->fetch();
					$array['params'] = explode(',', $array['params']);
				}

			return $array;
		}

		public function add($pname,$id_company,$descricion){
			$sql = $this->db->prepare("INSERT INTO permission_params SET name = :name, id_company = :id_company, area = :area, name_apresentar = :name_apresentar");
			$sql->bindValue(':name', $pname);
			$sql->bindValue(':id_company', $id_company);
			$sql->bindValue(':area', 2);
			$sql->bindValue(':name_apresentar', $descricion);
			$sql->execute();
		}

		public function addGroup($pname, $plist ,$id_company){
			$params = implode(',', $plist);
			$sql = $this->db->prepare("INSERT INTO permission_groups SET name = :name, id_company = :id_company, params = :params, area = :area ");
			$sql->bindValue(':name', $pname);
			$sql->bindValue(':id_company', $id_company);
			$sql->bindValue(':params', $params);
			$sql->bindValue(':area', 2);
			$sql->execute();
		}

		public function delete($id){
			$sql = $this->db->prepare("DELETE FROM permission_params WHERE id = :id ");
			$sql->bindValue(':id', $id);
			$sql->execute();
		}

		public function deleteGroup($id){
			$u = new Users();
			if($u->findUsersInGroup($id) == false){
				$sql = $this->db->prepare("DELETE FROM permission_groups WHERE id = :id ");
				$sql->bindValue(':id', $id);
				$sql->execute();
			}
		}

		public function editGroup($pname, $plist , $id, $id_company){
			$params = implode(',', $plist);
			$sql = $this->db->prepare("UPDATE permission_groups SET name = :name, id_company = :id_company, params = :params WHERE id = :id");
			$sql->bindValue(':name', $pname);
			$sql->bindValue(':id_company', $id_company);
			$sql->bindValue(':params', $params);
			$sql->bindValue(':id', $id);
			$sql->execute();
		}

	}

?>