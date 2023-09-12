<?php
    if($_COOKIE["userLogin"] == 1){

    }else{
        echo'<meta http-equiv="refresh" content="0, url=login.php" />';
        exit();
    }

    include "iraq.php"; 
    global $connect; 
    mysqli_set_charset($connect, 'utf8');
    $error =null;
    $U_Post01 = @$_POST['userName'];
    $U_Post02 = @$_POST['Email'];
    $U_Post03 = @$_POST['password'];
    $U_Post04 = @$_POST['conformPass'];
    $U_Post05 = @$_POST['Rlist'];


    $RandomNumber = rand(100,10000000);
    $NewToken = $RandomNumber;

    if(isset($_POST['submit'])){

		if(empty($U_Post01) || empty($U_Post02) || empty($U_Post03) ||empty($U_Post04)||empty($U_Post05)){
            $error = "<p class='error'>يرجى عدم ترك الحقول فارغه</p>";
            $welcome = "";
        }else{
            $query = "SELECT * FROM uswes WHERE userMail = '$U_Post02'";
            $result = mysqli_query($connect, $query);
            
            if(mysqli_num_rows($result) > 0){
                $error = "<p class='error'>اليوزر متكرر</p>";
            } else {

                if($U_Post03 == $U_Post04){
                    $insertData = "INSERT INTO `uswes`
                       (
                           token,
                           userName,
                           userMail,
                           password,
                           conformPass,
                           Rank
                       ) VALUES
                       (
                           '$NewToken',
                           '$U_Post01',
                           '$U_Post02',
                           '$U_Post03',
                           '$U_Post04',
                           '$U_Post05'
                       )";
                       if(mysqli_query($connect, $insertData)){
                           echo'<link rel="stylesheet" href="css/style.css" media="screen" />';
                           $welcome = "<h1>Welcome</h1>";
                           echo'<meta http-equiv="refresh" content="0, url=Users.php" />';
                           exit();
                       }else{
                           echo'<link rel="stylesheet" href="style.css" media="screen" />';
                           echo'لم يتم اضافة';
                           echo'<meta http-equiv="refresh" content="0, url=index.php" />';
                           exit();
                       }
           
                   }else{
                           $error = "<p class='error'> يرجى كتابه الرمز بالشكل الصحيح</p>";
           
                   }
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
				<h3> اضافه الاعضاء او مشرف من قبل الادمن</h3>
				<h3><?php echo $error ;?></h3>
				<div class="form-wrapper">
					<input type="text" name="userName" placeholder="الاسم " class="form-control">
					<i class="zmdi zmdi-account"></i>
				</div>
				<div class="form-wrapper">
					<input type="text"  name="Email" placeholder="UserName " class="form-control">
					<i class="zmdi zmdi-email"></i>
				</div>
				<div class="form-wrapper">
					<input type="password"  name="password" placeholder="رمز الدخول" class="form-control">
					<i class="zmdi zmdi-lock"></i>
				</div>
				<div class="form-wrapper">
					<input type="password"  name="conformPass" placeholder=" تاكيد الرمز" class="form-control">
					<i class="zmdi zmdi-lock"></i>
				</div>
				
				<div class="form-wrapper">
				<select id="" class="marg-input" name="Rlist">
                    <option disabled selected >الرتبه</option>
                    <option  value ="1" >مشرف</option>
                    <option  value ="2" >مشاهد</option>            
                    </select>
                    <i class="zmdi zmdi-account"></i>
				</div>

				<input type ="submit" value=" اضافه"  name ="submit" class ="button"/>
					
				
			</form>
		</div>
	</div>

</body>

</html>