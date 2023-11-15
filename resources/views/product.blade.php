<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Product Setting Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</head>

<body class="font-three">
    <nav class="py-3 bg-white border-bottom">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <div class="image-navbar">
                    <div class="d-flex gap-1">
                        <img src="{{ asset('assets/image/vascom_logo.png') }}" class="object-fit-contain"
                            alt="Vascomm Logo">
                        <img src="{{ asset('assets/image/vascom_text_logo.png') }}"
                            class="object-fit-contain d-none d-md-inline" alt="Vascomm Text Logo">
                    </div>
                </div>
                <div class="profile">
                    <div class="profile-navbar cursor-pointer py-2 px-3" onclick="toggleCardProfile()">
                        <div class="d-flex align-items-center gap-3">
                            <div class="profile-text">
                                <span class="d-block blue-text" align="right">Hallo Admin,</span>
                                <span class="d-block text-secondary" align="right">{{ Auth::user()->name }}</span>
                            </div>
                            <div class="circle-grey ">
                                <img src="{{ asset('assets/image/grey_circle.png') }}" width="50" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card-profile bg-white" id="cardProfile">
                        <div class="p-4">
                            <div class="circle-grey d-flex justify-content-center pb-2">
                                <img src="{{ asset('assets/image/grey_circle.png') }}" width="100" alt="">
                            </div>

                            <div class="profile-text">
                                <span class="d-block fw-bold text-center fs-7">{{ Auth::user()->name }}</span>
                                <span class="d-block text-secondary text-center fs-7">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <div class="logout-panel border-top text-center py-4 text-danger">
                                <i class="bi bi-power fs-4"></i>
                                <span class="text-uppercase font-one l-space-1 fs-5">Keluar</span>
                            </div>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="d-flex">
            <div class="left-panel vh-100">
                <div class="panel-list p-3">
                    <div class="panel-content d-none d-lg-inline">
                        <a href="{{ url('/home') }}" class="d-flex gap-3 align-items-center">
                            <i class="bi bi-house-door fs-3"></i>
                            <h6 class="mt-2 fw-bold">Dashboard</h6>
                        </a>
                    </div>
                    <div class="mobile-content d-inline d-lg-none d-flex justify-content-center">
                        <i class="bi bi-house-door fs-1 text-center"></i>
                    </div>
                </div>
                <div class="panel-list p-3">
                    <div class="panel-content d-none d-lg-inline">
                        <a href="{{ url('/account') }}" class="d-flex gap-3 align-items-center">
                            <i class="bi bi-search fs-3"></i>
                            <h6 class="mt-2">Manajemen User</h6>
                        </a>
                    </div>
                    <div class="mobile-content d-inline d-lg-none d-flex justify-content-center">
                        <i class="bi bi-search fs-1 text-center"></i>
                    </div>
                </div>
                <div class="panel-list p-3 active">
                    <div class="panel-content d-none d-lg-inline">
                        <a href="{{ url('/product') }}" class="d-flex gap-3 align-items-center">
                            <i class="bi bi-card-list fs-3"></i>
                            <h6 class="mt-2">Manajemen Produk</h6>
                        </a>
                    </div>
                </div>
                <div class="mobile-content d-inline d-lg-none d-flex justify-content-center">
                    <i class="bi bi-card-list fs-1 text-center"></i>
                </div>
            </div>
            <div class="content-panel bg-grey-custom vh-100">
                <div class="p-4">
                    <h4 class="fw-bold mb-5">Manajemen Produk</h4>

                    <div class="table-filed bg-white rounded border p-4">
                        <div class="mb-4"></div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th>Gambar Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga (Rp)</th>
                                    <th>Status</th>
                                    <th>Tanggal Dibuat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr class="text-center">
                                        <td>
                                            <img class="mx-2"
                                                src="{{ asset('assets/image/' . $item->product_image) }}"
                                                alt="">
                                        </td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ number_format($item->product_price, 0, ',', '.') }}</td>
                                        @if ($item->status == 'active')
                                            <td> <button class="btn btn-success">{{ $item->status }}</button> </td>
                                        @elseif ($item->status == 'non-active')
                                            <td> <button class="btn btn-danger">{{ $item->status }}</button></td>
                                        @endif
                                        <td>{{ $item->updated_at->format('d F Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        // Inisialisasi DataTable
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        function toggleCardProfile() {
            var cardProfile = document.getElementById("cardProfile");

            if (cardProfile.style.display === "none" || cardProfile.style.display === "") {
                cardProfile.style.display = "block";
                cardProfile.style.position = "absolute";
            } else {
                cardProfile.style.display = "none";
            }
        }
    </script>
</body>

</html>
