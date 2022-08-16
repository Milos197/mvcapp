<?php
class Comment{

    private $db;

    public function __construct(){
        $this->db=new Db();
    }

    public function add($userId,$postId,$body){
        $sql='insert into comments (userId,postId,body) values 
        (:userId,:postId,:body)';
        $this->db->query($sql);
        $this->db->bind(':userId',$userId);
        $this->db->bind(':postId',$postId);
        $this->db->bind(':body',$body);
        return $this->db->execute();
    }

    public function getCommentsByPostId($id){
        $sql='select * from comments where :postId=postId order by createdAt desc';
        $this->db->query($sql);
        $this->db->bind(':postId',$id);
        return $this->db->collection();
    }

}