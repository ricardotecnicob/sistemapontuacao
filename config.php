<?php
	require 'environment.php';
	
	$config = array();
	
	if(ENVIRONMENT == 'development'){
		define ("BASE_URL", "http://127.0.0.1/sistemapontuacao");
		
		$config['dbname'] = 'sistemapontuacao';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'root';
		$config['dbpass'] = '';
	}elseif(ENVIRONMENT == 'production'){
		define ("BASE_URL", "http://127.0.0.1/sistemapontuacao");
		
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