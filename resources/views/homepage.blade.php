<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,
700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
</head>
<body>
    <header>
        <div class="nav-right">
            <a href=""><i class="ri-search-line"></i></a>
            <a href="{{route('cart.index')}}"><i class="ri-shopping-cart-line"></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

        @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#" style="color: black;">Action</a></li>
              <li><hr class="dropdown-divider"></li>
              <form action="/logout" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="dropdown-item" style="color: black; background: none; border: none; padding-left: 15px; cursor: pointer;">
                    Logout
                </button>
            </ul>
          </li>
            @else
                <a href="{{ route('login') }}">
                    <i class="ri-user-line" style="color: white; font-size: 24px;"></i>
                </a>
            @endauth
    </header>

    <section class="home"></section>

   
    <section class="n-product">
        <div class="center-text">
            <h2>All Product</h2>
        </div>

        <div class="n-content">
            @foreach ($bajus as $baju)
            
            <div class="row">
                <div class="row-img">
                    <img src="{{ asset('images/baju/' . $baju->gambar) }}" alt="">
                </div>
                <h3>{{ $baju->nama }}</h3>

                
                <div class="row-in">
                    <div class="row-left">
                        <form id="add-to-cart-form" action="{{ route('cart.addToCart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="baju_id" value="{{ $baju->id }}">
                            <input type="hidden" name="quantity" value="1" min="1">
                            <button>
                                Add to Cart
                                <i class="ri-shopping-cart-fill"></i>
                            </button>
                        </form>
                        
                    </div>
                    <div class="row-right">
                        <h6>Rp. {{ number_format($baju->harga, 0, ',', '.') }}</h6>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>    
            
        
        <div class="n-btn">
            <a href="#" class="btn2">View All</a>
        </div>
    </section>

    <section class="feature">
        <div class="feature-content">
            <div class="box">
                <div class="f-icon">
                    <i class="ri-bank-card-fill"></i>
                </div>
                <div class="f-text">
                    <h3>Cash On Delivery</h3>
                    <p>uvuveve uveuveuve osas</p>
                </div>
            </div>

                <div class="box">
                    <div class="f-icon">
                        <i class="ri-truck-fill"></i>
                    </div>
                    <div class="f-text">
                        <h3>Free Shipping</h3>
                        <p>uvuveve uveuveuve osas</p>
                    </div>
                </div>

                    <div class="box">
                        <div class="f-icon">
                            <i class="ri-customer-service-fill"></i>
                        </div>
                        <div class="f-text">
                            <h3>30 days return</h3>
                            <p>uvuveve uveuveuve osas</p>
                        </div>
                    </div>
        </div>
    </section>

    <section class="footer">
        <div class="footer-box">
            <h3>Company.inc</h3>
            <a href="#">About</a>
            <a href="#">Features</a>
            <a href="#">Works</a>
            <a href="#">Career</a>
        </div>

        <div class="footer-box">
            <h3>FAQ</h3>
            <a href="#">Account</a>
            <a href="#">Features</a>
            <a href="#">Works</a>
            <a href="#">Career</a>
        </div>

        <div class="footer-box">
            <h3>Resources</h3>
            <a href="#">Youtube Playlist</a>
            <a href="#">Features</a>
            <a href="#">Works</a>
        </div>

        <div class="footer-box">
            <h3>Social</h3>
            <div class="social">
                <a href="#"><i class="ri-whatsapp-fill"></i></a>
                <a href="#"><i class="ri-instagram-fill"></i></a>
                <a href="#"><i class="ri-tiktok-fill"></i></a>
            </div>
        </div>
    </section>

    <div class="copyright">
        <div class="end-text">
            <p>CopyRight 2024 By Kelompok-9</p>
        </div>
        <div class="end-img">
            <img src="../images/logo_transparant.png" alt="">
        </div>
    </div>

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>