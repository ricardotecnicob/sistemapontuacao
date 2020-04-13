<?php
	/**
	 * 
	 */
	class Cache extends model{

		public function is_valido($cache){
			$ultima_modoficacao = filectime($cache);
			$c = time() - $ultima_modoficacao;

			if($c > 10){
				return false;
			}else{
				return true;
			}
		}
	

		public function setVar($name,$value){
			file_put_contents('assets/caches/'.$name,$value);
		}

		// private $cache;

		// public function setVar($name,$value){
		// 	$this->readCache();//Ler Cache
		// 	$this->cache->$name = $value; //adicionar ou subistituir Cache
		// 	$this->salveCache();//Salvar Cache
		// }

		// public function getVar($name){
		// 	$this->readCache();//Ler Cache
		// 	return $this->cache->$name;//retornando cache
		// }

		// private function readCache(){
		// 	$this->cache = new stdClass();//Limpa o cache Criando Objeto Vazio
		// 	if(file_exists('cache.cache')){//verificando se cache existe
		// 		$this->cache = json_decode(file_get_contents('cache.cache')); //transformando arquivo em Json
		// 	}
		// }

		// private function salveCache(){
		// 	file_put_contents("cache.cache", json_encode($this->cache));//SALVANDO CACHE
		// }

	}
?>