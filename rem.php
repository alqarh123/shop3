<?php
 //session_start(); 
 $data=query::get('uesr','id');
 foreach($data as $va)
   {
      if($va['pass']==$_COOKIE['pass']&&$va['email']==$_COOKIE['email'])
      {
         header('location:index.php');
      }
   }
?>