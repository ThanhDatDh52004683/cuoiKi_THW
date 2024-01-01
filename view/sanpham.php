<link rel="stylesheet" href="../view/css/products.css">
<div class="banner">
    <img src="../view/images/trangchu.jpg" alt=""style="width: 115%; object-fit: cover">
</div>
<div class="product">
    <div class="ten">
        <p>Trang chủ</p><i class="fa-solid fa-caret-right"></i>
        <p style="font-weight: bold;">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $dsdanhmmuc = danhmuc_showId($id);
                extract($dsdanhmmuc);
                echo " $tendanhmuc ";
            }
            ?>
        </p>
    </div>
    <div class="sanpham">
        <?php

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $iddanhmuc = sanpham_showId($id);
            // var_dump($iddanhmuc);

            foreach ($iddanhmuc as $row) {
                echo '
                <div class="sanpham1">
                    <form method = "POST" action = "../controller/index.php?act=cart">
                        <img src="../view/images/' . $row['hinh'] . '" alt="">
                        <h3>' . substr($row['tensp'], 0, 45)  . '</h3>
                        <p>' . $row['gia'] . ' VNĐ</p>
                        <input type="hidden" name="hinh" value="' . $row['hinh'] . '"/>
                        <input type="hidden" name="tensp" value="' . $row['tensp'] . '"/>
                        <input type="hidden" name="gia" value="' . $row['gia'] . '"/>
                        <input type="hidden" name="soluong" value="1">
                        <div class="buy">
                        <button><a href="../controller/index.php?act=chitiet&idsp=' . $row['id'] . '">Xem chi tiết</a></button>
                            <input type="submit" value="Cho vào giỏ" name="addcart">
                        </div>
                    </form>
                </div>
                ';
            }
        }
        ?>
    </div>
    <div class="mota">
        <h3>Hãy đến với LapTop Luxyry</h3>
        <p>Để tham quan và chọn cho mình được laptop ưng ý !</p>
    </div>

</div>