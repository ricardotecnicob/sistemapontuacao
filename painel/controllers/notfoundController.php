<?php
  class notfoundController extends controller{
    
    public function __construct(){
      parent::__construct();  
        
        	
			$u = new Users();
			$ip = $_SERVER['REMOTE_ADDR'];
			
			$ver = $u->isLogged($ip);
			if($ver == false){
				header("Location: ".BASE_URL."/painel/login");
			}
      
    } 
    
    public function index(){
      $data = array();  


      
      $this->loadView("404" , $data);  
    }
  
  }

?>