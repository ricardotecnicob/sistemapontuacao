<?php
	/**
	 * 
	 */
	class Tables extends model{
		
		public function getListProd(){
			$array = array();

				$sql = "SELECT * FROM table_pontos ";
				$sql = $this->db->prepare($sql);
				$sql->execute();	

				if($sql->rowCount() > 0){
					$array = $sql->fetchAll();
				}

			return $array;	
		}

		public function addProducts($nameProd,$valueProd){
			$sql = "INSERT INTO table_pontos SET name_prod = :name_prod, value_ponto = :value_ponto";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':name_prod', $nameProd);
			$sql->bindValue(':value_ponto', $valueProd);	
			$sql->execute();
		}

		public function editProducts($nameProdE,$valueProdE,$idE){
			$sql = "UPDATE table_pontos SET name_prod = :name_prod, value_ponto = :value_ponto WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':name_prod', $nameProdE);
			$sql->bindValue(':value_ponto', $valueProdE);	
			$sql->bindValue(':id', $idE);	
			$sql->execute();
		}

		public function delitem($id){
			$sql = "DELETE FROM table_pontos WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id);	
			$sql->execute();
		}

	}
?>