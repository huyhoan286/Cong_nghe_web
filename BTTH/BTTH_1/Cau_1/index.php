<?php
session_start();
include 'includes/flowers.php'; // Dữ liệu ban đầu của hoa
include 'includes/functions.php'; // Các hàm xử lý


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <!-- Tiêu đề sẽ được hiển thị trước thẻ card -->
    <h1 class="text-center mb-4">Danh sách các loài hoa</h1>
    
    <!-- Hiển thị danh sách hoa (dưới tiêu đề) -->
    <?php
    if (isset($_SESSION['flowers'])) {
        displayGuestView($_SESSION['flowers']); // Gọi hàm hiển thị danh sách hoa
    }
    ?>
</div>
<!-- <footer class="bg-dark text-white text-center py-3 mt-4">
    <p>&copy; 2024 Quản lý hoa. Tất cả các quyền được bảo lưu.</p>
</footer> -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
