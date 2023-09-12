<?php
    if($_COOKIE["userLogin"] == 1){

    }else{
        echo'<meta http-equiv="refresh" content="0, url=login.php" />';
        exit();
    }

    include "iraq.php"; 
    global $connect; 
    mysqli_set_charset($connect, 'utf8');


    $GetUsers = "SELECT * FROM `uswes` ORDER BY `id` DESC";
    $RunGet = mysqli_query($connect, $GetUsers);

    $Token = @$_GET['T'];

    if(@$_GET['D'] == 'D'){
        if(isset($_POST['delete2'])){
            $Delete = "DELETE FROM `uswes` WHERE token = '$Token'";
            $RunDelete = mysqli_query($connect, $Delete);
            echo'<meta http-equiv="refresh" content="0; url=Users.php" />';
            exit();
        }
        echo'
        <link rel="stylesheet" href="style.css" media="screen" />
        <div class="containtshoe">
        <div class="sure">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="YouSure">
                    <tr >
                        <th colspan="2"><p class="sure2">هل انت متأكد من الحذف</p></th>
                    </tr>
                    <tr  class="areok"   >
                        <th><input class="Yas" type="submit" value="نعم" name="delete2" /></th>
                        <th><a class="No" href="Users.php">كلا</a></th>
                    </tr>
                </table>
            </form>
        </div>
        </div>
    ';
   }



   $CookiesUser = $_COOKIE["userToken"];

   $GetUserInfo = "SELECT * FROM `uswes` WHERE token='$CookiesUser'";
   $RunUserInfo = mysqli_query($connect, $GetUserInfo);
   $RowUserInfo = mysqli_fetch_array($RunUserInfo);


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/6c84e23e68.js" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <title>موقعي</title>
</head>
<body>
    <div class="container">
        <!-- ---------Left---------------- -->
        <div class="LeftLest">
            <div class="logo"><img src="logo.png" alt=""></div>
            <ul>
            <li><div class="li-a1" ><a href ="index.php"  >الصفحة الرئيسية</a></div> <div class="li-i"> <i class="fa-solid fa-house" style="color: #ffffff;"></i></div></li>
                <li><div class="li-a2"><a href="AllHos.php">المستشفيات</a></div> <div class="li-i"><i class="fa-solid fa-hospital" style="color: #ffffff;"></i></div></li>
                <li ><div class="li-a3"><a href="AllDiv.php">الاجهزه</a></div> <div class="li-i"><i class="fa-solid fa-microscope" style="color: #ffffff;"></i></div></li>
                <li><div class="li-a4"><a href="Divic.php">اضافة مجهز</a></div> <div class="li-i"><i class="fa-solid fa-user-nurse" style="color: #ffffff;"></i></div></li>
                <li class="li-add"><div class="li-a5"><a href="add-h.php">اضافه مستشفى</a></div> <div class="li-i"><i class="fa-sharp fa-solid fa-kit-medical" style="color: #ffffff;"></i></div></li>
                <li><div class="li-a6"><a href="log.php">اضافه مدير</a></div> <div class="li-i"><i class="fa-solid fa-user-doctor  style="color: #ffffff;"></i></div></li>
                <li><div class="li-a6"><a href="Users.php"> ادارة المستخدمين</a></div> <div class="li-i"><i class="fa-solid fa-user-doctor  style="color: #ffffff;"></i></div></li>
                <li class="li-log"><div class="li-a7"><a href="logOut.php">تسجيل خروج</a></div> <div class="li-i"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></div></li>
            </ul>
        </div>
        <!-- ---------Right---------------- -->
        <div class="RightPage">
            <div class="topPage">
                <div class="topshert">
                    <div class="account">
                        <div class="list"><i class="fa-solid fa-bars"></i></div>
                    <div><img class="userimg" src="cc.JPG" alt=""></div>
                    <div><h3 class="username">
                        <?php $UserName = $RowUserInfo["userName"];
                            echo $UserName;

                      ?>
                        
                </h3></div>                    </div>
                </div>
                

                <table>
  <caption>ادارة المستخدمين</caption>
  <thead>
    <tr>
    <th scope="col">ت</th>
      <th scope="col">اسم المستخدم</th>
      <th scope="col"> User</th>
      <th scope="col">  الرتبه </th>
      <th scope="col">حذف</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $totalDevices =0;
    $Number = 1;
    while(    $User = mysqli_fetch_array($RunGet)    ){
    echo'
    
    <tr>
      <td data-label="ت">';echo $Number;echo'</td>
      <td data-label="اسم المستخدم">';echo  $User['userName'];echo' </td>
      <td data-label=" User ">';echo $User['userMail'];echo'</td>
      <td data-label="الرتبه">';echo $User['Rank'];echo'</td>
      <form action="" method="post" enctype="multipart/form-data">
      <td lass ="tdcenter"><a class="Delete DeleteTable"  href="Users.php?D=D&T='; echo $User['token']; echo'">حذف</a></td>
      </form>      
    </tr>
    ';
    $Number++;
    $totalDevices ++;


}

?>
      <div class="NumberDiv"> <h1 class ="t-th">عدد المستخدمين الكلي  <span><?php echo $totalDevices ; ?></span> </h1></div>

  </tbody>
</table>
            </div>
        </div>
</body>
<script src="js.js"></script>
</html>