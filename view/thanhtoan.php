<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
 // Nếu đã đăng nhập, tạo Đơn hàng
    // Truy vấn database
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    include_once(__DIR__ . '/../model/config.php');
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại

// Đã người dùng chưa đăng nhập -> hiển thị thông báo yêu cầu người dùng đăng nhập
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    echo 'Vui lòng Đăng nhập trước khi Thanh toán! <a href="../view/login.php"> Click vào đây để đến trang Đăng nhập</a>';
    die;
} else {
    // Nếu giỏ hàng trong session rỗng, return
    if (!isset($_SESSION['giohang']) || empty($_SESSION['giohang'])) {
        echo 'Giỏ hàng rỗng. Vui lòng chọn Sản phẩm trước khi Thanh toán! <a href="../controller/index.php"> Click vào đây để trở về</a> ';
        die;
    }
}

if(isset($_POST['submit'])) {
    if (isset($_POST['hoten']) 
    && isset($_POST['email']) 
    && isset($_POST['dienthoai']) 
    && isset($_POST['diachi'])) {
        $hoten = $_POST['hoten'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $diachi = $_POST['diachi'];


        // Tinh tong tien
        $tong = 0;

        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
            // Duyệt qua danh sách giỏ hàng
            $tt = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
            // Tính thành tiền = đơn giá cột 2 * số lượng cột 3
            // và cộng dồng vào tổng
            $tong += $tt;
          
        }
        $sql = "INSERT INTO `hoadon`(`username`, `hoten`, `email`, `diachi`, `dienthoai`, `tongtien`) VALUES (?,?,?,?,?,?)";
        $id = pdo_execute_insert($sql, $_SESSION['username'], $hoten, $email, $diachi, $dienthoai, $tong);
        // Thêm mới chi tiết đơn hàng
        if ($id > 0) {
            for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                $sql = "INSERT INTO `chitiet_hoadon`(`idthanhtoan`, `tensp`, `soluong`, `gia`) VALUES (?,?,?,?)";
                pdo_execute_insert($sql, $id, $_SESSION['giohang'][$i][1], $_SESSION['giohang'][$i][3], $_SESSION['giohang'][$i][2]);
            }
            $_SESSION['giohang'] = [];
            echo 'Đặt hàng thành công ! <a href="../controller/index.php">Click vào đây để trở về</a>';
            die;
        } else {
            echo 'Đặt hàngkhông thành công ! <a href="../view/thanhtoan.php">Click vào đây để trở về</a>';
        }
    } else {
        echo 'Vui lòng điền đầy đủ thông tin để Đặt hàng ! <a href="../view/thanhtoan.php">Click vào đây để trở về</a>';
        die;
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../view/css/carts.css">
    <style>
        .form-thanhtoan {
            text-align: center;
            text-decoration: none;
            color: black;
            text-transform: uppercase;
            font-weight: 500;
        }

        .box input {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 0.375rem 0.75rem;
        }

        .form-thanhtoan {
            font-size: 25px;
        }
    </style>
</head>

<body>

    <?php
    include_once "../model/config.php";
    // Include 1 lần phần danh mục
    include_once "../model/danhmuc.php";
    include_once "../model/sanpham.php";
    include_once "../model/user.php";
    include_once "../model/login_submit.php";
    // 
    include "../model/register_submit.php";
    // Include phần header ở view để hiện thị phần đầu trang
    include "../view/header.php";
    ?>
    <div class="main">
        <form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-thanhtoan">
                <div class=font-thanhtoan>THÔNG TIN KHÁCH HÀNG</div>
                <div class="box">
                    <input type="text" name="hoten" placeholder="Họ Tên :" class="form-control" value="" required="required">
                </div>
                <div class="box">
                    <input type="email" name="email" placeholder="Email" class="form-control" value="" required="">
                </div>
                <div class="box">
                    <input type="text" name="dienthoai" placeholder="SĐT" class="form-control" value="" required="required">
                </div>
                <div class="box">
                    <input type="text" name="diachi" placeholder="Địa Chỉ" class="form-control" value="" required="required">
                </div>
            </div>
            <div class="col-md-9 col-sm-offset-3">
                <button type="submit" class="dathang" name="submit" >ĐẶT HÀNG</button>
            </div>
        </form>
    </div>
    <?php
    include "../view/footer.php";
    ?>
</body>

</html>
