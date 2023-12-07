<?php
// kết nối db
require_once 'connect.php';

if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['image']) && isset($_POST['descr']) && isset($_POST['price'])) {
    // nhận dữ liệu từ form
    $title = $_POST['title'];
    $author = $_POST['author'];
    $image = $_POST['image'];
    $descr = $_POST['descr'];
    $price = $_POST['price'];

    // viết lệnh sql để thêm dữ liệu
    $themsql = "INSERT INTO books (book_title, book_author, book_image, book_descr, book_price) VALUES ('$title', '$author', '$image', '$descr', '$price')";

    // thực thi câu lệnh thêm
    if (mysqli_query($conn, $themsql)) {
        // đóng kết nối
        mysqli_close($conn);
        header("Location: listed.php");
        exit();
    } else {
        echo "Lỗi: " . $themsql . "<br>" . mysqli_error($conn);
    }
}
?>
