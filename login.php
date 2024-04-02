<?php
include("cadastro.php");
$objetoCadastra = new Cadastro();
//$objetoLogin = new Login();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($_POST['tipo'] == "cadastro"){
        $objetoCadastra -> cadastroCliente();
        if ($objetoCadastra ->  getResultado() == "s"){
           
            echo ("<script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('teste').innerHTML = 'Usuário já cadastrado';
            });
            </script>;");
            //echo("<script>document.getElementById('teste').innerHTML = 'abc';</script>");
        }
    } elseif ($_POST['tipo'] == "login"){

    }
    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChefConnect</title>
    
</head>
<body>
    <form action="login.php" method="post" id="formLogin">
    <input type="hidden" name="tipo" value="login">
        <label for="email">Email</label><br>
        <input type="email" name="email"><br>
        <!-- <label for="nome">Nome</label><br>
        <input type="text" name="nome"><br> -->
        <label for="senha">Senha</label><br>
        <input type="password" name="senha"><br>
        <a href="recuperarsenha.html">Recuperar senha</a><br>
        <button type="submit" id="btn">Entrar</button>
    </form>
    <form action="login.php" method="post">
        <label for="escolha">Função</label><br>
        <select>
            <option value="escolha">Escolha sua função</option>
            <option value="cliente">Cliente</option>
            <option value="funcionario">Chefe</option>
        </select><br>
        <h2 id="teste"></h2>
        <input type="hidden" name="tipo" value="cadastro">
        <label for="email">Email</label><br>
        <input type="email" name="email"><br>
        <label for="nome">Nome Completo</label><br>
        <input type="text" name="nome"><br>
        <label for="senha">Senha</label><br>
        <input type="password" name="senha"><br>
        <button type="submit" id="btn">Cadastrar</button>
    </form>
    <script src="./js/script.js"></script>
</body>
</html>