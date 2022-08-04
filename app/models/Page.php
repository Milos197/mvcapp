<?php
class Page{
    private $db;
    public function __construct(){
        $this->db=new Db();
        echo 'Page model';
    }
}