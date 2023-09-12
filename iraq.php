<?php
    $host = "localhost"; // اسم المستظيف
    $username = "root"; // اسم المستخدم
    $password = ""; // باسورد الاتصال بقاعدة البيانات
    $namedata = "hamode"; //اسم قاعدة البيانات 
    $connect = mysqli_connect($host,$username,$password,$namedata) OR die("هناك خطأ في الاتصال");
?>