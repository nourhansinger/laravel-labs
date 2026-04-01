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
                            {{ $post['title'] }}
                        </h2>

                        <p class="text-muted mb-4">
                            Posted on {{ date('d M Y') }}
                        </p>


                        <p class="fs-5 text-dark" style="line-height: 1.8;">
                            {{ $post['content'] }}
                        </p>

                        <div class="mt-5">
                            <a href="/posts" class="btn btn-outline-secondary">
                                ← Back to Home
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>

</body>
</html>
