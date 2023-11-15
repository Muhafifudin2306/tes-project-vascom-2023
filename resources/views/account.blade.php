<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Setting Page</title>

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
                <div class="panel-list p-3 active">
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
                <div class="panel-list p-3">
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
                    <div class="mt-2 mb-4 d-flex justify-content-between">
                        <h4 class="fw-bold">Manajemen User</h4>
                        {{-- <button
                            class="btn btn-primary text-uppercase font-one l-space-2 rounded-0 blue-bg-primary blue-border-primary"
                            data-bs-toggle="modal" data-bs-target="#addUser">Tambah
                            User</button> --}}
                    </div>

                    <div class="table-filed bg-white rounded border p-4">
                        <div class="mb-4"></div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->telephone }}</td>
                                        @if ($item->status == 'active')
                                            <td> <button class="btn btn-success">{{ $item->status }}</button> </td>
                                        @elseif ($item->status == 'non-active')
                                            <td> <button class="btn btn-danger">{{ $item->status }}</button></td>
                                        @endif
                                        <td>
                                            <div class="d-flex gap-2">
                                                <i class="bi bi-eye-fill fs-5 text-primary" data-bs-toggle="modal"
                                                    data-bs-target="#lookUser{{ $item->id }}"></i>
                                                <i class="bi bi-pencil-square fs-5 text-warning"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editUser{{ $item->id }}"></i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @foreach ($users as $item)
        <div class="modal fade" id="lookUser{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="fs-6 fw-bold text-center" align="center">Lihat User</span>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1"
                                        class="form-label text-secondary font-three">Nama</label>
                                    <input type="text" name="name" value="{{ $item->name }}"
                                        class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-secondary font-three">Nomor
                                        Telpon</label>
                                    <input type="text" name="telephone" value="{{ $item->telephone }}"
                                        class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label text-secondary font-three">Email</label>
                            <input type="email" class="form-control" value="{{ $item->email }}" name="email"
                                disabled>
                        </div>
                        @if ($item->status == 'active')
                            <label for="exampleInputEmail1"
                                class="form-label text-secondary font-three">Status</label>
                            <select class="form-select" disabled>
                                <option value="active" selected disabled>active</option>
                            </select>
                        @elseif ($item->status == 'non-active')
                            <label for="exampleInputEmail1"
                                class="form-label text-secondary font-three">Status</label>
                            <select class="form-select" disabled>
                                <option value="non-active" selected disabled>non-active</option>
                            </select>
                        @endif
                        <div class="py-3"></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($users as $item)
        <div class="modal fade" id="editUser{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="fs-6 fw-bold text-center" align="center">Edit User</span>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/user/active/' . $item->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1"
                                            class="form-label text-secondary font-three">Nama</label>
                                        <input type="text" name="name" value="{{ $item->name }}"
                                            class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1"
                                            class="form-label text-secondary font-three">Nomor
                                            Telpon</label>
                                        <input type="text" name="telephone" value="{{ $item->telephone }}"
                                            class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label text-secondary font-three">Email</label>
                                <input type="email" class="form-control" value="{{ $item->email }}"
                                    name="email" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label text-secondary font-three">Status</label>
                                @if ($item->status == 'active')
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option value="active" selected>active</option>
                                        <option value="non-active">non-active</option>
                                    </select>
                                @elseif ($item->status == 'non-active')
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option value="active">active</option>
                                        <option value="non-active" selected>non-active</option>
                                    </select>
                                @endif
                            </div>
                            <button type="submit"
                                class="btn btn-primary text-uppercase font-one l-space-2 rounded-0 px-3 py-2 blue-bg-primary blue-border-primary w-100">Edit</button>
                        </form>

                        <div class="py-3"></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
