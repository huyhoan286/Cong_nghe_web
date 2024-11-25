<?php
session_start();
include 'includes/flowers.php'; // Dữ liệu ban đầu của hoa
include 'includes/functions.php'; // Các hàm xử lý

$isAdmin = isset($_GET['admin']) && $_GET['admin'] === 'true';

if (!isset($_SESSION['flowers'])) {
    $_SESSION['flowers'] = $flowers; // Lưu hoa vào session
}

$action = $_GET['action'] ?? null;
$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $isAdmin) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Kiểm tra và xử lý hình ảnh tải lên
    $image = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $imageDir = 'uploads/'; // Thư mục lưu hình ảnh
        if (!is_dir($imageDir)) {
            mkdir($imageDir, 0777, true); // Tạo thư mục nếu chưa có
        }
        $imagePath = $imageDir . $imageName;
        move_uploaded_file($imageTmp, $imagePath);
        $image = $imagePath; // Lưu đường dẫn hình ảnh
    }

    if ($action === 'edit' && isset($id)) {
        $_SESSION['flowers'][$id] = compact('name', 'description', 'image');
    } elseif ($action === 'add') {
        $_SESSION['flowers'][] = compact('name', 'description', 'image');
    }

    header('Location: admin.php?admin=true'); // Chuyển hướng sau khi lưu dữ liệu
    exit;
} elseif ($action === 'delete' && $isAdmin && isset($id)) {
    unset($_SESSION['flowers'][$id]);
    $_SESSION['flowers'] = array_values($_SESSION['flowers']); // Reset lại chỉ số mảng
    header('Location: admin.php?admin=true');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý danh sách hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center mb-4">QUẢN LÝ DANH SÁCH HOA</h1>

    <?php if ($isAdmin): ?>
        <?php if ($action === 'edit' || $action === 'add'): ?>
            <!-- Form thêm/sửa hoa -->
            <form method="post" class="mb-4" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label" style="color: #007bff;">Tên hoa:</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $action === 'edit' ? $_SESSION['flowers'][$id]['name'] : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label" style="color: #007bff;">Mô tả:</label>
                    <textarea name="description" id="description" class="form-control" required><?= $action === 'edit' ? $_SESSION['flowers'][$id]['description'] : '' ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label" style="color: #007bff;">Hình ảnh:</label>
                    <input type="file" name="image" id="image" class="form-control" <?= $action === 'edit' ? '' : 'required' ?>>
                </div>
                <button type="submit" class="btn btn-success"><?= $action === 'edit' ? 'Cập nhật' : 'Thêm mới' ?></button>
            </form>
        <?php endif; ?>

        <!-- Nút thêm mới và hiển thị danh sách -->
        <a href="admin.php?action=add&admin=true" class="btn btn-success mb-4">Thêm mới hoa</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên hoa</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['flowers'] as $index => $flower): ?>
                    <tr>
                        <td><img src="<?= htmlspecialchars($flower['image']) ?>" alt="Flower Image" width="50"></td>
                        <td><?= htmlspecialchars($flower['name']) ?></td>
                        <td><?= htmlspecialchars($flower['description']) ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="admin.php?action=edit&id=<?= $index ?>&admin=true" class="btn btn-outline-primary btn-sm me-2">
                                    <i class="fas fa-pen"></i> Sửa
                                </a>
                                <a href="admin.php?action=delete&id=<?= $index ?>&admin=true" class="btn btn-outline-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    <i class="fas fa-trash"></i> Xóa
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <?php displayGuestView($_SESSION['flowers']); ?> <!-- Hiển thị hoa cho người dùng -->
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
