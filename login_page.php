<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Acesse sua conta</h1>
    <form method="post" action="login_crud.php?acao=logar" name="dados" onSubmit="return enviardados();">
        <p>
            <label>E-mail</label>
            <input type="text" name="Email">
        </p>
        
        <p>
            <label>Senha</label>
            <input type="password" name="Senha">
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>
</body>
</html>