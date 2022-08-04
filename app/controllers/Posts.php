<?php
class Posts extends Controller{
    public function index(){
        $posts=$this->model('Post')->getPosts();
        $data=['title'=>'Welcome','message'=>'Hello World','posts'=>$posts];
        $this->view('posts/index',$data);
    }

    public function show($id=0){
        if($id){
        $user=$this->model('Post')->getSinglePost($id);
        $this->view('posts/show',['user'=>$user]);
        }
        else {
            header("Location: http://localhost:8001/posts");
            //http_response_code(404);
        }
    }
}