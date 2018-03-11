<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <script src="/js/app.js"></script>
    <style>

        body{
            background-color: #E0FFFF;
        }
        .login{
            background-color: white; 
            border-radius: 5px;
            padding-bottom: 30px;
        }
        .div.flex-align{
              display: -webkit-flexbox;
              display: -ms-flexbox;
              display: -webkit-flex;
              display: flex;
              -webkit-flex-align: center;
              -ms-flex-align: center;
              -webkit-align-items: center;
              align-items: center;
              height: 100%;
        }
        
    </style>
</head>
<body>
    <div class="flex-align">

        <div class="container span7 text-center col-md-2 " style="margin: 0 auto;float: none;">
            <div class="row">
                <?php if (isset($erro)) { echo $erro;}?>
                <div class=" login">
                    <form action="/logar" method="post">
                        
                        <h1 class="text-center"><img src="https://png.icons8.com/color/100/000000/test-tube.png"></h1>
                        <h3 class="text-center">KnowQui</h3>
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                        <div class="form-group col-sm-12 col-sm-offset-1">
                            <input type="text" name="login" class="form-control input-sm" placeholder="Login" required>
                        </div>
                        <div class="form-group col-sm-12 col-sm-offset-1">
                            <input type="password" name="senha" class="form-control input-sm" placeholder="Senha" required>
                        </div>

                        <div class="form-group col-sm-12 col-sm-offset-1">
                            <button type="submit" class="btn btn-outline-primary btn-block btn-sm">Logar</button>
                        </div>
                    </form>
                    
                </div>
            </div>
            
        </div>    
    </div>      
</body>
</html>