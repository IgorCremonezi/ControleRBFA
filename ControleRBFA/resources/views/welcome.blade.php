<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Controle de Escritório de Contabilidade</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            main {
                height: 100vh;
            }

            .navbar {
                width: 50%;
                margin: 0 auto;
            }

            .navbar-nav {
                margin: 0 auto;
            }

            body {
                background-image: url('{{ asset('imagens/Logo Escritorio.png') }}'), linear-gradient(to bottom left, rgba(184, 152, 93, 0.5) 50%, rgba(54, 87, 106, 0.5) 50%);
                background-size: 50% cover;
                background-repeat: no-repeat;
                background-position: center;
            }
        </style>
    </head>

    <body>
        <main class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @if (Route::has('login'))

                                @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                                </li>

                                @else
                                <li class="nav-item">
                                    <a class="nav-link fs-3 mx-5" href="{{ route('login') }}">Entrar</a>
                                </li>

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link fs-3 mx-5" href="{{ route('register') }}">Cadastrar</a>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </nav> 
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>
</html>