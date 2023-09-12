<?php
 if(@$_COOKIE["userLogin"] == 1){
    echo'<meta http-equiv="refresh" content="0, url=index.php" />';
    exit();
}

include "iraq.php"; 
global $connect; 
mysqli_set_charset($connect, 'utf8');
$error =null;
$L_post01 = @$_POST['UserName'];
$L_post02 = @$_POST['password'];
 

if(isset($_POST['submit'])){
    if(empty($L_post01) || empty($L_post02)){
        $error = "<p class='StyleErrr'>يرجى عدم ترك الحقول فارغه  </p>";
        $welcome = "";
    }else{
        $GetUser = "SELECT * FROM `uswes` WHERE userMail = '$L_post01'";
        $RunUser= mysqli_query($connect, $GetUser);
        if(mysqli_num_rows($RunUser) > 0){
            $RowUser = mysqli_fetch_array($RunUser);
            $UserName = $RowUser['userMail'];
            $UserPass = $RowUser['password'];
            $UserToken =$RowUser['token'];
            if($UserPass != $L_post02){
                $error = "<p class='StyleErrr'>عذراً يرجى كتابة كلمة السر بصورة صحيحة </p>";
            }else{  
                    setcookie('nameUser',$UserName, time() + (86400 * 365), "/");
                    setcookie('userToken',$UserToken, time() + (86400 * 365), "/");
                    setcookie('userLogin','1', time() + (86400 * 365), "/");
                echo'
                    <link rel="stylesheet" href="style.css" media="screen" />
                    <meta http-equiv="refresh" content="0, url=index.php" />
                ';
            }
        }else {
            $error = "<p class='StyleErrr'>المستخدم غير موجود  </p>";

        }
    }
}








?>





<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>اضافه مشرف</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
		<div class="inner">
		
			<div class="image-holder">
				<img src="images/log.png" alt="">
			</div>
			<form action="" method="post">
				<h3>تسجيل الدخول</h3>
				<h3><?php echo $error ;?></h3>
				<div class="form-wrapper">
					<input type="text"  name="UserName" placeholder="UserName " class="form-control">
					<i class="zmdi zmdi-email"></i>
				</div>
				<div class="form-wrapper">
					<i class="zmdi zmdi-lock"></i>
					<input type="password"  name="password" placeholder="رمز الدخول" class="form-control">
				</div>
			
	
				
				<input type ="submit" value=" دخول"  name ="submit" class ="button"/>
					
				
			</form>
		</div>
	</div>

</body>

</html>