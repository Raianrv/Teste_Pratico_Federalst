<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meus veiculos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Pagina Principal</a>
    <h2>Meus Veículos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Renavam</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Ano</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($veiculos as $veiculo)
                <tr>
                    <td><a href="{{ route('veiculos.show', $veiculo->id) }}">{{ $veiculo->placa }}</a></td>
                    <td>{{ $veiculo->renavam }}</td>
                    <td>{{ $veiculo->modelo }}</td>
                    <td>{{ $veiculo->marca }}</td>
                    <td>{{ $veiculo->ano }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
