<?php
$host='localhost';
$user='root';
$password='tiger';
$dbname='app';
$dsn = 'mysql:host=database:3306;dbname=app';
try{
$pdo = new PDO($dsn, $user, $password);
echo 'Connection succesfull';
}
catch(PDOException $exception){
    echo $exception->getMessage();
}
$sql ='SELECT * FROM posts';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll();
//var_dump($posts);
$status='published';
$sql2 ='SELECT * FROM posts where status=:status';
$stmt= $pdo->prepare($sql2);
$stmt->bindParam(':status',$status,PDO::PARAM_STR);
$stmt->execute();
$published=$stmt->fetchAll();
//var_dump($published);
$title='Post 6';
$status='published';
$sql3='insert into posts (title,status) values (:title,:status)';
$stmt=$pdo->prepare($sql3);
$stmt->execute([':title'=>$title,':status'=>$status]);