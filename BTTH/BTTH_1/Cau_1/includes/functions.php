<?php
function displayGuestView($flowers) {
    echo '<div class="row">';
    foreach ($flowers as $flower) {
        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card h-100">';
        echo '<img src="' . $flower['image'] . '" class="card-img-top" alt="' . $flower['name'] . '" style="height: 200px; object-fit: cover;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $flower['name'] . '</h5>';
        echo '<p class="card-text">' . $flower['description'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
}

function displayAdminView($flowers) {
    echo '<table class="table table-bordered table-hover">';
    echo '<thead class="table-dark">';
    echo '<tr><th>Hình ảnh</th><th>Tên hoa</th><th>Mô tả</th><th>Hành động</th></tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($flowers as $index => $flower) {
        echo '<tr>';
        echo '<td><img src="' . $flower['image'] . '" alt="' . $flower['name'] . '" style="width: 100px; height: 100px; object-fit: cover;"></td>';
        echo '<td>' . $flower['name'] . '</td>';
        echo '<td>' . $flower['description'] . '</td>';
        echo '<td>';
        echo '<a href="admin.php?action=edit&id=' . $index . '&admin=true" class="btn btn-warning btn-sm">Sửa</a> ';
        echo '<a href="admin.php?action=delete&id=' . $index . '&admin=true" class="btn btn-danger btn-sm">Xóa</a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
?>
