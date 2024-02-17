<?php
require 'admin/database/_init.php';
session_start();
$user_id=$_SESSION['user_id'] or $_COOKIE['user_id'];
$user_type=$_SESSION['user_type'] or $_COOKIE['user_type'];
if(!isset($user_id) &&!$_COOKIE['email'])
header('location:login.php');
if(!isset($user_type) && !$_COOKIE['pass'])
header('location:login.php');
if($user_type=='admin')
{
header('location:admin/main.php');
}
else if($user_type=='user')
{
header('location:user/shop.php');
}
?>