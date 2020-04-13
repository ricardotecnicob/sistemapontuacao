<?php
	/**
	 * confereCoo confereSenhaRegister
	 */
	class Stitches extends model{
		
		public function getInfo1($info){
			$array = array();

			$sql = "SELECT * FROM clients WHERE cpf = :cpf ";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':cpf',$info);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = $sql->fetch();
			}

			return $array;

		}
		
		public function getInfo2($info){
			$array = array();

			$sql = "SELECT * FROM clients WHERE codigo_cartao = :codigo_cartao ";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':codigo_cartao',$info);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = $sql->fetch();
			}

			return $array;

		}

		public function getInfo3($info){
			$array = array();

			$sql = "SELECT * FROM clients WHERE seis_ultimos_codigos = :seis_ultimos_codigos";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':seis_ultimos_codigos',$info);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = $sql->fetch();
			}

			return $array;

		}


		public function confereSenha($senha,$cpf,$coo,$ativo,$ativo2,$ativo3,$qntLitro,$qntLitro2,$qntLitro3,$redificacao,$ID_GRUPO){
			$array = array();
			$array2 = array();
			$array3 = array();
			$array4 = array();
			$listaPontos = array();
			$result = 0; 
			$result2 = 0;
			$result3 = 0;

			if($redificacao == 0){
				$sql = "SELECT * FROM users WHERE password_pontuar = :password_pontuar";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':password_pontuar',md5($senha));	
			}else{
				if($ID_GRUPO == 2 || $ID_GRUPO == 13 || $ID_GRUPO == 19){
					$sql = "SELECT * FROM users WHERE password = :password";
					$sql = $this->db->prepare($sql);
					$sql->bindValue(':password',md5($senha));
				}else{
					$array = false;
				}
			}
			

			$sql->execute();
			if($sql->rowCount() > 0){
				$sql = $sql->fetch();
				$id = $sql['id'];

				//SE SENHA CORRETA FAZ ATIVIDADE DE REGISTRO

				$sql = "SELECT * FROM table_pontos ";//WHERE id = :id
				$sql = $this->db->prepare($sql);
				//$sql->bindValue(':id', $ativo);
				$sql->execute();

				if($sql->rowCount() > 0){
					$listaPontos = $sql->fetchAll();
					//$array2 = $sql['value_ponto'];


					$sql = "SELECT * FROM clients WHERE cpf = :cpf";
					$sql = $this->db->prepare($sql);
					$sql->bindValue(':cpf', $cpf);
					$sql->execute();

					if($sql->rowCount() > 0){
						$sql = $sql->fetch();
						$array3 = $sql['pontos'];
						$array4 = $sql['id'];

						// A CADA UM LITRO 

						$qntLitro = explode(',', $qntLitro);
						$qntLitro = implode('.', $qntLitro);


						$qntLitro2 = explode(',', $qntLitro2);
						$qntLitro2 = implode('.', $qntLitro2);


						$qntLitro3 = explode(',', $qntLitro3);
						$qntLitro3 = implode('.', $qntLitro3);

						foreach ($listaPontos as $pont) {
							if($pont['id'] == $ativo){
								$result = $pont['value_ponto'] * $qntLitro;
							}else if($pont['id'] == $ativo2){
								$result2 = $pont['value_ponto'] * $qntLitro2;
							}else if($pont['id'] == $ativo3){
								$result3 = $pont['value_ponto'] * $qntLitro3;
							}
						}

						$resultFINAL = floatval($result) + floatval($result2) + floatval($result3) + floatval($array3);

						$sql = "UPDATE clients SET pontos = :pontos, ultimo_user_pontuar = :ultimo_user_pontuar	WHERE cpf = :cpf";
						$sql = $this->db->prepare($sql);
						$sql->bindValue(':cpf', $cpf);
						$sql->bindValue(':pontos', $resultFINAL);
						$sql->bindValue(':ultimo_user_pontuar', $id);
						$sql->execute();


						if($ativo != ''){
							$sql = "INSERT INTO  clients_historico SET pontos = :pontos, id_cliente = :id_cliente, tipoabasteciemnto = :tipoabasteciemnto, ndelitros = :ndelitros, caixaativo = :caixaativo, redificacao = :redificacao, id_user_pontuou = :id_user_pontuou, coo = :coo, data = NOW() ";
							$sql = $this->db->prepare($sql);
							$sql->bindValue(':tipoabasteciemnto', $ativo);
							$sql->bindValue(':ndelitros', $qntLitro);
							$sql->bindValue(':pontos', $result);
							$sql->bindValue(':id_cliente', $array4);
							$sql->bindValue(':id_user_pontuou', $id);	
							$sql->bindValue(':caixaativo', $_SESSION['sistemadepontuacao']);
							$sql->bindValue(':coo', $coo);
							$sql->bindValue(':redificacao', $redificacao);
							$sql->execute();
						}

						if($ativo2 != ''){
							$sql = "INSERT INTO  clients_historico SET pontos = :pontos, id_cliente = :id_cliente, tipoabasteciemnto = :tipoabasteciemnto, ndelitros = :ndelitros, caixaativo = :caixaativo, redificacao = :redificacao, id_user_pontuou = :id_user_pontuou, coo = :coo, data = NOW() ";
							$sql = $this->db->prepare($sql);
							$sql->bindValue(':tipoabasteciemnto', $ativo2);
							$sql->bindValue(':ndelitros', $qntLitro2);
							$sql->bindValue(':pontos', $result2);
							$sql->bindValue(':id_cliente', $array4);
							$sql->bindValue(':id_user_pontuou', $id);	
							$sql->bindValue(':caixaativo', $_SESSION['sistemadepontuacao']);
							$sql->bindValue(':coo', $coo);
							$sql->bindValue(':redificacao', $redificacao);
							$sql->execute();
						}

						if($ativo3 != ''){	
							$sql = "INSERT INTO  clients_historico SET pontos = :pontos, id_cliente = :id_cliente, tipoabasteciemnto = :tipoabasteciemnto, ndelitros = :ndelitros, caixaativo = :caixaativo, redificacao = :redificacao, id_user_pontuou = :id_user_pontuou, coo = :coo, data = NOW() ";
							$sql = $this->db->prepare($sql);
							$sql->bindValue(':tipoabasteciemnto', $ativo3);
							$sql->bindValue(':ndelitros', $qntLitro3);
							$sql->bindValue(':pontos', $result3);
							$sql->bindValue(':id_cliente', $array4);
							$sql->bindValue(':id_user_pontuou', $id);	
							$sql->bindValue(':caixaativo', $_SESSION['sistemadepontuacao']);
							$sql->bindValue(':coo', $coo);
							$sql->bindValue(':redificacao', $redificacao);
							$sql->execute();
						}

					}


				}


				$array = true;

			}else{
				$array = false;
			}

			return $array;
		}

		public function confereSenhaRegister($senha){
			$array = array();



			$sql = "SELECT * FROM users WHERE password_pontuar = :password_pontuar";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':password_pontuar',md5($senha));
			$sql->execute();

			if($sql->rowCount() > 0){
				$sql = $sql->fetch();
				$id = $sql['id'];

				// echo $id;
				// exit;

				$array = $id;
			}


			return $array;

		}

		public function conferePontos($cpf){
			$array = array();

			$sql = "SELECT *,(select users.name from users where users.id = clients.ultimo_user_pontuar) as nameatendente FROM clients WHERE cpf = :cpf";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':cpf', $cpf);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = $sql->fetch();	
			}

			return $array;
		}



		public function confereCoo($value,$QUEM_ABRIU_A_PLATAFORMA){
			$array = array();
			$ULTIMO_COO = array();
			$FAIXA = 0;
			$RESULT = array();


				/*
					COO EXISTE?
					CASO CONTRARIO PODE CADASTRAR SE TIVER NA FAIXA DE 10
				*/

				$sql = "SELECT * FROM clients_historico WHERE coo = :coo";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':coo', $value);
				$sql->execute();

				if($sql->rowCount() > 0){
					$array = 1;
				}else{

					//COO NÃO EXISTE E FOR MAIOR QUE O ULTIMO COO DO BANCO
					//PRIMEIRO ORDERNA COO 
					//DEPOIS PEGA O ULTIMO  

						$sql = "SELECT * FROM clients_historico ORDER BY coo DESC LIMIT 1";
						$sql = $this->db->prepare($sql);
						$sql->execute();

						if($sql->rowCount() > 0){
							$sql = $sql->fetch();
							$ULTIMO_COO = $sql['coo']; //100.100
							$FAIXA = $ULTIMO_COO - 10; //100.100 - 10 = 100.090

							for($i=$FAIXA; $i < $ULTIMO_COO; $i++) { 
								$RESULT[] = $i;
							}

							$ultimo = end($RESULT);

							if($value > $ultimo && $value > $ULTIMO_COO){
								//chegou um valor novo
								$array = 3;
							}else{
								if(in_array($value, $RESULT)){
									$sql = "SELECT * FROM clients_historico WHERE coo = :coo";
									$sql = $this->db->prepare($sql);
									$sql->bindValue(':coo', $value);
									$sql->execute();

									if($sql->rowCount() > 0){
										$array = 1;
									}else{
										$array = 3;
									}
								}else{
									$sql = "SELECT * FROM clients_historico WHERE coo = :coo";
									$sql = $this->db->prepare($sql);
									$sql->bindValue(':coo', $value);
									$sql->execute();

									if($sql->rowCount() > 0){
										$array = 1;
									}else{
										$array = 2;
									}
								}
							}
					}else{
						$array = 3;
					}
				}


			return $array;
		}

		public function confereCard($card){
			$array = array();

			$sql = "SELECT * FROM clients WHERE codigo_cartao = :codigo_cartao";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':codigo_cartao', $card);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = false;
			}else{
				$array = true;
			}

			return $array;
		}

	}
?>