<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>The Travel Tech SaaS - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        
        <div class="bg-dark text-white p-3 shadow" style="width: 250px; min-height: 100vh;">
            <h5 class="text-center mb-4 mt-2">The Travel Tech</h5>
            <hr>
            <ul class="nav flex-column mb-auto">
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Ana Sayfa</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link text-white">Kategoriler</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.products.index') }}" class="nav-link text-white">Ürünler</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.orders.index') }}" class="nav-link text-white fw-bold">Siparişler</a>
                </li>
                
            </ul>
            <hr>
            
            
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Çıkış Yap</button>
            </form>

        </div>

        
        <div class="flex-grow-1 p-4 bg-light">
            @yield('content')
        </div>
    </div>
</body>
</html>