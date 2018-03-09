<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Listagem</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/app.js"></script>
    <style>

        body{
        }
        .login{
            background-color: white; 
            border-radius: 5px;
            padding-bottom: 30px;
        }
        
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <?php if (isset($erro)) { echo $erro;}?>
            <div class="col-sm-4 col-sm-offset-4 login">
                <form action="/logar" method="post">
                    
                    <h1 class="text-center">Logo</h1>
                    <h3 class="text-center">Clínica Med Saúde</h3>
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <input type="text" name="login" class="form-control input-sm" placeholder="Login" required>
                    </div>
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <input type="password" name="senha" class="form-control input-sm" placeholder="Senha" required>
                    </div>

                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">Logar</button>
                    </div>
                </form>
                
            </div>
        </div>
        
    </div>
    <div class="text-center col-sm-12" style="position: absolute;bottom: 0px;">
        <p>Clínica Med Saúde</p>
        Rua:xxxxxxxxxxxx, N:xxxx <br>
        Bairro:xxxxxxxxxx - Fortaleza/CE <br>
        Contato: (85) xxxx-xxxx / xxxx-xxxx 
    </div>            
</body>
</html>