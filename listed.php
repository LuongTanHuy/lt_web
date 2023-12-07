<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liệt Kê</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Sách</h1>
        <a href="them.html" class="btn btn-secondary">Thêm</a>
        <a href="search.php" class="btn btn-secondary">Search</a>
        <br><br>
        <!-- Search -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Book_ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Desrc</th>
                    <th>Price</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kết nối
                require_once 'connect.php';
                $lietke_sql = "SELECT * FROM books order by book_title, book_author, book_image, book_descr, book_price";
                $result = mysqli_query($conn, $lietke_sql);

                while ($r = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $r['book_id']; ?></td>
                        <td><?php echo $r['book_title']; ?></td>
                        <td><?php echo $r['book_author']; ?></td>
                        <td><?php echo $r['book_descr']; ?></td>
                        <td><?php echo $r['book_price']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $r['book_id']; ?>" class="btn btn-primary">Sửa</a>
                            <a onclick="return confirm('Bạn có muốn xóa')" href="delete.php?id=<?php echo $r['book_id']; ?>" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
