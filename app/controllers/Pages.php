<?php
class Pages extends Controller{
    public function index(){
        $posts=$this->model('Post')->getPosts();
        
        $data=['title'=>'Welcome','message'=>'Hello World','posts'=>$posts];
        $this->view('index',$data);
    }
    public function edit($id){
        echo $id;
    }
}