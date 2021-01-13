
<header id="header">

<div class="container">
    <div style="" class="l">
        <a class="logo" href="../index.php">
            <img class="logo-img" style="width: 100px; height: 100px" src="../upload/logo.png" alt="Trang chủ">
        </a>
        <a style="font-size: 40px" href="../index.php">Bảnh Food</a>
         <div class="login">
            <?php
                if (isset($_SESSION['name'])) {
                    $Username = $_SESSION['name'];
                    echo "Xin chào " . $Username;
                    echo ',<a class="item-bar" href="dangxuat.php">Đăng xuất</a>';
                } else {
                    echo '<a class="item-bar" href="login.php">Đăng nhập</a>';
                    echo '<a class="item-bar" href="dangki.php">Đăng kí</a>';
                }
                ?>
         </div>
            <div style="" class="timkiem">
                <form action="timkiem.php" method="GET">
                    <input class="box" type="text" placeholder="Tìm kiếm" name="txtTimKiem">
                </form>
            </div>
    </div>
    
     <nav id="sidebar">
        <ul>
            <li><a href="garan.php">Gà rán</a></li>
            <li><a href="miy.php">Mì ý</a></li>
            <li><a href="bugercom.php">Buger và cơm</a></li>
            <li><a href="trangmieng.php">Tráng miệng</a></li>
            <li><a href="nuoc.php">Đồ uống</a></li>
            <?php
                if (isset($_SESSION['name'])) {
                    echo '<li><a href="giohang.php">Giỏ Hàng</a></li>';
                }
            ?>
        </ul>
    </nav>

</div>
</header>
