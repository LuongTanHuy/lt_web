<?php
// kết nối db
require_once 'connect.php';

// nhận dữ liệu từ form
$title = $_POST['title'];
$author = $_POST['author'];
$descr = $_POST['desrc'];
$price = $_POST['price'];
$id = $_POST['id'];

// viết lệnh sql để cập nhật dữ liệu
$update_sql = "UPDATE books SET book_title='$title', book_author='$author', book_descr='$descr', book_price='$price' WHERE book_id=$id";

if (mysqli_query($conn, $update_sql)) {
    header("Location: listed.php");
} else {
    echo "Lỗi: " . $update_sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
