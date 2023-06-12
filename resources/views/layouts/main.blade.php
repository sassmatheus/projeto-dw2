<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('modelo')</title>

        <!-- Fonte do google -->
        <link href="https://fonts.googleapis.com/css2?family=Inter" rel="stylesheet">
        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <!-- CSS  -->
        <link rel="stylesheet" href="/css/styles.css">
        <!-- JS -->
        <script src="/js/scripts.js"></script>

    </head>
    <body>
        <header>
            <div class="logo">
                <a href="/" class="navbar-brand">
                    <img src="/img/icon/a (3).png" alt="Logo">
                </a>
            </div>
            <div class="search-bar">
                <form action="/" method="GET">
                    <input type="text" id="search" name="search" class="form-control" placeholder="Pesquisar...">
                    <span class="search-icon"><a href="#" onclick="event.preventDefault(); this.closest('form').submit();"><ion-icon name="search"></ion-icon></a></span>
                </form>
                
            </div>
            <ul class="menu">
                <li class="nav-item"><a href="/" class="nav-link">Todas as placas</a></li>
                @guest
                <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="/register" class="nav-link">Cadastrar</a></li>
                @endguest
                @auth
                <li class="nav-item"><a href="/products/create" class="nav-link">Registrar placa</a></li>
                <li class="nav-item">
                    <form action="/logout" method="POST" class="nav-item btn-sair">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-item nav-link">Sair</a>
                    </form>
                    
                </li>
                @endauth
            </ul>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row corpo">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif
                    @if(session('err'))
                        <p class="err">{{ session('err') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>

    <footer>
        <p>Matheus Sass &copy; 2023</p>
        <ul class="separador"><li> | </li></ul>
        <ul class="footer-li">
            <li class="nav-item">
                <a href="https://www.github.com/sassmatheus" target="_blank" class="nav-link">Repositório</a>
            </li>
        </ul>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
