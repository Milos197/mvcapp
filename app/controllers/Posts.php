<?php
class Posts extends Controller{
    public function index(){
        isNotLoggedIn('/users/login');
        $posts=$this->model('Post')->getPosts();
        $data=['title'=>'Welcome','message'=>'Hello World','posts'=>$posts];
        $this->view('posts/index',$data);
    }

    public function show($id=0){
        if($id){
        $post=$this->model('Post')->getSinglePost($id);
        $this->view('posts/show',['post'=>$post]);
        }
        else {
            header("Location: http://localhost:8001/posts");
            //http_response_code(404);
        }
    }
    public function create(){
        isNotLoggedIn('/users/login');
        $categories=$this->model('Category')->getAllCategories();
        if($_SERVER['REQUEST_METHOD']==='POST'){
        $data=[
            'title'=>$_POST['title'],
            'body'=>$_POST['body'],
            'status'=>$_POST['status'],
            'createdBy'=>$_SESSION['id']
        ];
        $category=$_POST['category'];
        
        $error=[
            'title_error'=>'',
            'body_error'=>'',
            'status_error'=>'',
            'category_error'=>''
        ];

         if(empty($data['title'])){
         $error['title_error']='Title is required';
         }

         if(empty($data['body'])){
             $error['body_error']='Body is required';
         }

         if(empty($category)){
             $error['category_error']='Category is required';
         }



         if($error['title_error']===''&&$error['body_error']===''
         &&$error['category_error']===''){
             if($post=$this->model('Post')->createNewPost($data['title'],
             $data['body'],$data['status'],$data['createdBy']))
         {
            foreach($category as $cat){
                $this->model('Post')->addNewPostCategory($post,$cat);
            }
            header('Location: /users/profile');
         }
         }
         else{
         $this->view('posts/create',array_merge($data,$error,$categories));
         }
    
    }
        else{
            $this->view('posts/create',$categories);
        }
    }
    
    public function edit($id){
        isNotLoggedIn('/users/login');
        $user=$this->model('Post')->getSinglePost($id);
        $data=['user'=>$user];
        if($_SERVER['REQUEST_METHOD']==='POST'){
        $error=[
            'title_error'=>'',
            'body_error'=>'',
            'status_error'=>'' 
        ];
        $data['user']->title=$_POST['title'];
        $data['user']->body=$_POST['body'];
        $data['user']->status=$_POST['status'];


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
        $this->view('posts/edit',array_merge($data,$error));
        }
    }
    else{
        $this->view('posts/edit',$data);
    }


    }


    public function delete($id){
        isNotLoggedIn('/users/login');

        $this->model('Post')->delete($id);

        header('Location: /users/profile');
    }

}