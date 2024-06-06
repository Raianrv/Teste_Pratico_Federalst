<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Veiculo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Criar Veículo</h1>
    <form action="{{ route('admin.veiculos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" class="form-control" id="placa" name="placa" pattern="[A-Za-z]{3}[0-9]{4}" title="Formato: AAA1111" required>
        </div>
        <div class="form-group">
            <label for="renavam">Renavam</label>
            <input type="text" class="form-control" id="renavam" name="renavam" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>
        <div class="form-group">
            <label for="ano">Ano</label>
            <input type="text" class="form-control" id="ano" name="ano" pattern="[0-9]{1,4}" title="Formato: até 4 dígitos" required>
        </div>
        <div class="form-group">
            <label for="proprietario_id">Proprietário</label>
            <select name="proprietario_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>
</body>
</html>
