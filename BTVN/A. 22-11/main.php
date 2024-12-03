<?php
session_start(); // Khởi tạo session

// Dữ liệu cứng ban đầu, chỉ được tạo khi chưa có trong session
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['id' => 1, 'name' => 'Sản phẩm 1', 'price' => 100000],
        ['id' => 2, 'name' => 'Sản phẩm 2', 'price' => 200000],
        ['id' => 3, 'name' => 'Sản phẩm 3', 'price' => 300000],
    ];
}

// Lấy danh sách sản phẩm
function getAllProducts() {
    return $_SESSION['products'];
}

// Tìm sản phẩm theo ID
function findProductById($id) {
    foreach ($_SESSION['products'] as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    return null;
}

// Thêm sản phẩm mới
function addProduct($name, $price) {
    $id = count($_SESSION['products']) + 1; // Tự động tăng ID
    $_SESSION['products'][] = ['id' => $id, 'name' => $name, 'price' => $price];
}

// Cập nhật sản phẩm
function updateProduct($id, $newName, $newPrice) {
    foreach ($_SESSION['products'] as &$product) {
        if ($product['id'] == $id) {
            $product['name'] = $newName;
            $product['price'] = $newPrice;
            return true;
        }
    }
    return false;
}

// Xóa sản phẩm
function deleteProduct($id) {
    foreach ($_SESSION['products'] as $index => $product) {
        if ($product['id'] == $id) {
            unset($_SESSION['products'][$index]);
            $_SESSION['products'] = array_values($_SESSION['products']); // Đánh lại chỉ số
            return true;
        }
    }
    return false;
}
?>
