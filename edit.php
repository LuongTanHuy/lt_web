<?php
// Lấy id cần chỉnh sửa
$id = $_GET['id'];

// Kết nối CSDL
require_once 'connect.php';

// Câu lệnh lấy thông tin của sách cần chỉnh sửa
$edit_sql = "SELECT * FROM books WHERE book_id=$id ";
$result = mysqli_query($conn, $edit_sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit sách</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Edit sách</h1>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" id="">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['book_title']; ?>">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="<?php echo $row['book_author']; ?>">
            </div>
            <div class="form-group">
                <label for="desrc">Desrc</label>
                <input type="text" class="form-control" id="desrc" name="desrc" value="<?php echo $row['book_descr']; ?>">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['book_price']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>
    </div>
</body>
</html>
