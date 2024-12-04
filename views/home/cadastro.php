<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= BASE_DIR?>getCadastro" method="POST">
        <input type="text" name="name" placeholder="name"><br>
        <input type="email" name="email" placeholder="email"><br>
        <input type="password" name="password" placeholder="senha"><br>
        <button type="submit">Entrar</button>
    </form>

    <a href="<?= BASE_DIR?>login">Login</a>
</body>
</html>