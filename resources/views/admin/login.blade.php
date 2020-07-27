<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel - Entrar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap4/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_native.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fontawesome-5.13.0/css/all.min.css') }}">
    <link rel="icon" type="imagem/png" href="{{ asset('img/icon.png') }}" />

    <link rel="icon" type="imagem/png" href="{{ asset('img/logo.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="hold-transition login-page">
    <div class="login-box">


        <div class="card">
            <div class="card-body login-card-body">
                @if (Request::get('r') != null && Request::get('r') == 1)
                    <div class="row mt-5 alert alert-danger">Usuário não autenticado</div>
                @elseif(Request::get('r') != null && Request::get('r') == 2)
                    <div class="row mt-5 alert alert-danger">Erro interno: {{ Request::get('error') }}</div>
                @endif

                <div class="login-logo">
                    <img src="/img/logo.png" alt="">
                </div>

                <form method="POST" action="{{ route('authenticate') }}">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-b3"><i class="fas fa-envelope"></i></button>
                            </div>
                            <input type="text" placeholder="e-mail" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-b3"><i class="fas fa-key"></i></button>
                            </div>
                            <input type="password" placeholder="senha" class="form-control" name="password">
                        </div>
                    </div>
                    <!--<a class="text-white" href="">Recuperar senha</a>-->
                    <div class="col-lg-12 mt-5 text-center">
                        <button type="submit" class="btn btn-b3">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>