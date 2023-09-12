<?php
    if($_COOKIE["userLogin"] == 1){

    }else{
        echo'<meta http-equiv="refresh" content="0, url=login.php" />';
        exit();
    }

    include "iraq.php"; 
    global $connect;
    mysqli_set_charset($connect, 'utf8');
    $error=null;
    $massige=null;
    $Token = @date("ymdhis");
    $RandomNumber = rand(100,200);
    $NewToken = $Token . $RandomNumber;
    
    $a_post01 = @$_POST['nameho'];

    if(isset($_POST['sendnameho'])){
        if(empty($a_post01)){
            $error = "<p class='error'>يرجى عدم ترك الحقول فارغه <i class='fa-solid fa-circle-exclamation'></i> </p>";
        }else{
            $InsertData = "INSERT INTO `add-h`
            (
                token,
                nameHos
            ) VALUES
            (
                '$NewToken',
                '$a_post01'
            )";
            if(mysqli_query($connect, $InsertData)){
                echo'<meta http-equiv="refresh" content="0, url=index.php" />';
                exit();
            };
        };
    };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/6c84e23e68.js" crossorigin="anonymous"></script>
    <title>اضافه مستشفى    </title>
</head>
<body>
    <div class="topshert">
        <div class="navbar">
        <div><i class="fa-solid fa-house iconhome" style="color: #ffffff;"></i></div>
        <div><h3 class="username"> <a href ="index.php">الصفحةالرئيسية</a> </h3></div>
        </div>
    </div>
    <?php echo $error; ?>
    <?php echo $massige; ?>

    <div class="form-add-hos" id="add-hos" >
        <div class="title">اضافه مستشفى</div>
        <form action="" method="post">
            <div class="name-add-h">
                <input type="text" name="nameho" placeholder="اسم المستشفى">
            </div>
            <div style="text-align: center"><input class="submit H" type="submit" value="اضافه" name="sendnameho"></div>
        </form>
     </div>
</body>
</html>