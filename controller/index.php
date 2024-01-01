<?php 
    // File này sẽ thực hiện nhiệm vụ chính của chương trình
    // Nó bắt đầu bằng việc gom các file khác vào chung 1 file
    // để chạy bằng cách sử dụng lệnh include
    // include_once báo cho trình thông dịch php biết là
    // chỉ được phép include file này một lần (không lặp lại
    // việc include nếu ở các file con lại include 1 lần nữa)
    // include thì có thể include được nhiều lần    
    // lặp lại ở các file con.
    // File config không có thay đổi gì nên chỉ include 1 lần
    // từ thư mục bên ngoài một cấp (..) đi vào model/config.php
    // * Các tập tin nằm ở model hầu hết là các tập tin thư viện hàm
    // chức năng thêm xoá sửa được phân loại thành các nhóm khác nhau.
    // Khi được include vào, các hàm này sẽ tồn tại trong cùng cấp với tập tin
    // include nó, và các tập tin được include ở tập tin con của tập tin hiện tại.

        include_once "../model/config.php"; 
    // Include 1 lần phần danh mục
        include_once "../model/danhmuc.php";
        include_once "../model/sanpham.php";
        include_once "../model/binhluan.php";
        include_once "../model/user.php";
        include_once "../model/login_submit.php";
    // 
        include "../model/register_submit.php";
    // Include phần header ở view để hiện thị phần đầu trang
        include "../view/header.php"; 
    
    //  Phần thân của trang sẽ tuỳ vào tham số lệnh act được truyền
    // vào qua phương thức get mà hiển thị tương ứng 
    // (có dạng http://localhost/doan/controller/index.php?act=cart)
    // lệnh isset kiểm tra xem giá trị của một biến có được gán không.   
    // Nếu được gán thì tiếp tục xử lý lệnh
    if (isset($_GET['act'])) {
            
            switch ($_GET['act']) {
                // Nếu lệnh nhạn được là act=cart
                case 'cart':
                // Include phần hiển thị card
                    include "../view/cart.php";
                    break;
                // Nếu lẹnh nhận được là act=sanpham
                case 'sanpham':
                    // Include phần hiển thị sản phẩm
                    include "../view/sanpham.php";
                    break;

                // Các lệnh sau cũng tương tự
                case 'login':
                    
                        include "../view/login.php";
                    
                    break;

                case 'register':

                    include "../view/register.php";
                    break;
                case 'suauser':
                    include "../view/suauser.php";
                    break;
                // Chức năng tìm kiếm, sử dụng code trong model/search.php
                case 'seach':
                        include "../model/seach.php";
                        break;

                case 'chitiet':
                    include "../view/chitietsp.php";
                    break;

                case 'baiviet':
                    include "../view/baiviet.php";
                    break;

                default:
                    include "../view/home.php";
                    break;
            }
        } else { // Nếu không có lệnh nào được chọn, thì hiển thị trang hiển thị ở trang chủ
            include "../view/home.php";
        }

        // Include phần footer để hiển thị phần cuối trang
        include "../view/footer.php";
