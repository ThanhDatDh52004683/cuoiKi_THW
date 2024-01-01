
<div class="main">
    <main>
        <?php

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $rows = sanpham_showChiTiet($id);
        

        if (isset($_POST['sua'])) {
            $tensp = $_POST['tensp'];

            if ($_FILES['hinh']['name'] == '') {
                $hinh = $rows['hinh'];
            } else {
                $hinh = $rows['hinh']['name'];
                $hinh_tmp = $_FILES['hinh']['name_tpm'];
                move_uploaded_file($hinh_tmp, 'images/' . $hinh);
            }

            $gia = $_POST['gia'];
            $danhmuc = $_POST['danhmuc'];

            if ($tensp != "" && $hinh != "" && $gia != "" && $danhmuc != "") {
                sanpham_update($tensp,$hinh,$gia,$danhmuc, $id);
                echo "<script>alert('Sửa sản phẩm thành công')</script>";
            }
        }
        ?>

        <form action="" method="POST" class="sua" enctype="multipart/form-data" style="width:400px; height:auto; padding-bottom: 10%; margin-left: 0;margin-top: 0;text-align: center;">
            <h2>Sửa sản phẩm</h2>
            <br>
            <input type="text" placeholder="Tên Sản Phẩm" name="tensp" required value="<?php echo $rows['tensp'] ?>"> <br><br>
            <input type="text" placeholder="Giá Sản Phẩm" name="gia" required value="<?php echo $rows['gia'] ?>"><br><br>
            <input type="text" placeholder="Id danh mục" name="danhmuc" required value="<?php echo $rows['iddanhmuc'] ?>"><br><br>
            <input type="file" name="hinh" value="<?php echo $rows['hinh'] ?>" style="border:none;"> <br>
            <input type="submit" value="Sủa" name="sua" style="width: 150px;">
        </form>
    </main>
