<?php
require 'database/_init.php';
session_start();
$id_user=$_SESSION['user_id'];

 if(isset($_POST['sub']))
 {
    $name=squr::squr_add($_POST['name']);
    $price=squr::squr_add($_POST['price']);
    $varieties_id=$_POST['varieties_id'];
    $image=$_FILES['image'];
    $image_loction=$_FILES['image']['tmp_name'];
    $image_name=$_FILES['image']['name'];
    $image_up="images/".$image_name;
    query::make(query::INSERT('prod',[
    'name'=>$name,
    'price'=>$price,
    'image'=> $image_up,
    'id_va'=>$varieties_id,
   ' user_id'=> $id_user
    ]));
    move_uploaded_file($image_loction,'images/'.$image_name);
    header('location: main.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="products.css">
</head>
<body>
<nav class="nav1">
    <a href="varieties.php">الاصناف</a>
    <a href="http://localhost:88/new/login.php" >تسجيل الخروج</a>
  </nav>
<?php
$varieties =query::get('varieties');
?>
     <center>
     <div class="main">
        <form  method="post" enctype="multipart/form-data">
            <h2 id="hid">موقع تسويق</h2>
            <input type="text" name="name" class="input" required placeholder="الاسم المنتج  " ><br>
            <select name="varieties_id">
               
                <?php
                foreach($varieties as $va1)
                {
                    $va=squr::squr_del($va1['name']);
                    echo "<option value='$va1[id]'>$va</option>";
                }
                ?>
            </select><label>اختيارالصنف</label><br>
            <input type="text" name="price" required placeholder="السعر"  class="input"><br>
            <input type="file"  id="file" name="image" required style='display:none' >
            <label for="file" id="files"> اختيار صوره للمنتج</label>
            <input type="submit" name="sub" value="رفع المنتج" id="sub"><br><br>
        </form>
     </div>
     <center>
     <center>
    <h2>المنتجات المتوفره</h2>
  <center>
    <?php
$row =query::get('prod');
foreach($row as $va1){
    $name1=squr::squr_del($va1['name']);
    $price1=squr::squr_del($va1['price']);
    echo "
    <center>
    <main>
   <div class='card' >
      <img src='$va1[image]'>
       <div class='card-contet'>
         <p class='card-text'>$price1</p>
         <h5 class='card-title'>$name1</h5>
         <pre>
<a href='update.php? id=$va1[id]' class='btn '>   تعديل المنتج   </a>    <a href='delete.php? id=$va1[id]' class='btn '>   حذف المنتج      </a>
         </pre>
      </div>
   </div>
  </main>
    <center>
    ";
}
    ?>   
</body>
</html>