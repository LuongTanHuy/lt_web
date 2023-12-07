<?php
// lấy dữ liệu id cần xóa
$id = $_GET['id'];

// kiểm tra xem id có tồn tại hay không
if (isset($id)) {

    // kết nối
    require_once 'connect.php';

    // câu lệnh sql
    $xoa_sql = "DELETE FROM books WHERE book_id = $id";

    // thực thi câu lệnh
    if (mysqli_query($conn, $xoa_sql)) {
        // trả về trang listed nếu xóa thành công
        header("Location: listed.php");
    } else {
        // in ra lỗi nếu có lỗi xảy ra
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
    // in ra thông báo nếu không tìm thấy id
    echo "Không tìm thấy ID để xóa";
}
?>
