<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz @yield('title')</title>
    <script src="/js/app.js"></script>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastros</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="cadastro-aluno.php">Alunos</a>
                    <a class="dropdown-item" href="cadastro-perguntas.php">Perguntas e Respostas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="cadastro-tipo-perguntas.php">Tipo de Perguntas</a>
                </div>
              </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Consultas</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Histórico dos alunos</a>
                    <a class="dropdown-item" href="#">Desempenho Geral</a>
                    <a class="dropdown-item" href="#">Perguntas</a>
                    <a class="dropdown-item" href="#">Tipo Perguntas</a>
                </div>
            </li>

            <li class="nav-item float-right">
                <a class="nav-link float-right" href="#">Logout</a>
            </li>
        </ul>
    </nav>

    <div class="container">
            @yield('content')
    </div>
</body>
</html>