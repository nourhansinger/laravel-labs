<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">My Blog</a>
        </div>
    </nav>

   
    <div class="container py-5">

        <div class="text-center mb-5">
            <h1 class="fw-bold">Latest Posts</h1>
            <p class="text-muted">Check out our newest updates</p>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">All Posts</h2>

    <a href="/post/create" class="btn btn-primary px-4 shadow-sm">
        + Create Post
    </a>
</div>

        <div class="row g-4">
            @foreach ($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title fw-bold text-primary">
                                {{ $post['title'] }}
                            </h5>

                            <p class="card-text text-muted">
                                {{ Str::limit($post['content'], 100) }}
                            </p>

                            <div class="mt-auto">
                                <a href="/post/{{ $post['id'] }}" class="btn btn-outline-primary w-100">
                                    View Details
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>