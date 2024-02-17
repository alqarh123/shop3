<?php
require 'database/_init.php';
 $id=$_GET['id'];
query::delete('prod',$id);
header('location: main.php');
?>