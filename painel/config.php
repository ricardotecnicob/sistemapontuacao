<?php
	require 'environment.php';
	
	$config = array();
	
	if(ENVIRONMENT == 'development'){
		define ("BASE_URL", "http://127.0.0.1:8080/sistemapontuacao");
		define ("TELEFONE", "0000-0000");
		define ("EMAILSISTEMA", "teste@gmail.com");
		define ("HOST", "mail.teste.com");
		define ("EMAILSERVIDOR", "teste2@gmail.com");
		define ("SENHAEMAILSERVIDOR", "teste2@gmail.com");
		define ("NOMEDOSISTEMA", "SISTEMA DE PONTUAÇÃO");
		
		$config['dbname'] = 'sistemapontuacao';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'root';
		$config['dbpass'] = '';
	}elseif(ENVIRONMENT == 'production'){
		define ("BASE_URL", "http://127.0.0.1:8080/sistemapontuacao");
		
		$config['dbname'] = 'sistemapontuacao';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'root';
		$config['dbpass'] = '';
	}
	
	global $db;
	
	try{
		$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass']);
	} catch(PDOException $e){
		echo "ERRO: ".$e->getMenssage();
		exit;	
	}
?>