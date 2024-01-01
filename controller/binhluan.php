<link rel="stylesheet" href="../view/css/chitietsp.css">
<?php
// Nếu liên kết người dùng gõ vào là controller/binhluan.php
// thì chạy code trang bình luận
// Khởi tạo phiên mới để thao tác với session
session_start();
// Gộp file cấu hình 
include "../model/config.php"; 
// Gộp các hàm chức năng ở model bình luạn
include_once "../model/binhluan.php";
// Nếu biến id, biến name, và biến avata được đặt trong session
if(isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['avata']) ){
    // Nếu có thêm biến username thì lấy các biến kia chứa vào các biến cục bộ
    // tương ứng, ngược lại gán bằng rỗng.
    if(isset($_SESSION['username'])){
        $user = $_SESSION['username'];
        $name = $_SESSION['name'];
        $avt = $_SESSION['avata'];
    }else{
        $user = "";
        $name = "";
        $avt = "";
    }

    // Nếu nhận được lệnh post có giá trị submit là gui, thì lấy các thông số
    // được gửi lên từ lệnh post, và gọi hàm add_binh_luan với tham số tương ứng

    if(isset($_POST['gui'])){
        $name = $_POST['name'];
        $idsp = $_POST['idsp'];
        $noidung = $_POST['noidung'];
        $iduser = $_SESSION['id'];
        $date = $_POST['date'];
        $hinh = $_POST['hinh'];

        if ($idsp != "" && $noidung != "" && $iduser != "") {
            add_binhluan($iduser,$idsp,$noidung,$hinh, $date, $name);
            echo "<script>alert('Gửi bình luận thành công')</script>";
        }else{
            echo "<script>alert('Gửi bình luận thành công')</script>";
        }
    }
    // Tiếp theo hiển thị phần mã html giao diện
?>
   <div class="binhluan">
   <form action="" method="POST">
   <h4>THÊM ĐÁNH GIÁ</h4>
        <div class="user">
        <img src="../view/images/<?=$avt?>" alt="">
        <input type="hidden" name="hinh" value="<?=$avt?>">
        <input type="hidden" name="name" value="<?=$name?>">
        <input type="hidden" name="idsp" value="<?=$_GET['idsp']?>">
        <input type="hidden" name="date" value="<?php echo date("d/m/Y"); ?>">
        <textarea name="noidung" id="" cols="30" rows="5"></textarea>
        </div>
        <input type="submit" value="Gửi" name="gui">
    </form>
       <?php
       // Nếu có tham số idsp thì hiển thị chi tiết id đó ra
           if(isset($_GET['idsp'])){
            $idsp = $_GET['idsp'];
                $showbinhluan = binhluan_showChiTiet($idsp);
                // extract($showbinhluan);

                foreach($showbinhluan as $row){
                echo '  
                <div class="showbinhluan">
                                    <div class="user">
                                        <img src="../view/images/'.$row['hinh'].'" alt="">
                                        <div class="thongtinbl">
                                            <span class="bl_name">'.$row['name'].'</span>
                                            <span>-</span> 
                                            <span class="">'.$row['postdate'].'</span><br><br>
                                            <span class="bl_noidung">'.$row['noidung'].'</span>
                                        </div>
                                    </div>
                                </div>
            ';
        }
           }
       ?>

   
   </div>
    <?php }else{
        if(isset($_GET['idsp'])){
            $idsp = $_GET['idsp'];
                $showbinhluan = binhluan_showChiTiet($idsp);

                foreach($showbinhluan as $row){
                echo '  
                <div class="showbinhluan">
                                    <div class="user">
                                        <img src="../view/images/'.$row['hinh'].'" alt="">
                                        <div class="thongtinbl">
                                            <span class="bl_name">'.$row['name'].'</span>
                                            <span>-</span> 
                                            <span class="">'.$row['postdate'].'</span><br><br>
                                            <span class="bl_noidung">'.$row['noidung'].'</span>
                                        </div>
                                    </div>
                                </div>
            ';
        }
           }
    
        }?>