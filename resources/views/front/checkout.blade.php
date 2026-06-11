@extends('front.layouts.app')

@section('content')
<h2 class="mb-4 fw-bold">Ödeme ve Teslimat Bilgileri</h2>

<div class="row">
    <div class="col-md-8 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Ad Soyad</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">E-Posta Adresi</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Telefon Numarası</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Teslimat Adresi</label>
                        <textarea name="address" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg w-100 fw-bold">Siparişi Onayla ve Bitir</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white fw-bold">
                Sipariş Özeti
            </div>
            <ul class="list-group list-group-flush">
                @php $total = 0; @endphp
                @foreach(session('cart') as $details)
                    @php $total += $details['price'] * $details['quantity']; @endphp
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $details['name'] }} (x{{ $details['quantity'] }})</span>
                        <strong>{{ number_format($details['price'] * $details['quantity'], 2, ',', '.') }} ₺</strong>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <span class="fw-bold">Genel Toplam</span>
                    <strong class="text-success fs-5">{{ number_format($total, 2, ',', '.') }} ₺</strong>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection