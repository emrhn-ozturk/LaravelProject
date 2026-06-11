@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Gelen Siparişler</h2>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th width="50">ID</th>
                    <th>Müşteri</th>
                    <th>İletişim</th>
                    <th>Adres</th>
                    <th>Toplam Tutar</th>
                    <th>Tarih</th>
                    <th width="200">Durum Güncelle</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td class="fw-bold">{{ $order->name }}</td>
                    <td>
                        {{ $order->email }}<br>
                        {{ $order->phone }}
                    </td>
                    <td><small>{{ $order->address }}</small></td>
                    <td class="text-success fw-bold">{{ number_format($order->total_amount, 2, ',', '.') }} ₺</td>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-flex gap-1">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-select form-select-sm">
                                <option value="Beklemede" {{ $order->status == 'Beklemede' ? 'selected' : '' }}>Beklemede</option>
                                <option value="Kargolandı" {{ $order->status == 'Kargolandı' ? 'selected' : '' }}>Kargolandı</option>
                                <option value="Teslim Edildi" {{ $order->status == 'Teslim Edildi' ? 'selected' : '' }}>Teslim Edildi</option>
                                <option value="İptal Edildi" {{ $order->status == 'İptal Edildi' ? 'selected' : '' }}>İptal Edildi</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">Kaydet</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Henüz hiç sipariş alınmamış. Dükkanın reklamını yapma vakti geldi!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection