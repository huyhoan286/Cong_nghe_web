<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Vấn Đề</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Thêm Vấn Đề</h2>
        <form action="{{ route('issues.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="computer_id" class="form-label">Máy Tính</label>
                <select name="computer_id" id="computer_id" class="form-select">
                    @foreach($computers as $computer)
                    <option value="{{ $computer->id }}">{{ $computer->computer_name }} - {{ $computer->model }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="reported_by" class="form-label">Người Báo Cáo</label>
                <input type="text" class="form-control" name="reported_by" id="reported_by" required>
            </div>
            <div class="mb-3">
                <label for="reported_date" class="form-label">Thời Gian Báo Cáo</label>
                <input type="datetime-local" class="form-control" name="reported_date" id="reported_date" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mức Độ Sự Cố</label>
                <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Trạng Thái</label>
                <select name="status" id="status" class="form-select">
                    <option value="Open">Open</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Resolved">Resolved</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</body>

</html>