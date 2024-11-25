<?php
include 'main.php';

$idToDelete = isset($_GET['id']) ? $_GET['id'] : null;

if ($idToDelete && deleteProduct($idToDelete)) {
    header("Location: index.php");
    exit();
} else {
    echo "<p style='color: red;'>Xóa sản phẩm thất bại hoặc sản phẩm không tồn tại!</p>";
}
?>
