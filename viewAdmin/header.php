
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="../view/images/logoben.png">
    <link rel="stylesheet" href="../view/css/admin.css">
    <link rel="stylesheet" href="../view/css/index.css">
    <link rel="stylesheet" href="../view/fontawesome-free-6.1.1-web/css/all.min.css">
</head>

<body>
    <div class="admin">
        <header>
            <div class="tren">

                <h2>ADMIN</h2>
                <div class="logo">
                    <a href="../controller/indexAdmin.php"><img src="../view/images/logotong.png"></a>
                </div>
                <nav>
                    <ul>
                        <li><a href="../controller/indexAdmin.php?act=userAd"><i class="fa-solid fa-house-user"></i> Tài Khoản</a></li>

                        <li><a href="../viewAdmin/logout.php"><i class="fa-solid fa-power-off"></i> Đăng Xuất</a></li>
                    </ul>
                </nav>
            </div>
            <nav class="duoi">
                <h3>Admin Menu</h3>
                <ul>
                    <li class="chon"><a href="../controller/indexAdmin.php?act=danhmuc">Danh Mục</a></li>
                    <li class="chon"><a href="../controller/indexAdmin.php?act=sanpham">Sản Phẩm</a>
                    </li>
                    <li class="chon"><a href="../controller/indexAdmin.php?act=binhluan">Bình luận</a></li>
                    <li class="chon"><a href="">Thông kê</a></li>
                </ul>
            </nav>
        </header>