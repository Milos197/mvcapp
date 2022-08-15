<?php
class Comments extends Controller{
    public function index(){
        isNotLoggedIn('/users/login');
    }

    public function create(){
        isNotLoggedIn('/users/login');
        var_dump($id);
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $data=[
            'userId'=>$_SESSION['id'],
            'postId'=>$id,
            'body'=>$_POST['body']
            ];
        
            $error=[
            'body_error'=>''
        
            ];
        
            if(empty($data['body']))
            $error['body_error']='Body is required';
            
            if($error['body_error']===''){
            if($this->model('Comment')->add($data['userId'],
            $data['postId'],$data['body']))
            header('Location: /posts/show');
        }
        else{
            $this->view('/posts/show',array_merge($data,$error));
        }

        }


        else{
            $this->view('/posts/show');
        }
    }
}