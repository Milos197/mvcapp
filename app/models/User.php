<?php
class User{
    private $db;
    public function __construct(){
        $this->db=new Db();
    }
    public function createNewUser($firstName,$lastName,$email,$password){
        $sql='insert into users (firstName,lastName,email,password) 
        values(:firstName,:lastName,:email,:password)';
        $this->db->query($sql);
        $this->db->bind(':firstName',$firstName);
        $this->db->bind(':lastName',$lastName);
        $this->db->bind(':email',$email);
        $this->db->bind(':password',$password);
        return $this->db->execute();
    }

    public function findUserByEmail($email){
        $sql='select * from users where email=:email';
            $this->db->query($sql);
            $this->db->bind(':email',$email);
            $this->db->single();
            return $this->db->count();
    }

    public function getUserByEmail($email){
        $sql='select * from users where email=:email';
        $this->db->query($sql);
        $this->db->bind(':email',$email);
        return ($this->db->single());
    }

    public function getUserById($id){
        $sql='select * from users where id=:id';
        $this->db->query($sql);
        $this->db->bind(':id',$id);
        return $this->db->single();
    }
}