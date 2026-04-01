<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>

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

    <!-- Content -->
    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card shadow border-0">
                    <div class="card-body p-5">

                        <h3 class="fw-bold mb-4 text-center">Create New Post</h3>

                        
                        <form action="/post/create" method="POST">
                            @csrf

                          
                            <div class="mb-3">
                                <label class="form-label">Post Title</label>
                                <input type="text" name="title" 
                                       class="form-control @error('title') is-invalid @enderror"
                                       placeholder="Enter post title" 
                        >

                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Content -->
                            <div class="mb-4">
                                <label class="form-label">Content</label>
                                <textarea name="content" rows="5"
                                          class="form-control @error('content') is-invalid @enderror"
                                          placeholder="Write your post here..."></textarea>

                                @error('content')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                           
                            <div class="d-flex justify-content-between">

                                <a href="{{ url('/home') }}" class="btn btn-outline-secondary">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-primary px-4">
                                    Create
                                </button>

                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

</body>
</html>