<?php
   // require ('register.php');
    require 'admin/database/_init.php';
    
if(isset($_POST['submit'])&&( $_POST['passwerd'])==($_POST['passwerd_1']))
{
    $fill_name =  $_POST['fill_name'];
    $name =$_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['passwerd'];
    $cpass =$_POST['passwerd_1'];
    query::make(query::INSERT('uesr',[
        'fill_name'=>$fill_name,
        'name'=>$name,
        'email'=> $email,
        'pass'=>$pass,
        'type'=>'user'
        ]));
        $fill_name = "";
        $name ="";
        $email ="";
        $pass = "";
        $cpass ="";
    header('location: register.php');
}
else if(isset($_POST['submit'])){
    $fill_name =  $_POST['fill_name'];
    $name =$_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['passwerd'];
    $cpass =$_POST['passwerd_1'];
    header('location: register.php');
}

?>