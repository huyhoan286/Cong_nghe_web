<?php
// Đường dẫn tới file CSV
$filename = "KTPM2.csv";

// Mảng chứa dữ liệu sinh viên
$sinhvien = [];

// Đọc dữ liệu từ file CSV
if (($handle = fopen($filename, "r")) !== FALSE) {
    // Đọc dòng đầu tiên (header)
    $headers = fgetcsv($handle, 1000, ",");

    // Loại bỏ dấu cách thừa trong mỗi phần tử của mảng $headers
    $headers = array_map('trim', $headers);

    // Đọc từng dòng dữ liệu
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        // Kiểm tra nếu số lượng trường trong data và headers bằng nhau
        if (count($headers) == count($data)) {
            // Nếu số lượng khớp, gán giá trị vào mảng sinh viên
            $sinhvien[] = array_combine($headers, $data);
        } else {
            // Nếu không khớp, có thể ghi lại hoặc bỏ qua dòng này
            echo "Dòng dữ liệu không hợp lệ, bỏ qua: " . implode(",", $data) . "<br>";
        }
    }

    fclose($handle);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Đặt màu chữ trắng cho các tiêu đề bảng */
        th {
            color: white;
            background-color: #333; /* Màu nền của hàng tiêu đề */
            padding: 10px;
        }

        /* Tạo một số hiệu ứng hover cho bảng */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd; /* Màu nền khi hover vào một hàng */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Thành phố</th>
                    <th>Email</th>
                    <th>Khóa học</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Hiển thị từng sinh viên
                foreach ($sinhvien as $sv) {
                    echo "<tr>";
                    echo "<td>{$sv['username']}</td>";
                    echo "<td>{$sv['password']}</td>";
                    echo "<td>{$sv['lastname']}</td>";
                    echo "<td>{$sv['firstname']}</td>";
                    echo "<td>{$sv['city']}</td>";
                    echo "<td>{$sv['email']}</td>";
                    echo "<td>{$sv['course1']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
