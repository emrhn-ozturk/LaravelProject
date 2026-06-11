@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Yeni Ürün Ekle</h2>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Geri Dön</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Ürün Adı</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="category_id" class="form-control" required>
                    <option value="">Kategori Seçin</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Fiyat (₺)</label>
                    <input type="number" step="0.01" name="price" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Stok Adedi</label>
                    <input type="number" name="stock" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Ürün Açıklaması</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Kaydet</button>
        </form>
    </div>
</div>
@endsection