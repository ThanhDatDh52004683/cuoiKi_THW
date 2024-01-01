<?php 
if (session_status() === PHP_SESSION_NONE) {
        session_start();
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../view/images/logoben.png">

    <link rel="stylesheet" href="../view/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Shop LapTop Luxyry</title>
    <style>
        .dangnhap img {
            width: 40px;
            margin-top: 10%;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .dangnhap {
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="container">

        <header>
            <div class="reponsi_phone">
                <div class="phone">
                    <div id="toggle"><i class="fa-solid fa-bars"></i></div>
                    <nav class="menu1">
                        <ul>
                            <div class="menu_title">
                                <h2>Menu</h2>
                                <p class="close"><i class="fa-solid fa-xmark"></i></p>
                            </div>
                            <li><a href="../controller/index.php">Trang chủ</a></li>
                            <li class="repon_login">
                                <?php
                                if (isset($_SESSION['name'])) {
                                    //hình avata
                                    // echo '
                                    //     <a href="../controller/index.php?act=login" class="dangnhap">
                                    //     <img  src="../view/images/' . $_SESSION['avata'] . '">
                                    //     </a><span></span>
                                    //     <a href="../controller/index.php?act=register">ĐĂNG KÝ</a>';

                                    echo '
                                        <a href="../controller/index.php?act=login" class="dangnhap">
                                        <i class="fa-solid fa-user"></i>
                                        </a><span></span>
                                        <a href="../controller/index.php?act=register">ĐĂNG KÝ</a>';
                                } else {
                                    echo '
                                    <a href="../controller/index.php?act=login"><i class="fa-solid fa-user"></i> Đăng nhập</a>
                                    <a href="../controller/index.php?act=register"><i class="fa-solid fa-user-plus"></i> Đăng ký</a>
                                    ';
                                }
                                ?>

                            </li>
                            <?php
                            $dsdanhmmuc = danhmuc_showAll();
                            foreach ($dsdanhmmuc as $row) {
                                echo '<li><a href="../controller/index.php?act=sanpham&id=' . $row['iddanhmuc'] . '">' . $row['tendanhmuc'] . '</a></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                    <a href="../controller/index.php" class="logo"><img src="../view/images/logotong.png" alt=""></a>
                    <a href="../controller/index.php?act=cart"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </div>
            <div class="top">
                <!-- <div class="header-top">
                    <span class="tille-top">TIN MỚI:</span>
                    <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="4">
                        <a href="../controller/index.php?act=baiviet" title="Bán balo tại thành phố Hồ Chí Minh">Bán balo tại Thành phố Hồ Chí Minh</a>
                        <span class="hotline-space"></span>
                        <a href="../controller/index.php?act=baiviet" title="Mẫu balo Cho những chuyến đi chơi mùa hè này">Mẫu balo Cho những chuyến đi chơi mùa hè này</a>
                        <span class="hotline-space"></span>
                        <a href="../controller/index.php?act=baiviet" title="Top vali kéo size đại siêu
                            bền dùng trong mùa hè 2022">Top vali kéo size đại siêu
                            bền dùng trong mùa hè 2022</a>
                    </marquee>
                </div> -->
                <div class="header-top-main">
                    <div class="hotline-header">
                        <span>LAPTOP LUXURY KÍNH CHÀO QUÝ KHÁCH</span><span class="hotline-space"></span>
                        <span>MIỄN PHÍ SHIP HÀNG</span><span class="hotline-space"></span>
                        <span>
                            <p>GỌI MUA HÀNG:&nbsp;&nbsp;<span style="color:#FFA500;"><span style="font-size:16px;"><strong>0379423807&nbsp;&nbsp;</strong></p>
                        </span>
                    </div>
                </div>
            </div>
            <div class="middle">
                <div class="anh"><a href="../controller/index.php"> <img src="../view/images/logotong.png" alt=""></a>
                </div>
                <form action="../controller/index.php?act=seach" method="POST">
                    <input type="text" name="filter" placeholder="Tìm kiếm sản phẩm...">
                    <input type="submit" name="timkiem" value="Tìm Kiếm" style="color:white;">
                </form>
                <a href="../controller/index.php?act=cart"><i class="fa-solid fa-cart-shopping"></i> GIỎ HÀNG</a>
                <div class="login">
                    <?php
                    if (isset($_SESSION['name'])) {
                        //hình avata
                        // echo '
                        //     <a href="../controller/index.php?act=login" class="dangnhap">
                        //     <img  src="../view/images/' . $_SESSION['avata'] . '">
                        //     </a><span></span>
                        //     <a href="../controller/index.php?act=register">ĐĂNG KÝ</a>';

                        echo '
                            <a href="../controller/index.php?act=login" class="dangnhap">
                            <i class="fa-solid fa-user"></i>
                            </a><span></span>
                            <a href="../controller/index.php?act=register">ĐĂNG KÝ</a>';
                    } else {
                        echo '<i class="fa-solid fa-user"></i>&nbsp;
                            <a href="../controller/index.php?act=login" class="dangnhap">ĐĂNG NHẬP</a><span></span>
                            <a href="../controller/index.php?act=register">ĐĂNG KÝ</a>';
                    }
                    ?>
                </div>
            </div>
            <div class="middle_reponsive">
                <form action="../controller/index.php?act=seach" method="POST">
                    <input type="text" name="filter" placeholder="Tìm kiếm sản phẩm...">
                    <input type="submit" name="timkiem" value="Seach">
                </form>
            </div>
            <div class="bottom">
                <div class="trai">
                    <span><i class="fa-solid fa-bars"></i>  SẢN PHẨM <i class="fa-solid fa-caret-down"></i></span>
                    <ul>
                        <?php
                        $dsdanhmmuc = danhmuc_showAll();
                        foreach ($dsdanhmmuc as $row) {
                            echo '<li><a href="../controller/index.php?act=sanpham&id=' . $row['iddanhmuc'] . '">' . $row['tendanhmuc'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <nav class="phai">
                    <ul>

                        <li><a href="../controller/index.php">TRANG CHỦ</a></li>
                        <?php
                        $dsdanhmmuc = danhmuc_showAll();
                        foreach ($dsdanhmmuc as $row) {
                            echo '<li><a href="../controller/index.php?act=sanpham&id=' . $row['iddanhmuc'] . '">' . $row['tendanhmuc'] . '</a></li>';
                        }
                        ?>
                    </ul>

                </nav>

            </div>
        </header>
        <main>