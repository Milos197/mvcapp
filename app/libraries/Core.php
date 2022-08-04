<?php
class Core {
    protected $currentController='Pages';
    protected $currentMethod = 'index';
    protected $params = array();
    public function __construct(){
        $url=$this->getUrl();

         if(isset($url[0])){
            $controller=strtolower($url[0]);
            $controller=ucfirst($controller);
            $path="../app/controllers/${controller}.php";
            if(file_exists($path)){
            $this->currentController=$controller;
            unset($url[0]);
        }
        }
        
        $path='../app/controllers/' . $this->currentController . '.php';
        require_once $path;
        $class=new $this->currentController;
        if(isset($url[1]) &&  method_exists($class,$url[1])){
        $this->currentMethod=$url[1];
        unset($url[1]);
        }
         $this->params = $url ? array_values($url) : [];
        //Call a callback with array of params
        call_user_func_array([$class, $this->currentMethod], $this->params);
 }
    public function getUrl(){
        if(isset($_GET['url'])){
        $url=$_GET['url'];
        $url=rtrim($url,'/');
        $fragments=explode('/',$url);
        return $fragments;
        }
    }

}
