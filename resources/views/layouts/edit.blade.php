<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Veiculo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Veiculo</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.veiculos.update', $veiculo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" class="form-control" id="placa" name="placa" value="{{ $veiculo->placa }}" required>
        </div>
        <div class="form-group">
            <label for="renavam">Renavam</label>
            <input type="text" class="form-control" id="renavam" name="renavam" value="{{ $veiculo->renavam }}" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $veiculo->modelo }}" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" value="{{ $veiculo->marca }}" required>
        </div>
        <div class="form-group">
            <label for="ano">Ano</label>
            <input type="text" class="form-control" id="ano" name="ano" value="{{ $veiculo->ano }}" required>
        </div>
        <div class="form-group">
            <label for="proprietario_id">Proprietário</label>
            <input type="text" class="form-control" id="proprietario_id" name="proprietario_id" value="{{ $veiculo->proprietario->name }}" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
    </form>
</div>
</body>
</html>
