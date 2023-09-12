<?php
    if($_COOKIE["userLogin"] == 1){

    }else{
        echo'<meta http-equiv="refresh" content="0, url=login.php" />';
        exit();
    }

    include "iraq.php"; 
    global $connect; 
    mysqli_set_charset($connect, 'utf8');


    $GetHos = "SELECT * FROM `add-h` ORDER BY `id` DESC";
    $RunGet = mysqli_query($connect, $GetHos);


    $Token = @$_GET['T'];
    if(@$_GET['D'] == 'D'){
        if(isset($_POST['delete2'])){
            $Delete = "DELETE FROM `add-h` WHERE token = '$Token'";
            $RunDelete = mysqli_query($connect, $Delete);
            echo'<meta http-equiv="refresh" content="0; url=AllHos.php" />';
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
                        <th><a class="No" href="AllHos.php">كلا</a></th>
                    </tr>
                </table>
            </form>
        </div>
        </div>
    ';
    
   }
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
    <title>المستشفيات</title>
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
                    <?php $masseg ?>
                </div>
                
                <!-- <div class="HospetalPage  main-page " id="main-page">                        
                        <div class="manag-hos HospetalPage " id="manag-hos">
                        <div class="title"> ادارة المستشفيات</div>
                        <div class="main-row tebletop">
                            <div class="id">ت</div>
                            <div class="name">اسم المستشفى</div>
                            <div class="dele">حذف</div>
                            <div class="edi">تعديل</div>
                        </div>
                        <div class="main-row">
                            <div>1</div>
                            <div>مستشفى الشفاء</div>
                            <div><a class="a-manag delete" href="">حذف</a></div>
                            <div><a class="a-manag edit" href="">تعديل</a></div>
                        </div>
                        <div class="main-row">
                            <div>2</div>
                            <div>مستشفى الشفاء</div>
                            <div><a class="a-manag delete" href="">حذف</a></div>
                            <div><a class="a-manag edit" href="">تعديل</a></div>
                        </div>
                        <div class="main-row">
                            <div>3</div>
                            <div>مستشفى الشفاء</div>
                            <div><a class="a-manag delete" href="">حذف</a></div>
                            <div><a class="a-manag edit" href="">تعديل</a></div>
                        </div>
                        <div class="main-row">
                            <div>4</div>
                            <div>مستشفى الشفاء</div>
                            <div><a class="a-manag delete" href="">حذف</a></div>
                            <div><a class="a-manag edit" href="">تعديل</a></div>
                        </div>

                        <div class="main-row">
                            <div>5</div>
                            <div>مستشفى الشفاء</div>
                            <div><a class="a-manag delete" href="">حذف</a></div>
                            <div><a class="a-manag edit" href="">تعديل</a></div>
                        </div>
       
                        <div class="main-row">
                            <div>6</div>
                            <div>مستشفى الشفاء</div>
                            <div><a class="a-manag delete" href="">حذف</a></div>
                            <div><a class="a-manag edit" href="">تعديل</a></div>
                        </div>
                        <div class="main-row">
                            <div>7</div>
                            <div>مستشفى الشفاء</div>
                            <div><a class="a-manag delete" href="">حذف</a></div>
                            <div><a class="a-manag edit" href="">تعديل</a></div>
                        </div>
                    </div>
                     

                    
                </div> -->
                <table>
  <caption>ادارة المستشفيات</caption>
  <thead>
    <tr>
      <th scope="col">ت</th>
      <th scope="col">اسم المستشفى</th>
      <th scope="col">حذف</th>
      <th scope="col">تعديل</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $totalDevices =0;
    $Number = 1;
    while($Hos = mysqli_fetch_array($RunGet)){
    echo'
    <tr>
      <td data-label="ت">';echo $Number;echo'</td>
      <td data-label="اسم المستشفى">';echo $Hos['nameHos'];echo' </td>
      ';
        
      if($UserType == "1" || $UserType == "2" ) {
        echo '      <form action="" method="post" enctype="multipart/form-data">
        <td data-label="حذف"><a class="DeleteR">حذف</a></td>
        </form>
  
        <td data-label="تعديل"><a class="DeleteR">تعديل</a></td>';    
      } else {
           echo '      <form action="" method="post" enctype="multipart/form-data">
           <td class ="tdcenter"><a class="Delete DeleteTable"  href="AllHos.php?D=D&T='; echo $Hos['token']; echo'">حذف</a></td>
           </form>
     
           <td lass ="tdcenter"><a class="Edit EditTable" href="editHos.php?D=D&T='; echo $Hos['token']; echo'">تعديل</a></td>';

      }
      echo'

      
    </tr>
    ';
    $Number++;
    $totalDevices ++ ;
}

?>
      <div class="NumberDiv"> <h1 class ="t-th">عدد المستشفيات الكلي  <span><?php echo $totalDevices ; ?></span> </h1></div>

  </tbody>
</table>
            </div>
        </div>
</body>
<script src="js.js"></script>
</html>