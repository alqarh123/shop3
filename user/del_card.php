<?php
require 'database/_init.php';
$id=$_GET['id'];
query::delete('insert_cart',$id);
header('location: card.php');
?>