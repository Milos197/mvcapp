<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
</head>
<body>
    echo
<?php
if(isset($_SESSION['id'])){
    echo $_SESSION['firstName'];
    echo '<a href="/users/logout">Logout</a>';
}    
else{
    header('Location: /users/login');
}