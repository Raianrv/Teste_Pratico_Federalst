<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes do Veículo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Pagina Principal</a>
    <h2>Detalhes do Veículo</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Placa: {{ $veiculo->placa }}</h5>
            <p class="card-text"><strong>Renavam:</strong> {{ $veiculo->renavam }}</p>
            <p class="card-text"><strong>Modelo:</strong> {{ $veiculo->modelo }}</p>
            <p class="card-text"><strong>Marca:</strong> {{ $veiculo->marca }}</p>
            <p class="card-text"><strong>Ano:</strong> {{ $veiculo->ano }}</p>
            <p class="card-text"><strong>Proprietário:</strong> {{ $veiculo->proprietario->name }}</p>
            @if(Auth::user()->role == 2)
            <a href="{{ route('admin.home') }}"class="btn btn-primary">Pagina Admin</a>
            @else
            <a href="{{ route('veiculos.meusVeiculos') }}" class="btn btn-primary">Voltar para Meus Veículos</a>
            @endif
        </div>
    </div>
</div>
</body>
</html>
