<?php
    if($_COOKIE["userLogin"] == 1){

    }else{
        echo'<meta http-equiv="refresh" content="0, url=login.php" />';
        exit();
    }

    include "iraq.php"; 
    global $connect; 
    mysqli_set_charset($connect, 'utf8');


    $GetDiv = "SELECT * FROM `adddiv` ORDER BY `id` DESC";
    $RunDiv = mysqli_query($connect, $GetDiv);


    $Token = @$_GET['T'];
    if(@$_GET['D'] == 'D'){
        if(isset($_POST['delete2'])){
            $Delete = "DELETE FROM `adddiv` WHERE token = '$Token'";
            $RunDelete = mysqli_query($connect, $Delete);
            echo'<meta http-equiv="refresh" content="0; url=AllDiv.php" />';
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
                        <th><a class="No" href="AllDiv.php">كلا</a></th>
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

    <title>الاجهزه</title>
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
                
                <table>
  <caption>ادارة الاجهزه</caption>  
  </div>
  <div class="search-container">
  <input type="text" id="searchInput" placeholder="ابحث عن جهاز" oninput="searchDevices()">
    </div>

  <thead>
    <tr>
        <th scope="col">اسم المجهز</th>
        <th scope="col">اسم الجهاز </th>
        <th scope="col">SN</th>
      <th scope="col"> تاريخ التجهيز </th>
      <th scope="col">  اسم المستشفى </th>
      <th scope="col">حذف</th>
      <th scope="col">تعديل</th>
    </tr>
  </thead>
  
  
  <?php
  $totalDevices = 0;
  $Number = 1;
    while($Divi = mysqli_fetch_array($RunDiv)){
        $HospitalToken = $Divi['div_hosname'];
        $GetHospitalNameQuery = "SELECT `nameHos` FROM `add-h` WHERE token='$HospitalToken'";
        $RunHospitalNameQuery = mysqli_query($connect, $GetHospitalNameQuery);
        $HospitalName = "";
        if ($HospitalRow = mysqli_fetch_array($RunHospitalNameQuery)) {
            $HospitalName = $HospitalRow['nameHos'];
        }
    echo'
    <tr>
    <td data-label="اسم المجهز">';echo $Divi['div_namepers'];echo' </td>
    <td data-label="اسم الجهاز">';echo $Divi['div_name'];echo' </td>
    <td data-label="SN">';echo $Divi['serialnumber'];echo'</td>
    <td data-label="تاريخ التجهيز">';echo $Divi['div_dete'];echo' </td>
      <td data-label=" اسم المستشفى">';echo $HospitalName ;echo' </td>
      ';
        
      if($UserType == "1" || $UserType == "2" ) {
        echo '      <form action="" method="post" enctype="multipart/form-data">
        <td ><a class="DeleteR">حذف</a></td>
        </form>
  
        <td data-label="تعديل"><a class="DeleteR">تعديل</a></td>';    
      } else {
           echo '<form action="" method="post" enctype="multipart/form-data">
           <td class ="tdcenter"><a class="Delete DeleteTable"  href="AllDiv.php?D=D&T='; echo $Divi['token']; echo'">حذف</a></td>
           </form>
     
           <td class ="tdcenter" ><a class="Edit EditTable" href="editDiv.php?D=D&T='; echo $Divi['token']; echo'">تعديل</a></td>';

      }
      echo'

    </tr>
    ';
    $Number++;
    $totalDevices++;

}
?>

<div class="NumberDiv"> <h1 class ="t-th">عدد الاجهزه الكلي  <span><?php echo $totalDevices ; ?></span> </h1></div>
</>
</table>
</div>
</div>
<tbody>
            <?php

            ?>
  </tbody>

        <script src="js.js"></script>
<script>
function searchDevices() {
    var searchText = document.getElementById('searchInput').value.toLocaleLowerCase();

    var rows = document.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var cells = row.getElementsByTagName('td');

        var deviceName = cells[1].textContent.toLocaleLowerCase();
        var Name = cells[0].textContent.toLocaleLowerCase();
        var SN = cells[2].textContent.toLocaleLowerCase();

        if (deviceName.includes(searchText) || Name.includes(searchText) || SN.includes(searchText) ) {
            row.style.display = ''; 
        } else {
            row.style.display = 'none'; 
        }
    }

}


</script>
</body>

</html>