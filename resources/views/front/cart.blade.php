@extends('front.layouts.app')

@section('content')
<h2 class="mb-4 fw-bold">Alışveriş Sepetim</h2>

<div class="card shadow-sm border-0">
    <div class="card-body">
        @if(session('cart'))
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Ürün</th>
                        <th>Fiyat</th>
                        <th>Adet</th>
                        <th>Toplam</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity']; @endphp
                        <tr>
                            <td class="fw-bold">{{ $details['name'] }}</td>
                            <td>{{ number_format($details['price'], 2, ',', '.') }} ₺</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td class="text-success fw-bold">{{ number_format($details['price'] * $details['quantity'], 2, ',', '.') }} ₺</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end fw-bold fs-5">Genel Toplam:</td>
                        <td class="text-success fw-bold fs-5">{{ number_format($total, 2, ',', '.') }} ₺</td>
                    </tr>
                </tfoot>
            </table>
            <div class="text-end mt-3">
                <button class="btn btn-primary btn-lg fw-bold">Siparişi Tamamla</button>
            </div>
        @else
            <div class="alert alert-warning text-center m-0 border-0 shadow-sm">
                Sepetinizde henüz ürün bulunmamaktadır.
            </div>
        @endif
    </div>
</div>
@endsection