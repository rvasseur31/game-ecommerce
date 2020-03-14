<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />

    <title>Home</title>
    <style>
    .card {
        margin: auto;
        margin-top: 20px;
        padding-top: 20px;
        border-radius: 15px 15px 15px 15px;
        max-width: 18rem;
    }

    .img-logo {
        position: left;
        height: 40px;
        width: 45px;
    }

    .truncate-after-3-line {
        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/> -->
</head>


<body>
    <!-- <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/logo2.png') }}" class="img-logo" alt="fifa">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">PS4</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">XBOX</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Nitendo</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div> -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Featured <b>Products</b></h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="item carousel-item active">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="card">
                                        <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top"
                                            alt="product image">
                                        <div class="card-body">
                                            <h5 class="card-title">FIFA 20</h5>
                                            <p class="card-text truncate-after-3-line">Doté du moteur Frostbite™, EA
                                                SPORTS™
                                                FIFA 20 sur XBOX,
                                                PlayStation®4...</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item carousel-item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="card">
                                        <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top"
                                            alt="product image">
                                        <div class="card-body">
                                            <h5 class="card-title">FIFA 20</h5>
                                            <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                                                PlayStation®4...</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                        <div class="img-box">
                                            <img src="/examples/images/products/macbook-pro.jpg"
                                                class="img-responsive img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Macbook Pro</h4>
                                            <p class="item-price"><strike>$1099.00</strike> <span>$869.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-half-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                        <div class="img-box">
                                            <img src="/examples/images/products/speaker.jpg"
                                                class="img-responsive img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Bose Speaker</h4>
                                            <p class="item-price"><strike>$109.00</strike> <span>$99.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                        <div class="img-box">
                                            <img src="/examples/images/products/galaxy.jpg"
                                                class="img-responsive img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Samsung Galaxy S8</h4>
                                            <p class="item-price"><strike>$599.00</strike> <span>$569.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item carousel-item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                        <div class="img-box">
                                            <img src="/examples/images/products/iphone.jpg"
                                                class="img-responsive img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Apple iPhone</h4>
                                            <p class="item-price"><strike>$369.00</strike> <span>$349.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                        <div class="img-box">
                                            <img src="/examples/images/products/canon.jpg"
                                                class="img-responsive img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Canon DSLR</h4>
                                            <p class="item-price"><strike>$315.00</strike> <span>$250.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                        <div class="img-box">
                                            <img src="/examples/images/products/pixel.jpg"
                                                class="img-responsive img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Google Pixel</h4>
                                            <p class="item-price"><strike>$450.00</strike> <span>$418.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-half-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                        <div class="img-box">
                                            <img src="/examples/images/products/watch.jpg"
                                                class="img-responsive img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Apple Watch</h4>
                                            <p class="item-price"><strike>$350.00</strike> <span>$330.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="slicker-carousel responsive">
        <div class="card">
            <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top" alt="product image">
            <div class="card-body">
                <h5 class="card-title">FIFA 20</h5>
                <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                    PlayStation®4...</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top" alt="product image">
            <div class="card-body">
                <h5 class="card-title">FIFA 20</h5>
                <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                    PlayStation®4...</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top" alt="product image">
            <div class="card-body">
                <h5 class="card-title">FIFA 20</h5>
                <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                    PlayStation®4...</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top" alt="product image">
            <div class="card-body">
                <h5 class="card-title">FIFA 20</h5>
                <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                    PlayStation®4...</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top" alt="product image">
            <div class="card-body">
                <h5 class="card-title">FIFA 20</h5>
                <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                    PlayStation®4...</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top" alt="product image">
            <div class="card-body">
                <h5 class="card-title">FIFA 20</h5>
                <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                    PlayStation®4...</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div> -->

    <!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
                <div class="card">
                    <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top" alt="product image">
                    <div class="card-body">
                        <h5 class="card-title">FIFA 20</h5>
                        <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                            PlayStation®4...</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top" alt="product image">
                    <div class="card-body">
                        <h5 class="card-title">FIFA 20</h5>
                        <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                            PlayStation®4...</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top" alt="product image">
                    <div class="card-body">
                        <h5 class="card-title">FIFA 20</h5>
                        <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                            PlayStation®4...</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top" alt="product image">
                    <div class="card-body">
                        <h5 class="card-title">FIFA 20</h5>
                        <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                            PlayStation®4...</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top" alt="product image">
                    <div class="card-body">
                        <h5 class="card-title">FIFA 20</h5>
                        <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                            PlayStation®4...</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> -->


    <!-- <div class="main">
        <div class="container-fluid">
            <h1>Populaire</h1>
            <div class="horizontal-scrollable">
                <div class="col-sm-3">
                    <div class="card">
                        <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top"
                            alt="product image">
                        <div class="card-body">
                            <h5 class="card-title">FIFA 20</h5>
                            <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                                PlayStation®4...</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top"
                            alt="product image">
                        <div class="card-body">
                            <h5 class="card-title">FIFA 20</h5>
                            <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                                PlayStation®4...</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top"
                            alt="product image">
                        <div class="card-body">
                            <h5 class="card-title">FIFA 20</h5>
                            <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                                PlayStation®4...</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top"
                            alt="product image">
                        <div class="card-body">
                            <h5 class="card-title">FIFA 20</h5>
                            <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                                PlayStation®4...</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <img src="{{ asset('assets/fifa.png') }}" class="img-responsive card-img-top"
                            alt="product image">
                        <div class="card-body">
                            <h5 class="card-title">FIFA 20</h5>
                            <p class="card-text">Doté du moteur Frostbite™, EA SPORTS™ FIFA 20 sur XBOX,
                                PlayStation®4...</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>