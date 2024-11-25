<?php
include 'main.php';
include 'header.php';

// Xử lý thêm sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    addProduct($name, $price);
    header("Location: index.php");
    exit();
}
?>

<h2>Thêm sản phẩm mới</h2>
<form method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Giá sản phẩm:</label>
        <input type="number" id="price" name="price" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>

<?php include 'footer.php'; ?>
