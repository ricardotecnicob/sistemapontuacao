<?php
	
	/**
	 * 
	 */
	class Clients extends model{

		public function getClients(){
			$array = array();

				$sql = "SELECT * FROM clients ";
				$sql = $this->db->prepare($sql);
				$sql->execute();	

				if($sql->rowCount() > 0){
					$array = $sql->fetchAll();
				}

			return $array;	
		}

		public function getClientsId($id){
			$array = array();

				$sql = "SELECT * FROM clients WHERE id = :id";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id',$id);
				$sql->execute();	

				if($sql->rowCount() > 0){
					$array = $sql->fetch();
				}

			return $array;	
		}

		public function numerodepontos($cpfoucard){
			$array = array();

				$sql = "SELECT * FROM clients ";

				if(strlen($cpfoucard) == 14){
					$sql .= " WHERE cpf = :cpf";
				}else{
					$sql .= " WHERE codigo_cartao = :codigo_cartao";
				}

				$sql = $this->db->prepare($sql);

				if(strlen($cpfoucard) == 14){
					$sql->bindValue(':cpf',$cpfoucard);
				}else{
					$sql->bindValue(':codigo_cartao',$cpfoucard);
				}	
				
				$sql->execute();	

				if($sql->rowCount() > 0){
					$array = $sql->fetch();
				}

			return $array;	
		}

		public function getClientsBusca($buscar){
			$array = array();	

				$sql = "SELECT * FROM clients WHERE nome LIKE :nome || cpf LIKE :cpf || codigo_cartao LIKE :codigo_cartao";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':nome','%'.$buscar.'%');
				$sql->bindValue(':cpf','%'.$buscar.'%');
				$sql->bindValue(':codigo_cartao','%'.$buscar.'%');
				$sql->execute();	

				if($sql->rowCount() > 0){
					$array = $sql->fetch();
				}

			return $array;	
		}

		public function getClientsBusca2($buscar){
			$array = array();	

				$sql = "SELECT * FROM clients ";
				$sql = $this->db->prepare($sql);
				$sql->execute();	

				if($sql->rowCount() > 0){
					$array = $sql->fetchAll();
				}

			return $array;	
		}
		
		public function getCidades1($state){
			$array = array();

				$sql = "SELECT * FROM cidades WHERE flg_estado = :flg_estado ";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':flg_estado',$state);
				$sql->execute();	

				if($sql->rowCount() > 0){
					$array = $sql->fetchAll();
				}

			return $array;	

		}

		public function addClient($init_cartao,$n_cartao,$cpf,$name,$cell01,$phone01,$cep,$address,$number_address,$neighb_address,$address2,$state_address,$city_address,$obs,$pontos ,$ultimo_user_pontuar,$idUserQueCadastrou,$data_nasc){

			$array = array();

			$sql = "SELECT * FROM clients WHERE cpf = :cpf ";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':cpf',$cpf);
				$sql->execute();

			if($sql->rowCount() > 0){
				return false;
			}else{
				$sql = "INSERT INTO clients (nome, cpf, codigo_cartao, seis_ultimos_codigos, pontos, ultimo_user_pontuar, cel, phone, cep, address, number_address, bairro, address2, state, city, obs, user_cadastrou, data_nasc) VALUES (:nome, :cpf, :codigo_cartao, :seis_ultimos_codigos, :pontos, :ultimo_user_pontuar, :cel, :phone, :cep, :address, :number_address, :bairro, :address2, :state, :city, :obs, :user_cadastrou, :data_nasc) ";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':nome',$name);
				$sql->bindValue(':cpf',$cpf);
				$sql->bindValue(':codigo_cartao',$init_cartao.$n_cartao);
				$sql->bindValue(':seis_ultimos_codigos',$n_cartao);
				$sql->bindValue(':pontos',$pontos);
				$sql->bindValue(':ultimo_user_pontuar',$ultimo_user_pontuar);
				$sql->bindValue(':cel',$cell01);
				$sql->bindValue(':phone',$phone01);
				$sql->bindValue(':cep',$cep);
				$sql->bindValue(':address',$address);
				$sql->bindValue(':number_address',$number_address);
				$sql->bindValue(':bairro',$neighb_address);
				$sql->bindValue(':address2',$address2);
				$sql->bindValue(':state',$state_address);
				$sql->bindValue(':city',$city_address);
				$sql->bindValue(':obs',$obs);
				$sql->bindValue(':user_cadastrou',$idUserQueCadastrou);
				$sql->bindValue(':data_nasc',$data_nasc);
				$sql->execute();	
				return true;
			}
			
		}

		public function editClient($init_cartao,$n_cartao,$cpf,$name,$cell01,$phone01,$cep,$address,$number_address,$neighb_address,$address2,$state_address,$city_address,$obs,$idClient,$data_nasc,$idUserQuemEditou){

				$sql = "UPDATE clients SET nome = :nome, cpf = :cpf, codigo_cartao = :codigo_cartao, seis_ultimos_codigos = :seis_ultimos_codigos, cel = :cel, phone = :phone, cep = :cep, address = :address, number_address = :number_address, bairro = :bairro, address2 = :address2, state = :state, city = :city, obs = :obs, data_nasc = :data_nasc, ultimo_editou = :ultimo_editou WHERE id = :id";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':nome',$name);
				$sql->bindValue(':cpf',$cpf);
				$sql->bindValue(':codigo_cartao',$init_cartao.$n_cartao);
				$sql->bindValue(':seis_ultimos_codigos',$n_cartao);
				$sql->bindValue(':cel',$cell01);
				$sql->bindValue(':phone',$phone01);
				$sql->bindValue(':cep',$cep);
				$sql->bindValue(':address',$address);
				$sql->bindValue(':number_address',$number_address);
				$sql->bindValue(':bairro',$neighb_address);
				$sql->bindValue(':address2',$address2);
				$sql->bindValue(':state',$state_address);
				$sql->bindValue(':city',$city_address);
				$sql->bindValue(':obs',$obs);
				$sql->bindValue(':id',$idClient);
				$sql->bindValue(':data_nasc',$data_nasc);
				$sql->bindValue(':ultimo_editou',$idUserQuemEditou);
				$sql->execute();	


				$sql = "INSERT INTO clients_editou SET id_quemeditou = :id_quemeditou, id_qualuser = :id_qualuser, data_hora = NOW() ";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id_quemeditou', $idUserQuemEditou);
				$sql->bindValue(':id_qualuser', $idClient);
				$sql->execute();	

				
				return true;

		}

		public function delClients($id){
			$sql = "DELETE FROM clients WHERE id = :id ";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id',$id);
			$sql->execute();
		}


	}

?>