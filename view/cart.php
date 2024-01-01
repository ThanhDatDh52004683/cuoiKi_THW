<link rel="stylesheet" href="../view/css/carts.css">
<?php
// Nếu chưa tồn tại giỏ hàng được lưu trong session thì 
// tạo mới giỏ hàng trong session

if (!isset($_SESSION['giohang']))
    $_SESSION['giohang'] = [];

// Nếu nhận được biến delid được truyền lên thên phương thức 
// get và giá trị nó lớn hơn 0.
if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
    // Xoá phần tử trong session giỏ hàng, tại vị trí delid, 
    // xoá 1 đơn vị
    array_splice($_SESSION['giohang'], $_GET['delid'], 1);
}

// Nếu nhận được biến addcart qua phương thức post
if (isset($_POST['addcart'])) {
    // Thì lấy các thông tin nhận được vào các biến tương ứng
    // 
    $hinh = $_POST['hinh'];
    $ten = $_POST['tensp'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];

    // Biến lưu trạng thái để 
    // biết là có cập nhật hay không
    $fl = 0;
    // Duyệt qua danh sách các sản phẩm của giỏ hàng cũ
    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        // Nếu trong đó có sản phẩm có tên giống với tên sản phẩm vừa 
        // được gửi lên
        if ($_SESSION['giohang'][$i][1] == $ten) {
            $fl = 1; // Trạng thái là cập nhật
            // Cập nhật số lượng mới bằng cách cộng số lượng cũ và số lượng được gởi lên
            $slnew = $soluong + $_SESSION['giohang'][$i][3];
            // Lưu lại số lượng này vào giỏ hàng
            $_SESSION['giohang'][$i][3] = $slnew;
            break;
        }
    }
    // Nếu không cập nhật thì thêm mới
    if ($fl == 0) {
        // Tạo mới mảng thông tin hình cột 0, tên cột 1, giá cột 2, số lượng cột 3
        $sp = [$hinh, $ten, $gia, $soluong];
        // Thêm vào cuối danh sách của giỏ hàng cũ
        $_SESSION['giohang'][] = $sp;
    }
}

// Hàm hiển thị giỏ hàng
function showcart()
{
    // Nếu giỏ hàng đã được tạo và có dạng mảng
    if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
        // Khởi tạo tổng tiền bằng 0
        $tong = 0;
        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
            // Duyệt qua danh sách giỏ hàng
            $tt = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
            // Tính thành tiền = đơn giá cột 2 * số lượng cột 3
            // và cộng dồng vào tổng
            $tong += $tt;
            // Hiển thị thông tin của hàng hoá hiện tại lên màn hình
            echo '
                        <tr>
                            <td>' . ($i + 1) . '</td>
                            <td><img src="../view/images/' . $_SESSION['giohang'][$i][0] . '" alt=""></td>
                            <td><p>' . $_SESSION['giohang'][$i][1] . '</p></td>
                            <td><span>' . number_format($_SESSION['giohang'][$i][2]) . ' VNĐ</span></td>
                            <td>
                                <form action="">
                                    <input type="number"  id="so_luong_' . $i . ' "value="' . number_format($_SESSION['giohang'][$i][3]) . '" onchange="thay_doi_so_luong_gio_hang(' . $i . ')"  name="soluong">
                                </form>
                            </td>
                        <td><span id="thanh_tien_' . $i . '">' . number_format($tt) . ' VNĐ</span></td>
                        <td><a href="../controller/index.php?act=cart&delid=' . $i . '"><i class="fa-solid fa-trash"></i> </a></td>
                        </tr>
                ';
        }
        echo '
                    <tr>
                        <th colspan="4">Tổng Tiển </th>
                        <th class="tong">' . number_format($tong) . ' VNĐ</th>
                    </tr>
        ';
    }
    //  //them so luong
    //  if(isset($_GET['cong'])){
    //     $id=$_GET['cong'];
    //     foreach ($_SESSION['cart'] as $cart_item){
    //         if ($cart_item['id'] != $id){
    //             $product[]= array('ten'=>$cart_item['tensp'], 'soluong' => $cart_item['soluong'], 'gia' => $cart_item['gia']);
    //             $_SESSION['cart'] = $product;
    //         }else{
    //             $tangsoluong = $cart_item['soluong'] + 1;
    //             if($cart_item['soluong']<=9){
    //                 $product[]= array('ten'=>$cart_item['tensp'], 'soluong' => $cart_item['soluong'], 'gia' => $cart_item['gia']);
    //             }else{
    //                 $product[]= array('ten'=>$cart_item['tensp'], 'soluong' => $cart_item['soluong'], 'gia' => $cart_item['gia']);
    //             }
    //             $_SESSION['cart'] = $product;
    //         }
    //     }
    // }
}


?>
<div class="main">
    <h2>GIỎ HÀNG</h2>
    <table>
        <tr class="nen">
            <th style="width: 50px;"></th>
            <th colspan="2">Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th colspan="2">Thành tiền</th>
        </tr>
        <?php showcart(); ?>
    </table>
    <a href="../controller/index.php" style="text-decoration: none;"><button class="dathang">Tiếp Tục Đặt Hàng</button></a>
    <a href="../view/thanhtoan.php" style="text-decoration: none;"><button class="dathang">Thanh toán</button></a>
</div>