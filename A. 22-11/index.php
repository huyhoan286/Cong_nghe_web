<?php
include 'main.php';
include 'header.php';

$allProducts = getAllProducts();
?>

<a href="addProduct.php" class="btn btn-success">Thêm mới</a> 
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá (VND)</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allProducts as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product['id']) ?></td>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><?= number_format($product['price']) ?></td>
            <td>
            <a href="editProduct.php?id=<?= $product['id'] ?>" class="btn btn-link btn-sm">
                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                </a>

                <a href="deleteProduct.php?id=<?= $product['id'] ?>" class="btn btn-link btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                </a>
                
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>



<?php include 'footer.php'; ?>
