<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../fav_icon.ico">

    <title>Painel Mundo Lenovo</title>

    <link href="../public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/vendor/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="../public/styles/server-main.css" rel="stylesheet">

    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#E65100"/>
</head>

<body>

<div class="jumbotron">
    <div class="container">
        <h1>Painel Mundo Lenovo</h1>
    </div>
</div>

<div class="container">

    <nav>
        <ul class="nav nav-justified">
            <li class="active"><a href="index.php">Notificações</a></li>
            <li><a href="endpoints.php">Endpoints</a></li>
        </ul>
    </nav>
</div>

<hr>

<div class="container">
    <form action="send.php" method="post">

        <div class="form-group">
            <textarea name="msg" id="msg" class="form-control" rows="3" placeholder="Mensagem"></textarea>
        </div>

        <button type="submit" class="btn btn-default js-push-btn">Enviar</button>
    </form>
</div>
<script src="../public/vendor/jquery.min.js"></script>
<script src="../public/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>