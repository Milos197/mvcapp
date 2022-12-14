<?php
class Categories extends Controller{
    public function index(){
        isNotLoggedIn('/users/login');
        echo 'Categories';
    }

    public function create(){
        isNotLoggedIn('/users/login');
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $data=[
                'title'=>$_POST['title']
            ];
            $error=[
                'error'=>''
            ];
        

        if(empty($data['title'])){
            $error['error']='Title is required';
        }
        else{
            if($this->model('Category')->checkCategories($data['title']))
            {
            $error['error']='This category already exists';
            }
        }
        if($error['error']==='')
        {
            if($this->model('Category')->add($data['title'])){
                header('Location: /index');
            }
        }
        else{
            $this->view('categories/create',array_merge($data,$error));
        }
        }
        else{
            $this->view('categories/create');
        }
    }
}