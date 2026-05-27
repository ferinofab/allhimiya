@extends('layouts.app')

@section('title', 'Главная - Мир Химии | Автомобильная химия с доставкой')
@section('description', 'Интернет-магазин автомобильной химии Мир Химии. Широкий ассортимент автохимии, косметики и аксессуаров. Доставка по всей России. Акции и скидки.')
@section('keywords', 'автохимия, автокосметика, интернет-магазин, автомобильная химия, купить автохимию')
@section('og_title', 'Мир Химии - Автомобильная химия для профессионалов')
@section('og_description', 'Качественная автохимия с доставкой по России')

@section('content')
    <div class="home-page">
        <!-- Слайдер -->
        <div id="mainSlider" class="carousel slide mx-auto mb-5 animate-on-scroll"
             data-bs-ride="carousel" style="max-width: 80%; margin-top: 30px;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="0" class="active" aria-label="Слайд 1"></button>
                <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="1" aria-label="Слайд 2"></button>
                <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="2" aria-label="Слайд 3"></button>
            </div>
            <div class="carousel-inner rounded-4 shadow">
                <div class="carousel-item active">
                    <img src="https://i.pinimg.com/736x/f5/84/a0/f584a08589032961d63e3c8a7d436b24.jpg"
                         class="d-block w-100"
                         style="height: 400px; object-fit: cover;"
                         alt="Автохимия высшего качества">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                        <h5>Автохимия высшего качества</h5>
                        <p>Только проверенные бренды</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/736x/93/85/f9/9385f9664ccab38cc670a7717ab7e70a.jpg"
                         class="d-block w-100"
                         style="height: 400px; object-fit: cover;"
                         alt="Скидки до 50% на автохимию">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                        <h5>Скидки до 50%</h5>
                        <p>На популярные товары</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/736x/82/f2/03/82f203999d6b54ec1fbe16bcec8bcebb.jpg"
                         class="d-block w-100"
                         style="height: 400px; object-fit: cover;"
                         alt="Бесплатная доставка автохимии">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                        <h5>Бесплатная доставка</h5>
                        <p>При заказе от 2000 ₽</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </button>
        </div>

        <!-- Преимущества -->
        <div class="container mb-5">
            <div class="row g-4 text-center">
                <div class="col-md-3 col-6 animate-on-scroll">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-truck fs-1 text-primary"></i>
                        </div>
                        <h5 class="mt-3">Быстрая доставка</h5>
                        <p class="text-muted small">По всей России</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 animate-on-scroll">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check fs-1 text-primary"></i>
                        </div>
                        <h5 class="mt-3">Гарантия качества</h5>
                        <p class="text-muted small">Оригинальная продукция</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 animate-on-scroll">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-arrow-repeat fs-1 text-primary"></i>
                        </div>
                        <h5 class="mt-3">Лёгкий возврат</h5>
                        <p class="text-muted small">14 дней на возврат</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 animate-on-scroll">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-headset fs-1 text-primary"></i>
                        </div>
                        <h5 class="mt-3">Поддержка 24/7</h5>
                        <p class="text-muted small">Всегда на связи</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- О компании -->
        <div class="about-section mb-5 py-5 bg-light">
            <div class="container">
                <div class="row justify-content-center animate-on-scroll">
                    <div class="col-md-10 text-center">
                        <h2 class="section-title mb-4">О компании</h2>
                        <div class="about-content">
                            <p class="lead">Мир Химии - интернет-магазин автомобильной химии и средств для ухода за автомобилем.</p>
                            <p>Мы предлагаем только качественные товары от проверенных производителей. Наша миссия - сделать уход за автомобилем простым и доступным для каждого автовладельца.</p>
                            <div class="about-stats row mt-4 g-3">
                                <div class="col-sm-4">
                                    <div class="stat-item">
                                        <span class="stat-number">500+</span>
                                        <span class="stat-label">Товаров</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="stat-item">
                                        <span class="stat-number">50+</span>
                                        <span class="stat-label">Брендов</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="stat-item">
                                        <span class="stat-number">10000+</span>
                                        <span class="stat-label">Довольных клиентов</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Новинки -->
        <div class="container mb-5">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="section-title animate-on-scroll">Новинки</h2>
                    <p class="text-muted animate-on-scroll">Самые свежие поступления в нашем магазине</p>
                </div>
            </div>

            @if($newProducts->count() > 0)
                <div class="row justify-content-center g-4">
                    @foreach($newProducts as $product)
                        <div class="col-md-6 col-lg-4 d-flex animate-on-scroll">
                            <div class="product-card w-100">
                                <div class="product-image-wrapper">
                                    @if($product->amount <= 0)
                                        <div class="product-out-of-stock">
                                            <span class="out-of-stock-badge">Нет в наличии</span>
                                        </div>
                                    @endif

                                    @if($product->price < 500)
                                        <div class="product-sale-badge">
                                            <i class="bi bi-tag"></i> Скидка
                                        </div>
                                    @endif

                                    <img src="{{ asset($product->mainImage->image_path ?? $product->images->first()?->image_path ?? $product->image_url ?? '/storage/products/495057.svg') }}"
                                         class="product-image"
                                         alt="{{ $product->name }}"
                                         loading="lazy"
                                         onerror="this.src='{{ asset('/storage/products/495057.svg') }}'">
                                </div>

                                <div class="product-body">
                                    <h6 class="product-title">
                                        <a href="{{ route('product', $product->id) }}" class="stretched-link">
                                            {{ Str::limit($product->name, 50) }}
                                        </a>
                                    </h6>
                                    <p class="product-category">
                                        {{ $product->category->name ?? 'Без категории' }}
                                    </p>
                                    <div class="product-price">
                                        @if($product->price < 500)
                                            <span class="old-price">{{ number_format($product->price * 1.2, 0, ',', ' ') }} ₽</span>
                                            <span class="current-price sale-price">{{ number_format($product->price, 0, ',', ' ') }} ₽</span>
                                        @else
                                            <span class="current-price">{{ number_format($product->price, 0, ',', ' ') }} ₽</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-5 animate-on-scroll">
                    <a href="{{ route('catalog') }}" class="btn btn-outline-primary btn-lg px-5">
                        Смотреть весь каталог <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-box-seam fs-1 text-muted"></i>
                    <p class="text-muted mt-3">Новинки скоро появятся</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Feature cards */
        .feature-card {
            padding: 1.5rem;
            border-radius: 1rem;
            transition: transform 0.3s, box-shadow 0.3s;
            background: white;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 50%;
            transition: all 0.3s;
        }

        .feature-card:hover .feature-icon {
            background: var(--primary);
        }

        .feature-card:hover .feature-icon i {
            color: white !important;
        }

        /* Section titles */
        .section-title {
            font-size: 2rem;
            font-weight: bold;
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary);
            border-radius: 3px;
        }

        /* About section */
        .about-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
        }

        .stat-number {
            display: block;
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary);
        }

        .stat-label {
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* Product card */
        .product-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .product-image-wrapper {
            position: relative;
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            overflow: hidden;
        }

        .product-image {
            max-height: 180px;
            max-width: 90%;
            object-fit: contain;
            transition: transform 0.3s;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-out-of-stock {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        .out-of-stock-badge {
            background: #dc3545;
            color: white;
            padding: 8px 16px;
            border-radius: 30px;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .product-sale-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #dc3545;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: bold;
            z-index: 2;
        }

        .product-body {
            padding: 1rem;
            text-align: center;
        }

        .product-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .product-title a {
            color: #1e293b;
            text-decoration: none;
            transition: color 0.2s;
        }

        .product-title a:hover {
            color: var(--primary);
        }

        .product-category {
            font-size: 0.8rem;
            color: #6c757d;
            margin-bottom: 0.75rem;
        }

        .product-price {
            margin-top: 0.5rem;
        }

        .current-price {
            font-size: 1.25rem;
            font-weight: bold;
            color: var(--primary);
        }

        .sale-price {
            color: #dc3545;
        }

        .old-price {
            font-size: 0.85rem;
            text-decoration: line-through;
            color: #6c757d;
            margin-right: 8px;
        }

        /* Stretched link fix */
        .stretched-link::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1;
            content: "";
        }

        .product-card .btn {
            position: relative;
            z-index: 2;
        }

        /* Адаптив */
        @media (max-width: 768px) {
            .carousel-inner img {
                height: 250px !important;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .stat-number {
                font-size: 1.5rem;
            }

            .feature-card {
                padding: 1rem;
            }

            .feature-icon {
                width: 50px;
                height: 50px;
            }

            .feature-icon i {
                font-size: 1.5rem !important;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Автоматическое переключение слайдов каждые 5 секунд
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('mainSlider');
            if (slider && typeof bootstrap !== 'undefined') {
                new bootstrap.Carousel(slider, {
                    interval: 5000,
                    wrap: true,
                    pause: 'hover'
                });
            }
        });
    </script>
@endpush
