
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php
require 'database/_init.php';
$id=$_GET['id'];
$data=query::get('prod',$id);
foreach($data as $va)
{
    ?>
     <center>
     <div class="main">
        <form action="up.php" method="post" enctype="multipart/form-data">
            <h2 id="hid">تعديد المنتجات</h2>
            <img src="" alt="logo" id="logo"><br>
            <input type="text" name="id" class="input" value='<?php echo $va['id']?>'><br>
            <input type="text" name="name" class="input" value='<?php echo $va['name']?>'><br>
            <input type="text" name="price" class="input" value='<?php echo $va['price']?>'><br>
            <input type="submit" name="sub" value="تحديث المنتج" id="sub"><br><br>
            <a href="main.php" id="a">عرض كل المنتجات</a>
        </form>
     </div>
     <?php
    }?>
     <center>
</body>
</html>
