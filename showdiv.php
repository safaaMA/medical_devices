<?php
    if($_COOKIE["userLogin"] == 1){

    }else{
        echo'<meta http-equiv="refresh" content="0, url=login.php" />';
        exit();
    }

    include "iraq.php"; 
    global $connect; 
    mysqli_set_charset($connect, 'utf8');


    $GetToken = $_GET["T"];
    $GetProInfo = "SELECT * FROM adddiv  WHERE div_hosname = '$GetToken'ORDER BY `adddiv`.`id` DESC ";
    $RunProInfo = mysqli_query($connect, $GetProInfo);
    

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/6c84e23e68.js" crossorigin="anonymous"></script>
    <title>الاجهزه</title>
</head>
<body>
    <div class="topshert">
        <div class="navbar">
        <div><i class="fa-solid fa-house iconhome" style="color: #ffffff;"></i></div>
        <div><h3 class="username"> <a href="index.php">الصفحةالرئيسية</a> </h3></div>
        </div>
    </div>
    <div class="HospetalPage  main-page " id="main-page">
      
  
      <table>
        
        <thead>
    <tr>
      <th scope="col">ت</th>
      <th scope="col">اسم المجهز</th>
      <th scope="col">اسم الجهاز </th>
      <th scope="col"> تاريخ التجهيز </th>
      <th scope="col">  سيريال نمبر </th>
      <th scope="col">صورة الجهاز</th>
    </tr>
  </thead>
  
  <div class="HosCart div-page">
    <?php
        $totalDevices = 0;
        $Number = 1;
        while($Run = mysqli_fetch_array($RunProInfo)){
        echo'
        <tr>
          <td data-label="ت" >';echo $Number;echo'</td>
          <td data-label="اسم المجهز">';echo $Run['div_namepers'];echo'</td>
          <td data-label="اسم الجهاز">';echo $Run['div_name'];echo' </td>
          <td data-label="تاريخ التجهيز">';echo $Run['div_dete'];echo'</td>
          <td data-label="SN">';echo $Run['serialnumber'];echo'</td>
          <td data-label=" صوره الجهاز"><a class="PhotoDiv" href="Photo.php?T=';echo $Run['div_photo']; echo'">عرض</a></td>
        </tr>
                ';
                $totalDevices ++ ;
                $Number++;
            }
            ?>
                
                
              </div>
            </tbody>
          </table> 

<div class="NumberDiv privetDiv"> <h1 class ="t-th ">عدد الاجهزه في هذه المستشفى  <span class="spanN"><?php echo $totalDevices ; ?></span> </h1></div>
</div>
<script src="js.js" defert></script>


</body>

</html>