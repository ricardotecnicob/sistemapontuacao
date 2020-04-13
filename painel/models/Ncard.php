<?php
	/**
	 * 
	 */
	class Ncard extends model{
		
		public function trocacard($nCardAntigo,$nCardNovo,$idPessoa,$senhaQuemAlterou){
			$array = array();
			$seis_ultimos_codigos = array();


			$sql = "SELECT * FROM users WHERE password = :password";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':password', md5($senhaQuemAlterou));
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = $sql->fetch();
			}


			$rest = substr($nCardNovo, 0, 7); 

			$seis_ultimos_codigos = explode(''.$rest.'', $nCardNovo);//7678647
			$seis_ultimos_codigos = $seis_ultimos_codigos[1];

			$sql = "SELECT * FROM clients WHERE id = :id AND codigo_cartao = :codigo_cartao ";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $idPessoa);
			$sql->bindValue(':codigo_cartao', $nCardAntigo);
			$sql->execute();

			if($sql->rowCount() > 0){

				$sql = "UPDATE clients SET codigo_cartao = :codigo_cartao, seis_ultimos_codigos = :seis_ultimos_codigos	WHERE id = :id";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id', $idPessoa);
				$sql->bindValue(':codigo_cartao', $nCardNovo);
				$sql->bindValue(':seis_ultimos_codigos', $seis_ultimos_codigos);
				$sql->execute();

				//CRIAR HISTORICO DE QUEM ALTEROU CARTÃO
				$sql = "INSERT INTO card_historico SET id_cliente = :id_cliente, id_quemtrocou = :id_quemtrocou, ncard_antigo = :ncard_antigo, ncard_novo = :ncard_novo ";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id_cliente', $idPessoa);
				$sql->bindValue(':id_quemtrocou', $array['id']);
				$sql->bindValue(':ncard_antigo', $nCardAntigo);
				$sql->bindValue(':ncard_novo', $nCardNovo);
				$sql->execute();

			}

			return true;
		}

	}
?>