<?php
include 'main.php';
include 'header.php';

$idToEdit = isset($_GET['id']) ? $_GET['id'] : null;
$product = findProductById($idToEdit);

if (!$product) {
    echo "<p style='color: red;'>Sản phẩm không tồn tại!</p>";
    include 'footer.php';
    exit();
}

// Xử lý khi cập nhật sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = $_POST['name'];
    $newPrice = $_POST['price'];
    updateProduct($idToEdit, $newName, $newPrice);
    header("Location: index.php");
    exit();
}
?>

<h2>Sửa sản phẩm</h2>
<form method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($product['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Giá sản phẩm:</label>
        <input type="number" id="price" name="price" class="form-control" value="<?= htmlspecialchars($product['price']) ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Cập nhật</button>
</form>

<?php include 'footer.php'; ?>
