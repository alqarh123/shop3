<?php
require 'database/_init.php';
session_start();
$id1=$_SESSION['user_id'];
$dat=query::get('uesr',$id1);
if(count($dat)>0)
{
      $id=$_GET['id'];
      $data=query::get('prod',$id);
      foreach($data as $va)
        {
            query::make(
            query::INSERT('insert_cart',[
            'name'=>$va['name'],
            'price'=>$va['price'],
            'user_id'=>$id1])
            );
        }
}
header('location:shop.php');
?>
