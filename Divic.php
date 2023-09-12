
<?php
    if($_COOKIE["userLogin"] == 1){

    }else{
        echo'<meta http-equiv="refresh" content="0, url=login.php" />';
        exit();
    }

include "iraq.php";
    global $connect; 
    mysqli_set_charset($connect, 'utf8');

    $RandomNumber = rand(100,5000000);
    $NewToken = $RandomNumber;
    
    $error=null;
    $seccess=null;
    $a_post01 = @$_POST['Dicvname'];
    $a_post02 = @$_POST['nameDivic'];
    $a_post03 = @$_POST['date'];
    $a_post04 = @$_POST['HosNamelist'];
    $a_post00 = @$_POST['sernumper'];

    $u_img2 = @$_FILES['imgInp']['name'];
    $u_img_tmp2 = @$_FILES['imgInp']['tmp_name'];
    $target_dir = "itemImg/";
    $target_file2 =$target_dir.basename(@$_FILES["imgInp"]["name"]);
    $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
    $uploadOk = 1;
    $newimgproblem2 = uniqid('item-', true) 
    . '.' . strtolower(pathinfo(@$_FILES['imgInp']['name'], PATHINFO_EXTENSION));

    $GetProjectInfo = "SELECT `nameHos`,`token` FROM `add-h` ORDER BY `id` DESC";
    $RunProjectInfo = mysqli_query($connect, $GetProjectInfo);

    
    if(isset($_POST['add05'])){
        if(empty($a_post01) || empty($a_post02) || empty($a_post04) ){
            $error = "<p class='error'>يرجى عدم ترك الحقول فارغه</p>";
            $welcome = "";
        }else{
            
                if ($uploadOk == 1) {
                    move_uploaded_file($u_img_tmp2,"itemImg/$newimgproblem2");
                    # Check size image, number in bit.
                    if (@$_FILES["u_img"]["size"] > 500000) {
                        # IF Image png type.
                        if($imageFileType2 == "png"){
                            # Read images to Resize it.
                            function aborahaf($filename,$percent){
                                list($width, $height) = getimagesize($filename);
                                $newwidth = $width * $percent;
                                $newheight = $height * $percent;
                                $thumb = imagecreatetruecolor($newwidth, $newheight);
                                $source = imagecreatefrompng($filename);
                                // preserve transparency START
                                imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
                                imagealphablending($thumb, false);
                                imagesavealpha($thumb, true);
                                // preserve transparency end
                                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                                imagepng($thumb, $filename);
                            }
                            # location images, Resize images to half 0.5.
                            aborahaf("itemImg/$newimgproblem2", 0.5);
                        }
                        # IF Image gif type.
                        if($imageFileType2 == "gif"){
                            # Read images to Resize it.
                            function aborahaf($filename,$percent){
                                list($width, $height) = getimagesize($filename);
                                $newwidth = $width * $percent;
                                $newheight = $height * $percent;
                                $thumb = imagecreatetruecolor($newwidth, $newheight);
                                $source = imagecreatefromgif($filename);
                                // preserve transparency START
                                imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
                                imagealphablending($thumb, false);
                                imagesavealpha($thumb, true);
                                // preserve transparency end
                                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                                imagegif($thumb, $filename);
                            }
                            aborahaf("itemImg/$newimgproblem2", 0.5);
                        }
                        # IF Image jpg type or jpeg type.
                        if($imageFileType2 == "jpg" || $imageFileType2 == "jpeg"){
                            # Read images to Resize it.
                            function aborahaf($filename,$percent){
                                list($width, $height) = getimagesize($filename);
                                $newwidth = $width * $percent;
                                $newheight = $height * $percent;
                                $thumb = imagecreatetruecolor($newwidth, $newheight);
                                $source = imagecreatefromjpeg($filename);
                                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                                imagejpeg($thumb, $filename);
                            }
                            # location images, Resize images to half 0.5.
                            aborahaf("itemImg/$newimgproblem2", 0.5);
                        }
                    }
                    $insertData = "INSERT INTO `adddiv`
                (
                    token,
                    div_name,
                    div_namepers,
                    div_photo,
                    div_dete,
                    serialnumber,
                    div_hosname
                ) VALUES
                (
                    '$NewToken',
                    '$a_post01',
                    '$a_post02',
                    '$newimgproblem2',
                    '$a_post03',
                    '$a_post00',
                    '$a_post04'
                )";
                if(mysqli_query($connect, $insertData)){
                     $seccess = '<p class="seccess">تم اضافة الجهاز بنجاح</p>';
                    echo'<meta http-equiv="refresh" content="1, url=index.php" />';
                }else{
                    $error ='لم يتم اضافة الجهاز بنجاح';
                    echo'<meta http-equiv="refresh" content="1, url=Divic.php" />';
                    exit();
                }
                }
                
            }

        }
    




?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/6c84e23e68.js" crossorigin="anonymous"></script>
    <title>اضافه جهاز</title>
</head>
<body>
    <div class="topshert">
        <div class="navbar">
        <div><i class="fa-solid fa-house iconhome" style="color: #ffffff;"></i></div>
        <div><h3 class="username"> <a href="index.php">الصفحةالرئيسية</a> </h3></div>
        </div>
    </div>
    <?php echo $error;?>
    <?php echo $seccess ;?>
    <div class="HospetalPage" id="main-page">
        <div class="title">اضافة مجهز</div>
        <div class="HosCart div-page">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="nameDevices">
                    <input class="marg-input" name="Dicvname" type="text" placeholder="اسم الجهاز">
                    <input type="text" name="nameDivic" placeholder="اسم المجهز">
                </div>
                <div class="nameDevices">
                    <label for="imgdev" name="imgInp"  class="marg-input">صورة الجهاز</label>
                    <input type="file"  name="imgInp" id="imgdev" style="display: none;">
                    <input type="date" name="date" name="" id="">
                </div>
                <div class=" nameDevices">
                    <select id="hosp" class="marg-input" name="HosNamelist">
                    <option disabled selected >اسم المستشفى </option>
                    <?php
                    while($RowAllProInfo = mysqli_fetch_array($RunProjectInfo)){
                    echo'
                        <option  value=';echo  $RowAllProInfo['token'];echo'>';echo $RowAllProInfo['nameHos'];echo'</option>
                        ';
                    }
                    ?>
                    </select>
                    <input type="text" name="sernumper" placeholder="رقم أو كود الجهاز">
                </div>
                <div class="btnseNd" style="justify-content: center;">
                    <input type="submit"  class="submit" name="add05" value="اضافه">
                </div>
              
              </form>
        </div>
    </div>
    
</body>
</html>