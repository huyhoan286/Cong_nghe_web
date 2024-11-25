<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* Custom styles */
        .table-wrapper {
            padding: 20px;
        }

        .navbar {
            margin-bottom: 0; /* Giảm khoảng cách dưới của navbar */
            border: none; /* Bỏ viền cho navbar */
        }

        .navbar-nav {
            padding-left: 0;
            margin-bottom: 0;
        }

        .navbar-nav > li > a {
            padding: 15px 20px;
        }

        /* In đậm cho "Administration" và "Thể loại" */
        .navbar-nav > li.bold > a {
            font-weight: bold;
        }

        /* Đảm bảo các mục menu nằm ở phía trái */
        .navbar-nav {
            float: left;
        }

        /* Cải thiện giao diện navbar */
        .navbar-default {
            background-color: #f8f9fa;
            border-color: #e7e7e7;
        }

        .navbar-default .navbar-nav > li > a {
            color: #555555;
        }

        .navbar-default .navbar-nav > li > a:hover {
            background-color: #f1f1f1;
        }

        /* Đổi màu khi hover */
        .navbar-default .navbar-nav > li > a.bold {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <!-- Thanh Menu (Navbar) -->
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav">
                            <li class="bold"><a href="#">Administration</a></li> <!-- In đậm -->
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="#">Trang ngoài</a></li>
                            <li class="bold"><a href="#">Thể loại</a></li> <!-- In đậm -->
                            <li><a href="#">Tác giả</a></li>
                            <li><a href="#">Bài viết</a></li>
                        </ul>
                    </div>
                </nav>

           
            </div>
        </div>
    </div>
</body>
</html>
