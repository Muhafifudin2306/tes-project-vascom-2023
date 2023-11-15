<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="py-3 bg-white border-bottom fixed-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="image-navbar">
                    <div class="d-flex gap-1">
                        <img src="{{ asset('assets/image/vascom_logo.png') }}" class="object-fit-contain"
                            alt="Vascomm Logo">
                        <img src="{{ asset('assets/image/vascom_text_logo.png') }}"
                            class="object-fit-contain d-none d-md-inline" alt="Vascomm Text Logo">
                    </div>
                </div>

                <div class="search-navbar d-none d-lg-inline w-50">
                    <form class="d-flex" role="search" action="/" method="GET">
                        <input
                            class="px-3 py-2 rounded-0 rounded-start-1 grey-bg-secondary border-0 grey-border-secondary w-100 text-secondary l-space-2"
                            type="search" name="query" placeholder="Cari Parfum Kesukaanmu" aria-label="Search">
                        <button class="btn btn-secondary rounded-0 rounded-end-1 grey-bg-secondary border-0"
                            type="submit">
                            <i class="bi bi-search text-black"></i>
                        </button>
                    </form>
                </div>


                <div class="button-navbar d-none d-lg-inline">
                    <div class="d-flex gap-2">
                        <a href="{{ route('register') }}">
                            <button
                                class="btn btn-outline-primary text-uppercase font-one l-space-2 rounded-0 px-3 py-2 blue-border-primary blue-text-primary white-bg-button">Daftar</button>
                        </a>
                        <a href="{{ route('login') }}"><button
                                class="btn btn-primary text-uppercase font-one l-space-2 rounded-0 px-3 py-2 blue-bg-primary blue-border-primary ">Masuk</button></a>
                    </div>
                </div>

                <div class="mobile-panel d-inline d-lg-none">
                    <button
                        class="btn btn-outline-primary white-bg-button blue-bg-primary blue-border-primary rounded-0"
                        data-bs-toggle="modal" data-bs-target="#navbarModal"><i class="bi bi-list fs-5"></i></button>
                </div>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="navbarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="search-navbar">
                        <form class="d-flex" role="search">
                            <input
                                class="px-3 py-2 rounded-0 rounded-start-1 grey-bg-secondary border-0 grey-border-secondary w-100 text-secondary l-space-1"
                                type="search" placeholder="Cari Parfum Kesukaanmu" aria-label="Search">
                            <button class="btn btn-secondary rounded-0 rounded-end-1 grey-bg-secondary border-0"
                                type="submit"><i class="bi bi-search text-black"></i></button>
                        </form>
                    </div>
                    <div class="py-2"></div>
                    <div class="button-navbar">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('register') }}">
                                <button
                                    class="btn btn-outline-primary text-uppercase font-one l-space-2 rounded-0 px-3 py-2 blue-border-primary blue-text-primary white-bg-button">Daftar</button>
                            </a>
                            <a href="{{ route('login') }}"><button
                                    class="btn btn-primary text-uppercase font-one l-space-2 rounded-0 px-3 py-2 blue-bg-primary blue-border-primary ">Masuk</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-5"></div>

    <main>

        <!-- Carousel -->
        <div class="container col-lg-10 px-5">
            <section class="splide" id="splide-1" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <img class="object-fit-cover w-100 h-100" src="{{ asset('assets/image/slide_1.png') }}"
                                alt="">
                        </li>
                        <li class="splide__slide">
                            <img class="object-fit-cover w-100 h-100" src="{{ asset('assets/image/slide_2.png') }}"
                                alt="">
                        </li>
                        <li class="splide__slide">
                            <img class="object-fit-cover w-100 h-100" src="{{ asset('assets/image/slide_3.png') }}"
                                alt="">
                        </li>
                    </ul>
                </div>
            </section>
        </div>

        <div class="py-4"></div>

        <!-- Card 1 -->
        <div class="container col-lg-10 px-5">
            <h2 class="font-two">Terbaru</h2>

            <div class="py-3"></div>

            <div class="parfume-list">
                <section class="splide" id="splide-2" aria-label="Splide Basic HTML Example">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($latest_products as $item)
                                <li class="splide__slide">
                                    <div class="parfume-card px-4 py-3 mx-1 rounded-1">
                                        <div class="image-card">
                                            <img src="{{ asset('assets/image/' . $item->product_image) }}"
                                                class="w-100 pb-2 object-fit-contain h-100" alt="">
                                        </div>
                                        <div class="desc-card">
                                            <h5 class="font-two pb-1 pt-4">{{ $item->product_name }}</h5>
                                            <h6 class="font-one blue-text">IDR
                                                {{ number_format($item->product_price, 0, ',', '.') }}</h6>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
        </div>

        <div class="py-4"></div>

        <!-- Card 2 -->
        <div class="container col-lg-10 px-5">
            <h2 class="font-two">Produk Tersedia</h2>
            <div class="py-3"></div>
            <div class="parfume-list" id="data-container">
                <div class="row">
                    @foreach ($products as $item)
                        <div class="col-6 col-lg-3">
                            <div class="parfume-card px-4 py-3 mx-1 rounded-1">
                                <div class="image-card">
                                    <img src="{{ asset('assets/image/' . $item->product_image) }}"
                                        class="w-100 pb-2 object-fit-contain h-100" alt="">
                                </div>
                                <div class="desc-card">
                                    <h5 class="font-two pb-1 pt-4">{{ $item->product_name }}</h5>
                                    <h6 class="font-one blue-text">IDR
                                        {{ number_format($item->product_price, 0, ',', '.') }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center py-5">
                    <button id="load-more" data-offset="{{ count($products) }}"
                        class="btn btn-outline-primary text-uppercase font-one l-space-2 rounded-0 px-3 py-2 blue-border-primary blue-text-primary white-bg-button">
                        Lihat Lebih Banyak
                    </button>
                </div>
            </div>
        </div>
    </main>


    <footer class="border-top">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-8">
                    <div class="link-media">
                        <div class="py-4 mt-3"></div>
                        <div class="row">
                            <div class="col-lg-4 col-6 mb-3">
                                <div class="title-link">
                                    <h5 class="font-two">Layanan</h5>
                                </div>
                                <div class="link-list pt-4">
                                    <div class="link-partial mb-2">
                                        <a href="/" class="text-uppercase l-space-2">Bantuan</a>
                                    </div>
                                    <div class="link-partial mb-2">
                                        <a href="/" class="text-uppercase l-space-2">Tanya Jawab</a>
                                    </div>
                                    <div class="link-partial mb-2">
                                        <a href="/" class="text-uppercase l-space-2">Hubungi Kami</a>
                                    </div>
                                    <div class="link-partial mb-2">
                                        <a href="/" class="text-uppercase l-space-2">Cara Berjualan</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6 mb-3">
                                <h5 class="font-two">Tentang Kami</h5>
                                <div class="link-list pt-4">
                                    <div class="link-partial mb-2">
                                        <a href="/" class="text-uppercase l-space-2">About Us</a>
                                    </div>
                                    <div class="link-partial mb-2">
                                        <a href="/" class="text-uppercase l-space-2">Career</a>
                                    </div>
                                    <div class="link-partial mb-2">
                                        <a href="/" class="text-uppercase l-space-2">Blog</a>
                                    </div>
                                    <div class="link-partial mb-2">
                                        <a href="/" class="text-uppercase l-space-2">Kebijakan Privasi</a>
                                    </div>
                                    <div class="link-partial mb-2">
                                        <a href="/" class="text-uppercase l-space-2">Syarat dan Ketentuan</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6 mb-3">
                                <h5 class="font-two">Mitra</h5>
                                <div class="link-list pt-4">
                                    <div class="link-partial mb-2">
                                        <a href="/" class="text-uppercase l-space-2">Supplier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sosial-media py-5">
                        <div class="footer-logo">
                            <div class="d-flex justify-content-center">
                                <img class="py-4" src="{{ asset('assets/image/vascom_logo_footer.png') }}"
                                    alt="vascom_logo">
                            </div>
                        </div>
                        <div class="desc-logo">
                            <p class="text-center px-4 fw-light text-secondary">Lorem ipsum dolor sit, amet consectetur
                                adipisicing
                                elit. Fuga
                                expedita culpa minima nihil ad ex!.</p>
                        </div>
                        <div class="sosmed-block">
                            <div class="text-center pt-4">
                                <a href="/">
                                    <i class="bi bi-facebook px-2 fs-5"></i>
                                </a>
                                <a href="/">
                                    <i class="bi bi-twitter-x px-2 fs-5"></i>
                                </a>
                                <a href="/">
                                    <i class="bi bi-instagram  px-2 fs-5"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
        var splide = new Splide('#splide-1', {
            type: 'loop',
            drag: 'free',
            snap: true,
            perPage: 1,
        });

        splide.mount();
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('#splide-2', {
                type: 'loop',
                drag: 'free',
                snap: true,
                perPage: determinePerPage(),
            });

            splide.mount();

            window.addEventListener('resize', function() {
                splide.options.perPage = determinePerPage();
                splide.refresh();
            });
        });

        function determinePerPage() {
            const mobileBreakpoint = 1280;
            return window.innerWidth < mobileBreakpoint ? 2 : 4;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#load-more').on('click', function() {
                var offset = $(this).data('offset');

                $.ajax({
                    url: '/load-more',
                    type: 'GET',
                    data: {
                        offset: offset
                    },
                    success: function(data) {
                        if (data.end) {
                            $('#load-more')
                                .hide(); // Sembunyikan tombol jika tidak ada data lagi
                        } else {
                            $('#data-container .row').append(data);
                            $('#load-more').data('offset', offset + data.length);
                        }
                    }
                });
            });
        });
    </script>



</body>

</html>
