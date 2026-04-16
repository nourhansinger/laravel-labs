<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-pagination {
            margin-top: 2.5rem;
            display: flex;
            justify-content: center;
        }

        .custom-pagination .page-link {
            color: #0d6efd;
            border-radius: 0.75rem;
            padding: 0.65rem 0.9rem;
            border-color: #dee2e6;
            transition: all 0.2s ease;
        }

        .custom-pagination .page-link:hover {
            background-color: #e7f1ff;
        }

        .custom-pagination .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
        }

        .custom-pagination .page-item.disabled .page-link {
            color: #adb5bd;
            background-color: #fff;
        }
    </style>

</head>

<body class="bg-light">


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/posts">My Blog</a>
        </div>
    </nav>


    <div class="container py-5">

        <div class="text-center mb-5">
            <h1 class="fw-bold">Latest Posts</h1>
            <p class="text-muted">Check out our newest updates</p>
        </div>

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0">All Posts</h2>
                @if (!empty($trashedCount) && $trashedCount > 0)
                <p class="text-muted mb-0">You have {{ $trashedCount }} deleted
                    {{ Str::plural('post', $trashedCount) }} that can be restored.
                </p>
                @endif
            </div>

            <div class="d-flex gap-2">
                @if (!empty($trashedCount) && $trashedCount > 0)
                <form action="/posts/restore" method="POST"
                    onsubmit="return confirm('Restore all deleted posts?');">
                    @csrf
                    <button type="submit" class="btn btn-success px-4 shadow-sm">
                        Restore Deleted Posts
                    </button>
                </form>
                @endif

                <a href="/post/create" class="btn btn-primary px-4 shadow-sm">
                    + Create Post
                </a>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($posts as $post)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                        alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">

                        <h5 class="card-title fw-bold text-primary">
                            {{ $post['title'] }}
                        </h5>

                        <p class="text-muted small mb-2">
                            By: {{ $post->user->name ?? 'Unknown' }}
                        </p>

                        <p class="card-text text-muted">
                            {{ Str::limit($post['content'], 100) }}
                        </p>

                        <div class="mt-auto d-flex gap-2">
                            <a href="/post/{{ $post['id'] }}" class="btn btn-primary flex-fill">
                                View Details
                            </a>
                            <a href="/post/{{ $post['id'] }}/edit" class="btn btn-warning flex-fill">
                                Edit
                            </a>
                            <form action="/post/{{ $post['id'] }}" method="POST" class="flex-fill"
                                onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">
                                    Delete
                                </button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="custom-pagination">
            {{ $posts->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>