<?php
class Post{
    private $db;
    public function __construct(){
        $this->db=new Db();
    }

    public function getPosts(){
        $sql='select * from posts';
        $this->db->query($sql);
        return $this->db->collection();
    }
    public function getSinglePost($id){
        $sql='select * from posts where id=:id';
        $this->db->query($sql);
        $this->db->bind(':id',$id);
        return $this->db->single();
    }
}