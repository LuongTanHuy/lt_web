<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Tìm Kiếm Sách</h1>
        <a href="listed.php" class="btn btn-secondary">Trang chủ</a>
        <br><br>

        <form action="search.php" method="GET">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo tựa sách">
            </div>
            <button type="submit" class="btn btn-primary" name="searchButton">Tìm Kiếm</button>
        </form>
        <?php
        if (isset($_GET['searchButton'])) {
            $searchTerm = $_GET['search'];
            require_once 'connect.php';
            $search_sql = "SELECT * FROM books WHERE book_title LIKE '%$searchTerm%'";
            $result = mysqli_query($conn, $search_sql);
            if (mysqli_num_rows($result) > 0) {
        ?>

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
                        while ($r = mysqli_fetch_assoc($result)) {
                        ?>
                <tr>
                    <td><?php echo $r['book_id']; ?></td>
                    <td><?php echo htmlspecialchars($r['book_title']); ?></td>
                    <td><?php echo htmlspecialchars($r['book_author']); ?></td>
                    <td><?php echo htmlspecialchars($r['book_descr']); ?></td>
                    <td><?php echo $r['book_price']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $r['book_id']; ?>" class="btn btn-primary">Sửa</a>
                        <a onclick="return confirm('Bạn có muốn xóa')" href="delete.php?id=<?php echo $r['book_id']; ?>"
                            class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <?php
                        }
                        ?>
            </tbody>
        </table>
        <?php
            } else {
                echo "Không tìm thấy kết quả nào phù hợp.";
            }
        }
        ?>
    </div>
</body>

</html>