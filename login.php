<?php
    session_start();
    require 'admin/database/_init.php';
    if(@$_COOKIE['user_id'])
    {
      $id=$_COOKIE['user_id'];
      $dat=query::get('uesr',$id);
      if(count($dat)>0)
    {
      $passcookie=$_COOKIE['pass'];
      $emailcookie=$_COOKIE['email'];
    }
    else
    {
      $passcookie="";
      $emailcookie="";
    }
    }
    else
    {
      $passcookie="";
      $emailcookie="";
    }
    //require 'rem.php';
    if(isset($_POST['submit'],$_POST['g-recaptcha-response']))
{
    $secret="6LeDiXYpAAAAADOgb3QR0w63DFji353IzNwnspRu";
    $respnose=$_POST['g-recaptcha-response'];
    $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$respnose;
    @$recap=json_decode(file_get_contents(@$url));//opjct
   if(@$recap->success)
   {
      $time=time()+999;
      if(isset($_POST['remember1']))
      $rem=$_POST['remember1'];
      $pass=$_POST['password'];
      $email=$_POST['email'];
      $data=query::get('uesr','id');
      foreach($data as $va)
      {
         if($va['pass']==$pass&&$va['email']==$email)
         {
            if($rem=='on')
            {
               setcookie("pass",$pass,$time);
               setcookie("email",$email,$time);
               setcookie("user_id",$va['id'],$time);
               setcookie("user_type",$va['type'],$time);
              header('location:index.php');
            }
            else
            {
               $_SESSION['user_id']=$va['id'];
               $_SESSION['user_type']=$va['type'];
               setcookie("pass",$time);
               setcookie("email",$time);
               setcookie("user_type",$time);
               setcookie("user_id",$time);
               header('location:index.php');
            }
         }
      }
          $mess[]= ' هناك خطاء في كلمة السراو البريد الاكتروني';
   }
   else
   {
      $mess[]= ' خطاء في عملية التئكد من انك لست روبوت ';

   }
}
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if(isset($mess)){
   foreach($mess as $mess){
      echo '<div class="message" onclick="this.remove();">'.$mess.'</div>';
   }
}
?>
<div class="form-container">
   <form  method="post">
      <h3>تسجيل الدخول</h3>
      <input type="email" name="email" required placeholder="البريد الالكتروني" class="input" value='<?php echo  $emailcookie;?>'>
      <input type="password" name="password" required placeholder="كلمة المرور" class="input"  value='<?php echo $passcookie;?>'>
      <input type="checkbox" name="remember1" value="on">
      <label > remember me</label>
      <div class="remembe">
      </div>
      <input type="submit" name="submit" class="btn" value="تسجيل الدخول">
      <div class="g-recaptcha" data-sitekey="6LeDiXYpAAAAAHSSDFvw-CS0hYWOmCdgqJSl1_qt"></div>
      <p>هل تملك حساب بالفعل؟ <a href="register.php"> حساب جديد</a></p>
   </form>
</div>
</body>
</html>