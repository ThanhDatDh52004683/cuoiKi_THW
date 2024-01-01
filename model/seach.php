<link rel="stylesheet" href="../view/css/products.css">

<div class="banner">
    <img src="../view/images/3007_32197_Laptop-HP-Envy-13-ah0026TU-4.jpg" alt=""style="width: 80%; object-fit: cover">
</div>
<div class="main">
    <?php
    // Nếu nhận được dữ liệu được gửi lên theo phương thức post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy tên từ biến filter
        $name = $_POST["filter"];
        // Nếu giá trị tìm kiếm bằng rỗng thì không làm gì cả
        if ($name == "") {
        } else {
            // Ngược lại gọi hàm sanpham_search với tham số là giá trị
            // vừa nhận được
            $query = sanpham_seach($name);
            // var_dump($query);
            // Nếu kết quả trả về không bị null
            if ($query != null) {
                echo "<h3>Kết quả tìm kiếm: " . $name . "</h3>";
                echo "<div class=mainIn>";
                // Duyệt qua tất cả các dòng trong két quả trả về
                foreach ($query as $row) {
                    // Ánh xạ các cột thành các biến với tên tương ứng
                    extract($row);
                    // Hiển thị các biến được ánh xạ ra màn hình
                    echo '
                    <div class="sanpham1">
                    <form method = "POST" action = "../controller/index.php?act=cart">
                        <img src="../view/images/' . $hinh . '" alt="">
                        <h3>' . substr($tensp, 0, 45)  . '</h3>
                        <p>' . $gia . ' VNĐ</p>
                        <input type="hidden" name="hinh" value="' . $hinh . '"/>
                        <input type="hidden" name="tensp" value="' . $tensp . '"/>
                        <input type="hidden" name="gia" value="' . $gia . '"/>
                        <div class="buy">
                        <button><a href="">Xem chi tiết</a></button>
                            <input type="submit" value="Cho vào giỏ" name="addcart">
                        </div>
                    </form>
                </div>
                ';
                }
                echo "</div>";
            } else {
                // Nếu không tìm thấy thì in ra màn hình thông báo
                echo "<h3 style= margin-left:30px;>Không tìm Thấy Kết quả: " . $name . " </h3>";
            }
        }
    }

    ?>
</div>