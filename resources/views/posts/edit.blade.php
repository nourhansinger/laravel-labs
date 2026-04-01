<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">


    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="{{ url('/home') }}" class="navbar-brand">My Blog</a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow border-0">
                    <div class="card-body p-5">

                        <h3 class="fw-bold mb-4 text-center">Edit Post</h3>

                        <form action="/post/{{$post['id']}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control"
                                       value="{{ $post['title'] }}" placeholder="Enter post title">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Content</label>
                                <textarea name="content" rows="5" class="form-control"
                                          placeholder="Write your post here...">{{ $post['content'] }}</textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ url('/posts') }}" class="btn btn-outline-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary px-4">Update</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
