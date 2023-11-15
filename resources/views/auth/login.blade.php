<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="d-inline d-md-flex">
        <div class="blue-block bg-primary w-50 vh-100 d-none d-md-grid align-items-center">
            <div class="container col-lg-10">
                <div class="brand-panel">
                    <h1 class="text-uppercase fw-bold mb-3 text-center font-three">Nama Aplikasi</h1>
                    <p class="text-center px-5 font-three">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Sed, nulla!
                        Esse sed
                        qui dolor, in
                        doloremque, quaerat ipsa atque at eaque mollitia optio ea ratione vitae nesciunt sequi
                        minima
                        tenetur!</p>
                </div>
            </div>
        </div>

        <div class="login-block d-flex align-items-center px-2 py-5 py-lg-0 px-lg-5">
            <div class="w-100 px-2 py-5 py-lg-0 px-lg-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2 class="font-three fw-bold">Selamat Datang Admin</h2>
                    <p class="text-secondary mb-5">Silahkan masukkan email atau nomor telepon dan password
                        Anda untuk mulai menggunakan aplikasi</p>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-secondary font-three">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label text-secondary font-three">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit"
                        class="btn btn-primary text-uppercase font-one l-space-2 rounded-0 px-3 py-2 blue-bg-primary blue-border-primary w-100 text-uppercase font-three">Login</button>
                    <div class="py-1"></div>
                </form>
                <a href="{{ url('/') }}">
                    <button
                        class="btn btn-outline-primary text-uppercase font-one l-space-2 rounded-0 px-3 py-2 blue-border-primary blue-text-primary white-bg-button w-100">Back
                        To Home</button>
                </a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
