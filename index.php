<?php
    // File index là file bắt đầu chạy của 
    // code php trên server
    // hàm header sẽ trả về header cho trình duyệt
    // ở đây hàm trả về một header location
    // có giá trị là controller/index.php
    // khi nhận được lệnh này, trình duyệt sẽ chuyển hướng trang thực thi
    // đến controller/index.php
    header('location: controller/index.php');
?>