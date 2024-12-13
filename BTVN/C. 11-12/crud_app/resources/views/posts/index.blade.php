<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Manage Posts</title>
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="  p-3 rounded mb-0">Quản lí bài đăng</h2>
                                <a href={{route('posts.create')}} class="btn btn-primary "><i class="material-icons">&#xE147;</i> <span>Thêm mới</span></a>
                            </div>
                        </div>


                    </div>
                </div>

                @if (Session::has('Thong bao'))
                <div class="alert alert-success">
                    {{ Session::get('Thong bao') }}
                </div>
                @endif
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-link text-success p-0 m-0" data-toggle="tooltip" title="Edit">
                                <i class="material-icons">&#xE254;</i>
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-link text-danger p-0 m-0" data-toggle="tooltip" title="Delete">
                                    <i class="material-icons">&#xE872;</i>
                                </button>
                            </form>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76A4LYoYCpPm31u2VpUrvYALFf3f6cENRvoVRNkZGxRXR9FEdEn7Ck8bCWLa4" crossorigin="anonymous"></script>
</body>

</html>