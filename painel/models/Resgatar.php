<?php
	/**
	*  
	*/

	date_default_timezone_set("America/Sao_Paulo"); 
	setlocale(LC_ALL, 'pt_BR');

	class Resgatar extends model{ 

		public function getInfo(){
			$array = array();

			$sql = "SELECT * FROM premios ";
			$sql = $this->db->prepare($sql);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}

			return $array;
		}

		public function getInfoId($id){
			$array = array();

			$sql = "SELECT * FROM premios WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = $sql->fetch();
			}

			return $array;
		}

		public function veryIdPremio($id){
			$array = array();

			$sql = "SELECT * FROM premios WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = true;
			}else{
				$array = false;
			}

			return $array;
		}

		public function add($nameImg100x100,$name,$quantestoque,$pontos){
			$sql = $this->db->prepare("INSERT INTO premios SET imagem = :imagem, name = :name, quantidade = :quantidade, quantos_pontos = :quantos_pontos");
			$sql->bindValue(':imagem', $nameImg100x100);
			$sql->bindValue(':name', $name);
			$sql->bindValue(':quantidade', $quantestoque);
			$sql->bindValue(':quantos_pontos', $pontos);
			$sql->execute();
		}

		public function editPremio01($name,$quantestoque,$pontos,$id){
			$sql = $this->db->prepare("UPDATE premios SET name = :name, quantidade = :quantidade, quantos_pontos = :quantos_pontos WHERE id = :id ");
			$sql->bindValue(':id', $id);
			$sql->bindValue(':name', $name);
			$sql->bindValue(':quantidade', $quantestoque);
			$sql->bindValue(':quantos_pontos', $pontos);
			$sql->execute();
		}

		public function editPremio02($nameImg100x100,$id){
			$result = array();
			$array = array();

			$result = $this->getInfoId($id);
			$array = $result['imagem'];

			if(!empty($array)){
				unlink('../painel/assets/images/'.$array);
			}

			$sql = $this->db->prepare("UPDATE premios SET imagem = :imagem WHERE id = :id ");
			$sql->bindValue(':imagem', $nameImg100x100);
			$sql->bindValue(':id', $id);
			$sql->execute();
		}

		public function delPremio($id){
			$result = array();
			$array = array();

			$result = $this->getInfoId($id);
			$array = $result['imagem'];

			if(!empty($array)){
				unlink('../painel/assets/images/'.$array);
			}

			$sql = $this->db->prepare("DELETE FROM premios  WHERE id = :id ");
			$sql->bindValue(':id', $id);
			$sql->execute();
			
		}


		public function confereSenhaPremio($senha,$pontos,$cpf,$quantidade,$idPremio){
			$array = array();
			$array2 = array();
			$array3 = array();
			$array4 = array();
			$valorDiminui = 0;

			$sql = "SELECT * FROM users WHERE password_pontuar = :password_pontuar";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':password_pontuar',md5($senha));
			$sql->execute();

			if($sql->rowCount() > 0){
				$sql = $sql->fetch();
				$id = $sql['id'];//user quem pontuou


				$sql = "SELECT * FROM clients ";

				if(strlen($cpf) == 14){
					$sql .= " WHERE cpf = :cpf";
				}else{
					$sql .= " WHERE codigo_cartao = :codigo_cartao";
				}

				$sql = $this->db->prepare($sql);

				if(strlen($cpf) == 14){
					$sql->bindValue(':cpf',$cpf);
				}else{
					$sql->bindValue(':codigo_cartao',$cpf);
				}	

				$sql->execute();

				if($sql->rowCount() > 0){
					$sql = $sql->fetch();
					$array2 = $sql['pontos'];
					$array3 = $sql['id'];	

					if($array2 >= $pontos){

						$pontos = floatval($pontos);
						$array2 = floatval($array2);

						$valorDiminui = $array2 - $pontos;

						//DIMINUIR PONTOS DO USUARIO
						$sql = $this->db->prepare("UPDATE clients SET pontos = :pontos WHERE id = :id ");
						$sql->bindValue(':pontos', $valorDiminui);
						$sql->bindValue(':id', $array3);
						$sql->execute();

						//DIMINUIR QUANTIDADE
						$quantidade = intval($quantidade) - 1;

						$sql = $this->db->prepare("UPDATE premios SET quantidade = :quantidade WHERE id = :id ");
						$sql->bindValue(':quantidade', $quantidade);
						$sql->bindValue(':id', $idPremio);
						$sql->execute();


						//TABELA HISTORICO DE RESGATE DE PREMIOS
						$geradorNumber = rand(1000, 9999);
						$sql = $this->db->prepare("INSERT INTO premio_historico SET numero_gerado = :numero_gerado, id_cliente = :id_cliente, id_funcionario = :id_funcionario, data_resgate = :data_resgate, hora_resgate = :hora_resgate, pontos_que_tinha = :pontos_que_tinha, pontos_premios = :pontos_premios, caixaativo = :caixaativo ");
						$sql->bindValue(':numero_gerado', $geradorNumber);
						$sql->bindValue(':id_cliente', $array3);
						$sql->bindValue(':id_funcionario', $id);
						$sql->bindValue(':data_resgate', date('Y-m-d'));
						$sql->bindValue(':hora_resgate', date('H:i:s'));
						$sql->bindValue(':pontos_que_tinha', $array2);
						$sql->bindValue(':pontos_premios', $pontos);
						$sql->bindValue(':caixaativo', $_SESSION['sistemadepontuacao']);
						$sql->execute();

						$array = $geradorNumber; //você pode resgatar esses pontos

					}else{
						$array = 4; //você não tem pontos suficientes
									//retornar quantidades de pontos
					}

				}

			}else{
				$array = 2; //senha incorreta
			}


			return $array;

		}



	}

?>