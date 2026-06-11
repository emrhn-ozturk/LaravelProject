@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Yeni Kategori Ekle</h2>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Geri Dön</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Kategori Adı</label>
                
                <input type="text" name="name" class="form-control" required placeholder="Örn: Akıllı Valizler">
            </div>
            <button type="submit" class="btn btn-success">Kaydet</button>
        </form>
    </div>
</div>
@endsection