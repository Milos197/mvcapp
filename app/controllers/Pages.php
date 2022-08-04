<?php
class Pages extends Controller{
    public function index(){
        $data=['title'=>'Welcome','message'=>'Hello World'];
        $this->model('Page');
        $this->view('index',$data);
    }
    public function edit($id){
        echo $id;
    }
}