<?php
  class contactController extends controller{
    
    public function __construct(){
      parent::__construct();  
    } 
    
    public function index(){
      $data = array();  

      $pg_contact = new Pgcontact();

      $data['info_contact'] = $pg_contact->infoContact();

    


		$cache = new Cache();
      
        if(file_exists('assets/caches/contact.cache') && $cache->is_valido('assets/caches/contact.cache') == true){
            require 'assets/caches/contact.cache';
        }else{
          ob_start();
            $this->loadTemplate("contact" , $data); 
            $html = ob_get_contents();
          ob_end_clean(); 
          
          $cache->setVar("contact.cache", $html);

          echo $html;

        }
      
        
    }



  }

?>