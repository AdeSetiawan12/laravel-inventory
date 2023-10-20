
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ade Setiawan">
    <title>Laravel Inventory By Ade S</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2/css/bootstrap.min.css') }}" >
    <link rel="icon" href="{{ asset('image/Laravel-logo.svg') }}" alt="" width="72" height="57">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-25 m-auto">
        <form method="post" action="{{ route('kirim-data-login') }}">
            @csrf
            <img class="mb-4" src="{{ asset('image/Laravel-Logo.png') }}" alt="" width="72" height="57">
            <br>{{ $errors->first('email') }}
            <h1 class="h3 mb-3 fw-normal">Silahkan Login</h1>
            <div class="form-floating">
              <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Alamat Email</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Masuk</button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2023</p>
        </form>
    </main>
    <script src="{{ asset('bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
