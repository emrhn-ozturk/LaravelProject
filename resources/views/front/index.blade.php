@extends('front.layouts.app')

@section('content')
<div class="row mb-5">
    <div class="col-12 text-center">
        <h1 class="display-5 fw-bold">Yolculuğun İçin En İyi Teknolojiler</h1>
        <p class="lead text-muted">Akıllı valizlerden taşınabilir güneş panellerine, aradığın her şey burada.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white fw-bold">
                Kategoriler
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                    Tüm Ürünler
                    <span class="badge bg-primary rounded-pill">{{ $products->count() }}</span>
                </li>
                @foreach($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $category->name }}
                        <span class="badge bg-secondary rounded-pill">{{ $category->products->count() }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="col-md-9">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                            <span class="badge bg-info text-dark mb-3 align-self-start">{{ $product->category->name ?? 'Kategori Yok' }}</span>
                            <p class="card-text text-muted small flex-grow-1">{{ \Illuminate\Support\Str::limit($product->description, 80) }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fs-5 fw-bold text-success">{{ number_format($product->price, 2, ',', '.') }} ₺</span>
                                <a href="{{ route('front.product.show', $product->id) }}" class="btn btn-sm btn-outline-primary">İncele</a>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 pt-0">
                            <small class="text-muted">Stok: {{ $product->stock }} adet</small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center border-0 shadow-sm">
                        Dükkana henüz hiç ürün eklenmemiş. Lütfen admin panelinden vitrini doldurun.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection