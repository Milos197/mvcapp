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
        $sql='select c.createdAt as commentCreatedAt, p.title, p.status,
        p.id, c.body, c.userId, p.createdBy from posts as p inner join 
        comments as c on p.id=c.postId
         where p.id=:id';
        $this->db->query($sql);
        $this->db->bind(':id',$id);
        return $this->db->collection();
    }



    public function createNewPost($title,$body,$status,$createdBy){
        $sql='insert into posts (title,body,status,createdBy) values 
        (:title,:body,:status,:createdBy)';
        $this->db->query($sql);
        $this->db->bind(':title',$title);
        $this->db->bind(':body',$body);
        $this->db->bind(':status',$status);
        $this->db->bind(':createdBy',$createdBy);
        return $this->db->execute();
    }


    public function getPostsById($createdBy){
        $sql='select * from posts where createdBy=:createdBy';
        $this->db->query($sql);
        $this->db->bind(':createdBy',$createdBy);
        return $this->db->collection();
    }

    public function delete($id){
        $sql='delete from posts where id=:id';
        $this->db->query($sql);
        $this->db->bind(':id',$id);
        $this->db->execute();
    }

    public function edit($id,$title,$body,$status,$editedAt){
        $sql='update posts set title=:title,body=:body,status=:status,
        editedAt=:editedAt where id=:id';
        $this->db->query($sql);
        $this->db->bind(':title',$title);
        $this->db->bind(':body',$body);
        $this->db->bind(':status',$status);
        $this->db->bind(':editedAt',$editedAt);
        $this->db->bind(':id',$id);
        return $this->db->execute();
    }

    public function getPublishedPosts(){
        $status='published';
        $sql='select * from posts where status=:status order by 
        createdAt desc';
        $this->db->query($sql);
        $this->db->bind(':status',$status);
        return $this->db->collection();
    }
}