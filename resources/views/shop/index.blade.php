@extends('layouts.app')

@section('content')
    <!-- Слайдер -->
    <div id="mainSlider" class="carousel slide mx-auto mb-5" data-bs-ride="carousel" style="max-width: 80%; margin-top: 30px;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner rounded-4 shadow">
            <div class="carousel-item active">
                <img src="https://images.wallpaperscraft.com/image/single/grass_lake_trees_1451427_3840x2160.jpg"
                     class="d-block w-100"
                     style="height: 400px; object-fit: cover;"
                     alt="Слайд 1">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h5>Автохимия высшего качества</h5>
                    <p>Только проверенные бренды</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://img.freepik.com/premium-photo/milky-way-stars-night_10221-23462.jpg?semt=ais_hybrid"
                     class="d-block w-100"
                     style="height: 400px; object-fit: cover;"
                     alt="Слайд 2">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h5>Скидки до 50%</h5>
                    <p>На популярные товары</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://img.freepik.com/premium-photo/scenic-view-lake-by-mountains-against-sky_1048944-28909316.jpg?semt=ais_hybrid&w=740"
                     class="d-block w-100"
                     style="height: 400px; object-fit: cover;"
                     alt="Слайд 3">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h5>Бесплатная доставка</h5>
                    <p>При заказе от 2000 ₽</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- О компании -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="mb-3">О компании</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="lead">Мир Химии - интернет-магазин автомобильной химии и средств для ухода за автомобилем.</p>
                    <p>Мы предлагаем только качественные товары от проверенных производителей. Наша миссия - сделать уход за автомобилем простым и доступным для каждого автовладельца.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Новинки (последние 6 товаров) -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="mb-4">Новинки</h2>
        </div>
        <div class="row justify-content-center">
            @foreach($newProducts as $product)
                <div class="col-md-4 mb-4 d-flex justify-content-center">
                    <div class="card product-card" style="width: 100%; max-width: 320px;">
                        <img src="{{ $product->image_url ?? 'https://placehold.co/300x200/e9ecef/495057?text=' . urlencode($product->name) }}"
                             class="card-img-top product-img"
                             style="height: 200px; object-fit: contain; padding: 1rem;"
                             alt="{{ $product->name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ Str::limit($product->name, 40) }}</h5>
                            <p class="card-text fw-bold text-primary">{{ number_format($product->price, 2) }} ₽</p>
                            <a href="{{ route('product', $product->id) }}" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
