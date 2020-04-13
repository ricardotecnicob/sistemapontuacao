<?php 
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
	/**
	 * 
	 */
	class Pgcontact extends model
	{
		

	public function salvarmsg($name,$phone,$email,$assunto,$menssage){
		$sql = "INSERT INTO mensages SET name = :name, phone = :phone,  email = :email, assunto = :assunto,  mensagem = :mensagem, dataenvio = :dataenvio, status = :status";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name',$name);
		$sql->bindValue(':phone',$phone);
		$sql->bindValue(':email',$email);
		$sql->bindValue(':assunto',$assunto);
		$sql->bindValue(':mensagem',$menssage);
		$sql->bindValue(':dataenvio',date('d/m/Y'.'  '.'H:i'));
		$sql->bindValue(':status',0);
		$sql->execute();
	}	

}
?>