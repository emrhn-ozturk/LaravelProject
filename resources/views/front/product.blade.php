@extends('front.layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Ana Sayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100 bg-white d-flex align-items-center justify-content-center p-5">
            <h1 class="text-muted display-1">📦</h1>
        </div>
    </div>

    <div class="col-md-6">
        <h2 class="fw-bold mb-3">{{ $product->name }}</h2>
        <span class="badge bg-primary fs-6 mb-3">{{ $product->category->name ?? 'Kategori Yok' }}</span>
        
        <h3 class="text-success fw-bold mb-4">{{ number_format($product->price, 2, ',', '.') }} ₺</h3>
        
        <div class="mb-4">
            <h5 class="fw-bold">Ürün Açıklaması</h5>
            <p class="text-muted" style="white-space: pre-line;">{{ $product->description }}</p>
        </div>

        <div class="mb-4">
            <span class="text-muted d-block mb-2">Stok Durumu: <strong>{{ $product->stock }} adet mevcut</strong></span>
            
            @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <form action="{{ route('cart.add') }}" method="POST" class="d-flex gap-2 mt-3">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="number" name="quantity" class="form-control" value="1" min="1" max="{{ $product->stock }}" style="width: 80px;">
            <button type="submit" class="btn btn-success flex-grow-1 fw-bold fs-5">Sepete Ekle</button>
        </form>
        </div>
    </div>
</div>
@endsection