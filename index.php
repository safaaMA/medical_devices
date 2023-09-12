<?php
    if(@$_COOKIE["userLogin"] == 1){

    }else{
        echo'<meta http-equiv="refresh" content="0, url=login.php" />';
        exit();
    }

    include "iraq.php"; 
    global $connect; 
    mysqli_set_charset($connect, 'utf8');


    $GetProjectInfo = "SELECT * FROM `add-h` ORDER BY `id` DESC";
    $RunProjectInfo = mysqli_query($connect, $GetProjectInfo);


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
    <title>Administration</title>
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
                <?php
                      $CookiesUser = $_COOKIE["userToken"];

                      $GetUserInfo = "SELECT * FROM `uswes` WHERE token='$CookiesUser'";
                      $RunUserInfo = mysqli_query($connect, $GetUserInfo);
                      $RowUserInfo = mysqli_fetch_array($RunUserInfo);
                      $UserType = $RowUserInfo["Rank"];
                      
                      if($UserType == "1") {
                          
                      }elseif ($UserType == "2") {

                      } else {
                            echo '';
                            echo '<li><div class="li-a4"><a href="Divic.php">اضافة مجهز</a></div> <div class="li-i"><i class="fa-solid fa-user-nurse" style="color: #ffffff;"></i></div></li>';
                            echo '<li class="li-add"><div class="li-a5"><a href="add-h.php">اضافه مستشفى</a></div> <div class="li-i"><i class="fa-sharp fa-solid fa-kit-medical" style="color: #ffffff;"></i></div></li>';
                            echo '<li><div class="li-a6"><a href="log.php">اضافه مدير</a></div> <div class="li-i"><i class="fa-solid fa-user-doctor" style="color: #ffffff;"></i></div></li>';
                            echo '<li><div class="li-a6"><a href="Users.php"> ادارة المستخدمين</a></div> <div class="li-i"><i class="fa-solid fa-user-doctor  style="color: #ffffff;"></i></div></li>';


                      }
                      
                      
                                  
                                
                ?>
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
                        
                </h3></div>
                    </div>
                </div>
                
                <div class="HospetalPage  main-page " id="main-page">
                <table>
  <caption>ادارة المستشفيات</caption>
  <thead>
    <tr>
                    <th scope="col">ت</th>
                    <th scope="col">اسم المستشفى</th>
                    <th scope="col">اجراء </th>
                    </tr>
                    </thead>
  <tbody>
                    <?php
                    $Number = 1;
                    while($RowAllProInfo = mysqli_fetch_array($RunProjectInfo)){
                    echo'
       <tr>
      <td data-label="ت">';echo $Number;echo'</td>
      <td data-label="اسم المستشفى" >';echo $RowAllProInfo['nameHos'];echo' </td>
      <td data-label=" اجراء">'; echo' <a class="showDiv" href="showdiv.php?T=';echo $RowAllProInfo['token']; echo'">عرض الاجهزه </a></td>
      </tr>
                      
                                ';
                                $Number++;

                            }
                            ?>

                      </tbody>
</table>                
                </div>
            </div>
        </div>
</body>
<script src="js.js"></script>
</html>