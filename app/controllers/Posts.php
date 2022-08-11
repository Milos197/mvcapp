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
    public function create(){
        isNotLoggedIn('/users/login');
        if($_SERVER['REQUEST_METHOD']==='POST'){
        $data=[
            'title'=>$_POST['title'],
            'body'=>$_POST['body'],
            'status'=>$_POST['status'],
            'createdBy'=>$_SESSION['id']
        ];
        $error=[
            'title_error'=>'',
            'body_error'=>'',
            'status_error'=>'' 
        ];

        if(empty($data['title'])){
        $error['title_error']='Title is required';
        }

        if(empty($data['body'])){
            $error['body_error']='Body is required';
        }

        if($error['title_error']===''&&$error['body_error']===''){
            if($this->model('Post')->createNewPost($data['title'],
            $data['body'],$data['status'],$data['createdBy']))
        {
            header('Location: /users/profile');
        }
        }
        else{
        $this->view('posts/create',array_merge($data,$error));
        }
    
    }
        else{
            $this->view('posts/create');
        }
    }

    public function edit($id){
        isNotLoggedIn('/users/login');

        $user=$this->model('Post')->getSinglePost($id);
        $data=['user'=>$user];
        $this->view('posts/edit',$data);

        $error=[
            'title_error'=>'',
            'body_error'=>'',
            'status_error'=>'' 
        ];


        if(empty($data['user']->title)){
            $error['title_error']='Title is required';
            }
    
        if(empty($data['user']->body)){
            $error['body_error']='Body is required';
        } 
        
        if($error['title_error']===''&&$error['body_error']===''){
            $data['user']->editedAt=date('d-m-y h:i:s');
            if($this->model('Post')->edit($id,$data['user']->title,
            $data['user']->body,$data['user']->status,$data['user']->editedAt))
        {
            header('Location: /users/profile');
        }
        }
        else{
        $this->view('posts/create',array_merge($data,$error));
        }


    }


    public function delete($id){
        isNotLoggedIn('/users/login');
        $this->model('Post')->delete($id);
        header('Location: /users/profile');
    }
}