@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Ürünler</h2>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Yeni Ürün Ekle</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th width="50">ID</th>
                    <th>Ürün Adı</th>
                    <th>Kategori</th>
                    <th>Fiyat</th>
                    <th>Stok</th>
                    <th>Ekleyen</th>
                    <th width="150">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? 'Bilinmiyor' }}</td>
                    <td>{{ $product->price }} ₺</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->user->name ?? 'Bilinmiyor' }}</td>
                    <td>
                        <span class="badge bg-secondary">İşlemler</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Henüz hiç ürün eklenmemiş.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection