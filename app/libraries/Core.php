<?php
class Core {
    protected $currentController='Pages';
    protected $currentMethod = 'index';
    protected $params = array();
    public function __construct(){
        $url=$this->getUrl();
        $controller=ucfirst($url[0]);
        $path="../app/controllers/${controller}.php";
        if(file_exists($path)){
            $this->currentController=$controller;
            unset($url[0]);
        }
        require_once $path;
        $postclass=new $this->currentController;
        if(isset($url[1]) &&  method_exists($postclass,$url[1])){
        $this->currentMethod=$url[1];
        unset($url[1]);
        }
        $this->params = $url ? array_values($url) : [];
        var_dump($this->params);
        // Call a callback with array of params
        call_user_func_array([$postclass, $this->currentMethod], $this->params);
    }
    public function getUrl(){
        if(isset($_GET['url'])){
        $url=$_GET['url'];
        $url=rtrim($url,'/');
        $fragments=explode('/',$url);
        return $fragments;
        }
        else echo 'Greska sa Url!';
    }

}
