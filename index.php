<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="public/css/frontend.css">
    <link rel="stylesheet" href="css/frontend.css">
        <link href="https://fonts.googleapis.com/css2?family=Literata:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        include_once'public/connect.php';
     ?>
    <header id="header">
        <div>
            <a class="logo" href="index.php">
            <img class="logo-img" style="width: 100px; height: 100px" src="upload/logo.png" alt="Trang chủ">
        </a>
            <a style="font-size: 40px" href="index.php">Bảnh Food</a>
        <div class="login">
            <?php
                if (isset($_SESSION['name'])) {
                    $name=$_SESSION['name'];
                    echo "Xin chào ".$name;
                    echo ',<a class="item-bar" href="public/dangxuat.php" onclick="return confirm("Bạn có thực sự muốn đăng xuất ?");">Đăng xuất</a>';
                } else {
                    echo '<a class="item-bar" href="public/login.php">Đăng nhập</a>';
                    echo '<a class="item-bar" href="public/dangki.php">Đăng kí</a>';
                }
            ?>
         </div>   
    </div>

    </div>
    </header>
    <div class="content" >   
        <a href="public/garan.php"><img style="" class="item " src="upload/garan.jpg" alt="gà rán"></a>
        <a href="public/miy.php"><img style="" class="item " src="upload/miy.jpg" alt="mì ý"></a>
        <a href="public/bugercom.php"><img style="" class="item " src="upload/buger.jpg" alt="Bugercom"></a>
        <a href="public/trangmieng.php"><img style="" class="item " src="upload/montrangmieng.jpg" alt="Tráng miệng"></a> 
         
    </div>
    <?php
        include_once 'public/footer.php';
    ?>
</body>