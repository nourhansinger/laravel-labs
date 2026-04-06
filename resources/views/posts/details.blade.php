<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">My Blog</a>
        </div>
    </nav>

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow border-0">

                    <div class="card-body p-5">

                        <h2 class="fw-bold mb-3 text-primary">
                            {{ $post->title }}
                        </h2>

                        <p class="text-muted mb-4">
                            Posted on {{ $post->created_at->format('d M Y') }}
                        </p>


                        <p class="fs-5 text-dark" style="line-height: 1.8;">
                            {{ $post->content }}
                        </p>


                        <div class="mt-4 p-3 bg-light rounded">
                            <h5 class="text-secondary mb-2">Author Details</h5>
                            <p class="mb-1"><strong>Name:</strong> {{ $post->user->name }}</p>
                            <p class="mb-0"><strong>Email:</strong> {{ $post->user->email }}</p>
                        </div>

                        <div class="mt-5 p-4 bg-white rounded shadow-sm">
                            <h4 class="mb-3">Comments</h4>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if ($post->comments->isEmpty())
                                <p class="text-muted">No comments yet. Be the first to comment!</p>
                            @else
                                <div class="list-group mb-4">
                                    @foreach ($post->comments as $comment)
                                        <div class="list-group-item border-0 shadow-sm mb-3 rounded">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div>
                                                    <strong>{{ $comment->author_name }}</strong>
                                                    <span class="text-muted">•
                                                        {{ $comment->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                            <p class="mb-0">{{ $comment->body }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <form action="/post/{{ $post->id }}/comments" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="author_name" class="form-label">Your Name</label>
                                    <input type="text" name="author_name" id="author_name"
                                        value="{{ old('author_name') }}"
                                        class="form-control @error('author_name') is-invalid @enderror">
                                    @error('author_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="body" class="form-label">Comment</label>
                                    <textarea name="body" id="body" rows="4" class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>
                                    @error('body')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Add Comment</button>
                                <a href="{{ url('/') }}" class="btn btn-secondary ms-2">Back to Home</a>
                            </form>
                        </div>

                        <div class="mt-4">
                        </div>

                    </div>

                </div>
            </div>

        </div>

</body>

</html>
