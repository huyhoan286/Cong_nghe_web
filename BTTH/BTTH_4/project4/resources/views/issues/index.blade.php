<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Vấn Đề</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Danh sách Vấn Đề</h2>
        <a href="{{ route('issues.create') }}" class="btn btn-primary mb-3">Thêm Vấn Đề</a>

        <table class="table table-bordered">

            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <thead>
                <tr>
                    <th>Mã Vấn Đề</th>
                    <th>Tên Máy Tính</th>
                    <th>Tên Phiên Bản</th>
                    <th>Người Báo Cáo</th>
                    <th>Thời Gian Báo Cáo</th>
                    <th>Mức Độ Sự Cố</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($issues as $issue)
            <tr>
                <td>{{ $issue->id }}</td>
                <td>{{ $issue->computer->computer_name }}</td>
                <td>{{ $issue->computer->model }}</td>
                <td>{{ $issue->reported_by }}</td>
                <td>{{ $issue->reported_date }}</td>
                <td>{{ $issue->description }}</td>
                <td>{{ $issue->status }}</td>
            <td>
            <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-warning">Sửa</a>
            <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa mục này không?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Xóa</button>
            </form>
            </td>
            </tr>
            @endforeach
            <script type="text/javascript">
                function confirmDelete(id) {
                    if (confirm('Bạn có chắc chắn muốn xóa mục này không?')) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                }
            </script>
            </tbody>
        </table>
    </div>
</body>

</html>