<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Vấn Đề</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Sửa Vấn Đề</h2>
        <form action="{{ route('issues.update', $issue->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="computer_id" class="form-label">Máy Tính</label>
                <select name="computer_id" id="computer_id" class="form-select">
                    @foreach($computers as $computer)
                    <option value="{{ $computer->id }}" {{ $issue->computer_id == $computer->id ? 'selected' : '' }}>
                        {{ $computer->computer_name }} - {{ $computer->model }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="reported_by" class="form-label">Người Báo Cáo</label>
                <input type="text" class="form-control" name="reported_by" id="reported_by" value="{{ $issue->reported_by }}" required>
            </div>
            <div class="mb-3">
                <label for="reported_date" class="form-label">Thời Gian Báo Cáo</label>
                <input type="datetime-local" class="form-control" name="reported_date" id="reported_date" value="{{ \Carbon\Carbon::parse($issue->reported_date)->format('Y-m-d\TH:i') }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mức Độ Sự Cố</label>
                <textarea class="form-control" name="description" id="description" rows="3" required>{{ $issue->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Trạng Thái</label>
                <select name="status" id="status" class="form-select">
                    <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                    <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</body>

</html>