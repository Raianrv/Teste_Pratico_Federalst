<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-laravel navbar-static-top navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name','Federal ST') }} | Administrador
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.veiculos.create') }}">Criar Veículo</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li> 
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
         <main class="py-4">
            @yield('content')
            <table class="table">
                <thead>
                    <tr>
                        <th>Placa</th>
                        <th>Renavam</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Ano</th>
                        <th>Proprietário</th>
                        <th>Ações</th>
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
                            <td>{{ $veiculo->proprietario->name }}</td>
                            <td>
                                <a href="{{ route('admin.veiculos.edit', $veiculo) }}">Editar</a>
                                <form action="{{ route('admin.veiculos.destroy', $veiculo) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Deletar</button>
                                </form>
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div> 
    </body>
</html>
