@extends('layouts.app')

@section('content')
    <!-- Слайдер -->
    <div id="mainSlider" class="carousel slide mx-auto mb-5" data-bs-ride="carousel"
         style="max-width: 80%; margin-top: 30px;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner rounded-4 shadow">
            <div class="carousel-item active">
                <img src="https://i.pinimg.com/736x/f5/84/a0/f584a08589032961d63e3c8a7d436b24.jpg"
                     class="d-block w-100"
                     style="height: 400px; object-fit: cover;"
                     alt="Слайд 1">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h5>Автохимия высшего качества</h5>
                    <p>Только проверенные бренды</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://i.pinimg.com/736x/93/85/f9/9385f9664ccab38cc670a7717ab7e70a.jpg"
                     class="d-block w-100"
                     style="height: 400px; object-fit: cover;"
                     alt="Слайд 2">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h5>Скидки до 50%</h5>
                    <p>На популярные товары</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://i.pinimg.com/736x/82/f2/03/82f203999d6b54ec1fbe16bcec8bcebb.jpg"
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
                    <p class="lead">Мир Химии - интернет-магазин автомобильной химии и средств для ухода за
                        автомобилем.</p>
                    <p>Мы предлагаем только качественные товары от проверенных производителей. Наша миссия - сделать
                        уход за автомобилем простым и доступным для каждого автовладельца.</p>
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
                <div class="col-md-6 col-lg-4 mb-4 d-flex justify-content-center">
                    <div class="card product-card h-100 shadow-sm border-0" style="width: 100%; max-width: 320px;">
                        <div class="position-relative overflow-hidden"
                             style="height: 200px; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;">
                            {{-- Затемнение при отсутствии товара --}}
                            @if($product->amount <= 0)
                                <div
                                    class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center"
                                    style="z-index: 2;">
                                    <span class="badge bg-danger fs-6 px-3 py-2">Нет в наличии</span>
                                </div>
                            @endif

                            {{-- Бейдж скидки (если нужно) --}}
                            @if($product->price < 500)
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2 px-3 py-2"
                                      style="z-index: 1;">
                            <i class="bi bi-tag"></i> Скидка
                        </span>
                            @endif

                            {{-- Изображение товара --}}
                            <img src="{{ asset($product->mainImage->image_path ??
                        $product->images->first()?->image_path ??
                        $product->image_url ??
                        '/storage/products/495057.svg') }}"
                                 class="img-fluid rounded"
                                 style="max-height: 150px; height: auto; width: auto; max-width: 90%; object-fit: contain;"
                                 alt="{{ $product->name }}">
                        </div>

                        <div class="card-body text-center d-flex flex-column">
                            <h6 class="card-title fw-bold">
                                <a href="{{ route('product', $product->id) }}" class="text-decoration-none text-dark">
                                    {{ Str::limit($product->name, 50) }}
                                </a>
                            </h6>
                            <p class="text-muted small mb-2">
                                {{ $product->category->name ?? 'Без категории' }}
                            </p>
                            <div class="mb-3">
                                @if($product->price < 500)
                                    <span class="text-decoration-line-through text-muted me-2">
                                {{ number_format($product->price * 1.2, 2) }} ₽
                            </span>
                                    <span class="fs-5 fw-bold text-danger">
                                {{ number_format($product->price, 2) }} ₽
                            </span>
                                @else
                                    <span class="fs-5 fw-bold text-primary">
                                {{ number_format($product->price, 2) }} ₽
                            </span>
                                @endif
                            </div>
                            <div class="d-grid mt-auto">
                                @if($product->amount > 0)
                                    @if(Auth::user()->is_admin ?? false)
                                        {{-- Кнопки для админа --}}
                                        <div class="d-flex gap-2 mb-2">
                                            <a href="/admin/products/{{ $product->id }}/edit"
                                               class="btn btn-primary btn-sm flex-grow-1">✏️ Изменить</a>
                                            <a href="/admin/products/{{ $product->id }}/images"
                                               class="btn btn-secondary btn-sm flex-grow-1">🖼️ Фото</a>
                                        </div>
                                    @else
                                        {{-- Кнопка для пользователя --}}
                                            <a href="{{ route('product', $product->id) }}" class="btn btn-primary">Подробнее</a>
                                    @endif
                                @else
                                    {{-- Кнопка "Нет в наличии" (disabled) --}}
                                    <button class="btn btn-secondary" disabled>
                                        <i class="bi bi-x-circle"></i> Нет в наличии
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
