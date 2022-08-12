<?php
class Pages extends Controller{
    public function index(){
        $posts=$this->model('Post')->getPublishedPosts();
        $this->view('index',$posts);
    }
    public function edit($id){
        echo $id;
    }
}