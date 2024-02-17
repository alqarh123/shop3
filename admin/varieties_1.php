<?
<?php
require 'database/_init.php';
 $id=$_GET['id'];
query::delete('varieties',$id);
header('location: varieties.php');
?>
?>