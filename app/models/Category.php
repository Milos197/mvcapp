<?php
class Category{
    private $db;

    public function __construct(){
        $this->db=new Db();
    }


    public function add($title){
        $sql='insert into categories (title) values (:title)';
        $this->db->query($sql);
        $this->db->bind(':title',$title);
        return $this->db->execute();
    }


    public function getAllCategories(){
        $sql='select * from categories';
        $this->db->query($sql);
        return $this->db->collection();
    }
}