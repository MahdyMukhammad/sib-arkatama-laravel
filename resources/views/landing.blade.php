<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Zach Store</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Zach Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page"
                            href="{{ route('dashboard') }}">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('landing', ['category' => $category->name]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#contact">contact</li>
                </ul>
                <form class="d-flex">
                    <a class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-dark ms-1">
                            <i class="bi-person-fill me-1"></i>
                            Dashboard
                        </a>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-dark ms-1">
                            <i class="bi-person-fill me-1"></i>
                            Login
                        </a>
                    @endguest
                </form>
            </div>
        </div>
    </nav>
    <!-- Carousels-->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($sliders as $slider)
                <button type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->first ? 'active' : '' }}"
                    aria-current="{{ $loop->first ? 'true' : '' }}" aria-label="Slide 1"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="3000">
                    <img src="{{ asset('storage/slider/' . $slider->image) }}" class="d-block w-100"
                        alt="{{ $slider->image }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slider->title }}</h5>
                        <p>{{ $slider->caption }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Section products-->
    <section class="py-5">
        <h2 class="text text-center">PRODUCTS</h2>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                @forelse ($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('storage/product/' . $product->image) }}"
                                alt="{{ $product->name }}" />

                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <a href="{{ route('product.show', ['id' => $product->id]) }}"
                                        style="text-decoration: none" class="text-dark">
                                        <small class="text-strong">{{ $product->category->name }}</small>
                                        <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    </a>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        @for ($i = 0; $i < $product->rating; $i++)
                                            <div class="bi-star-fill"></div>
                                        @endfor
                                    </div>
                                    <!-- Product price-->
                                    @if ($product['sale_price'] != 0)
                                        <span
                                            class="text-muted text-decoration-line-through">Rp.{{ number_format($product->price, 0) }}</span>
                                        Rp.{{ number_format($product->sale_price, 0) }}
                                    @else
                                        Rp.{{ number_format($product->price, 0) }}
                                    @endif
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add
                                        to cart</a></div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-secondary w-100 text-center" role="alert">
                        <h4>Produk belum tersedia</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Section Visi Misi-->
    <section class="about" id="about">

        <div class="row">

            <div class="content">
                <h3 class="text text-center">VISI & MISI</h3>
                <p class="text text-center">Visi Menjadi tempat belanja online yang terpercaya dan memberikan kualitas
                    terbaik dari segi mutu maupun pelayanan terhadap konsumen</p>
                <p class="text text-center">Misi Melayani segala kebutuhan pembeli baik mulai dari pemesanan hingga
                    pengiriman barang sampai di
                    tempat pembeli.</p>
            </div>

        </div>

    </section>
    <!-- Section contact us-->
    <section class="contact" id="contact">

        <div class="card-body" style="margin:100px">
            <form>
                <h3 class="text text-center">CONTACT US</h3>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputName" type="text" name="name"
                        placeholder="Enter your name" />
                    <label for="inputFirstName">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputEmail" type="email" name="email"
                        placeholder="name@example.com" />
                    <label for="inputEmail">Email address</label>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputPassword" type="password" name="password"
                                placeholder="Create a password" />
                            <label for="inputPassword">Password</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputPhone" name="phone" type="text"
                                placeholder="Confirm phone" />
                            <label for="inputPhone">Phone</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-floating mb-3 mb-md-0"></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Comment" rows="3"></textarea>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <button class="btn btn-primary btn-block" type="submit">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy;MahdyMukhammad</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
