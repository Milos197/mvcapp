<?php session_start();
 function isLoggedIn($path){
    if(isset($_SESSION['firstName'])){
        header("Location: ${path}");
    }
}
function isNotLoggedIn($path){
    if(!isset($_SESSION['firstName'])){
        header("Location: ${path}");
    }
}