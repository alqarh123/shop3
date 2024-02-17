<?php 
 $fill_name = "";
 $name ="";
 $email ="";
 $pass = "";
 $cpass ="";
 require 'admin/database/_init.php';
if(isset($_POST['submit']) && $_POST['passwerd']==$_POST['passwerd_1'])
{
    $fill_name =  $_POST['fill_name'];
    $name =squr::squr_add($_POST['name']);
    $email = squr::squr_add($_POST['email']);
    $pass =squr::squr_add($_POST['passwerd']); 
    $cpass =squr::squr_add($_POST['passwerd_1']);
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
    echo '<script>alert("تم انشاء الحساب بنجاح");</script>';
    header('location:login.php');


}
else if(isset($_POST['submit'])){
    $fill_name =  $_POST['fill_name'];
    $name =$_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['passwerd'];
    $cpass =$_POST['passwerd_1'];
    echo '<script>alert("هناك خطاء في كلمة الس");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انشاء حساب</title>
    <link rel="stylesheet" href="style.css">
</head><script></script>
<body>
<div class="form-container">
   <form  method="post">
       <h3>انشاء حساب جديد</h3>
       <div class="fill_name">
         <input type="text" name="fill_name" required placeholder="الاسم كامل " value="<?php echo $fill_name ?>"  class="input">
       </div>
       <div class="name">
         <input type="text" name="name" required placeholder="اسم السمتخدم" value="<?php echo $name?>"   class="input">
       </div>
       <div class="email">
         <input type="email" name="email" required placeholder="البريد الاكتروني" value="<?php echo $email?>" class="input">
       </div>
       <div class="pass">
         <input type="passwerd" name="passwerd" required placeholder="كلمة السر" value="<?php echo $pass?>"  class="input">
       </div>
       <div class="pass">
         <input type="passwerd" name="passwerd_1" required placeholder="تئكيد كلمة السر" value="<?php echo $cpass ?>"  class="input">
       <div class="name">
      <input type="submit" name="submit"  value="تسجيل حساب">
       </div>
       <div class="log">
          <p>هل لديك حساب؟ <a href="login.php"> تسجيل دخول</a></p>
       </div>
    </form>
</div>
</body>
</html>
