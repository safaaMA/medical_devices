<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>عرض الصورة</title>
</head>
<body>
<?php
if($_COOKIE["userLogin"] == 1){
    include "iraq.php"; 
    global $connect; 
    mysqli_set_charset($connect, 'utf8');

    $GetToken = $_GET["T"];
    $GetProInfo = "SELECT * FROM `adddiv` WHERE div_photo = '$GetToken'";
    $RunProInfo = mysqli_query($connect, $GetProInfo);

    if(mysqli_num_rows($RunProInfo) > 0){
        $row = mysqli_fetch_assoc($RunProInfo);
        $imagePath = $row['div_photo']; // تحديث المتغير هنا
        echo '
        <div class="PhotpDivC">
        <img class="PotoD" src="./itemImg/'.$imagePath. '" alt="لم يتم اضافه صوره للجهاز">
        </div>
        ';

    } else {
        echo "لا يوجد صورة متاحة لهذا التوكن.";
    }
} else {
    echo '<meta http-equiv="refresh" content="0, url=login.php" />';
    exit();
}
?>
</body>
</html>

