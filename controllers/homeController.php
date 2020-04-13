<?php
  class homeController extends controller{
    
    public function __construct(){
      parent::__construct();  
        
      
    } 
    
    public function index(){
      $data = array();  

      
      $this->loadTemplate("home" , $data);  
    }
  
  }

?>