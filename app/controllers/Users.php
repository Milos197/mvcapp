<?php
class Users extends Controller{
public function login(){
    $this->view('users/login');
}
public function register(){ 
    if($_SERVER['REQUEST_METHOD']==='POST'){


        $data=[
            'firstName'=>$_POST['firstName'],
            'lastName'=>$_POST['lastName'],
            'email'=>$_POST['email'],
            'password'=>$_POST['password'],
            'passwordRep'=>$_POST['passwordRep']
        ];
        $error=[
            'firstName_error'=>'',
            'lastName_error'=>'',
            'email_error'=>'',
            'password_error'=>'',
            'passwordRep_error'=>'',
        ];


        if(empty($data['firstName']))
        $error['firstName_error']='First name is required';

        if(empty($data['lastName']))
        $error['lastName_error']='Last name is required';

        if(empty($data['email']))
        $error['email_error']='Email is required';
        else{
            if($this->model('User')->findUserByEmail($data['email'])){
                $error['email_error']='Email already taken';
            }

        }

        if(empty($data['password']))
        $error['password_error']='Password is required';

        if(empty($data['passwordRep'])){
        $error['passwordRep_error']='You have to repeat your password';
        }
        else {
            if($data['password']!=$data['passwordRep']){
                $error['passwordRep_error']="Password and password repeated must be same";
            }
        }






        if(empty($error['firstName_error'])&&
        empty($error['lastName_error'])&&
        empty($error['email_error'])&&
        empty($error['password_error'])&&
        empty($error['passwordRep_error'])){
        $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
        if($this->model('User')->createNewUser($data['firstName'],
        $data['lastName'],$data['email'],$data['password']))
        {
            header('Location: /users/login');
        }
        }
        else{
            $this->view('users/register',array_merge($data,$error));
        }

       
    }
    else {
        $this->view('users/register');
    }
}
}