@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Kategoriler</h2>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Yeni Kategori Ekle</a>
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
                    <th>Kategori Adı</th>
                    <th width="150">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <span class="badge bg-secondary">İşlemler Eklenecek</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Henüz hiç kategori eklenmemiş.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection