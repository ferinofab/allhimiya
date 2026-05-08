<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Мир Химии - Интернет магазин автомобильной химии')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .hero-slider {
            margin-bottom: 2rem;
        }
        .swiper-slide img {
            height: 400px;
            object-fit: cover;
            width: 100%;
        }
        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 1.5rem;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .product-img {
            height: 200px;
            object-fit: contain;
            padding: 1rem;
        }
        .footer {
            margin-top: auto;
            background-color: #f8f9fa;
            padding: 2rem 0;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
        .cart-badge {
            position: absolute;
            top: -2px;
            right: -8px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            font-size: 0.65rem;
            font-weight: bold;
            min-width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 4px;
            box-shadow: 0 0 0 1px white;
        }
        .category-card {
            cursor: pointer;
            transition: all 0.3s;
        }
        .category-card:hover {
            background-color: #0d6efd;
            color: white;
        }
        .dropdown-submenu {
            position: relative;
        }
        .dropdown-submenu > .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
        }
        .dropdown-submenu:hover > .dropdown-menu {
            display: block;
        }
        .dropdown-submenu > a:after {
            display: block;
            content: "›";
            float: right;
            margin-top: 0;
            margin-right: 0;
        }
    </style>

    @stack('styles')
</head>
<body>

<!-- Шапка сайта -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="bi bi-droplet-fill text-primary"></i> Мир Химии
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="bi bi-house"></i> Главная
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('catalog*') ? 'active' : '' }}" href="{{ route('catalog') }}">
                        <i class="bi bi-grid"></i> Каталог
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-tags"></i> Категории
                    </a>
                    <ul class="dropdown-menu">
                        @php
                            $parentCategories = App\Models\Category::whereNull('parent_id')->take(5)->get();
                        @endphp
                        @foreach($parentCategories as $cat)
                            @if($cat->children->count() > 0)
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">
                                        {{ $cat->name }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($cat->children as $child)
                                            <li>
                                                <a class="dropdown-item" href="{{ route('catalog.category', $child->slug) }}">
                                                    {{ $child->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a class="dropdown-item" href="{{ route('catalog.category', $cat->slug) }}">
                                        {{ $cat->name }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="/catalog">
                                <strong>Все категории →</strong>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <form class="d-flex me-3" action="{{ route('catalog') }}" method="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="Поиск товаров..." aria-label="Search" value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
            </form>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link position-relative" href="{{ route('cart') }}" style="padding: 0.5rem 0.8rem;">
                        <i class="bi bi-cart fs-5"></i>
                        @auth
                            @php
                                $cart = App\Models\Cart::where('user_id', Auth::id())->first();
                                $cartCount = $cart ? $cart->items->sum('quantity') : 0;
                            @endphp
                            @if($cartCount > 0)
                                <span class="cart-badge">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        @endauth
                    </a>
                </li>

                @auth
                    @if(Auth::user()->is_admin)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-shield-lock"></i> Админ
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.no-category') }}">
                                        <i class="bi bi-tags"></i> Товары без категории
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.with-category') }}">
                                        <i class="bi bi-list-ul"></i> Товары с категориями
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('admin.sync') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item" style="cursor: pointer;">
                                            <i class="bi bi-arrow-repeat"></i> Синхронизация с МойСклад
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                    <i class="bi bi-person"></i> Личный кабинет
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('orders.history') }}">
                                    <i class="bi bi-clock-history"></i> Мои заказы
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right"></i> Выйти
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Вход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Основной контент -->
<main>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</main>

<!-- Подвал -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5><i class="bi bi-droplet-fill text-primary"></i> Мир Химии</h5>
                <p class="text-muted">Интернет-магазин автомобильной химии с доставкой по всей России. Только качественные товары от проверенных производителей.</p>
                <div>
                    <a href="#" class="text-muted me-2"><i class="bi bi-vk fs-5"></i></a>
                    <a href="#" class="text-muted me-2"><i class="bi bi-telegram fs-5"></i></a>
                    <a href="#" class="text-muted me-2"><i class="bi bi-instagram fs-5"></i></a>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <h6>Информация</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none text-muted">О компании</a></li>
                    <li><a href="#" class="text-decoration-none text-muted">Доставка и оплата</a></li>
                    <li><a href="#" class="text-decoration-none text-muted">Возврат товара</a></li>
                    <li><a href="#" class="text-decoration-none text-muted">Контакты</a></li>
                </ul>
            </div>
            <div class="col-md-2 mb-3">
                <h6>Каталог</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ route('catalog') }}" class="text-decoration-none text-muted">Все товары</a></li>
                    @php
                        $footerCategories = App\Models\Category::whereNull('parent_id')->take(4)->get();
                    @endphp
                    @foreach($footerCategories as $cat)
                        <li><a href="{{ route('catalog.category', $cat->slug) }}" class="text-decoration-none text-muted">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 mb-3">
                <h6>Контакты</h6>
                <ul class="list-unstyled text-muted">
                    <li><i class="bi bi-telephone"></i> 8 (800) 123-45-67</li>
                    <li><i class="bi bi-envelope"></i> info@mirhimii.ru</li>
                    <li><i class="bi bi-clock"></i> Пн-Пт: 9:00 - 20:00</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="text-center text-muted">
            <small>&copy; 2024 Мир Химии. Все права защищены.</small>
        </div>
    </div>
</footer>

<!-- Скрипты -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

@stack('scripts')
</body>
</html>
