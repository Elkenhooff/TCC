<?php
session_start();
include("cadastro.php");
$objetoCadastra = new Cadastro();
//$objetoLogin = new Login();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($_POST['tipo'] == "cadastro"){
        $objetoCadastra -> cadastroCliente();
        $resultado =  $objetoCadastra -> getResultado();
        $_SESSION['resultado'] = $resultado;
        if ($_SESSION['resultado'] != ""){
        echo ("<script>document.addEventListener('DOMContentLoaded', function(){
            document.querySelector('.Cadastro').style.display = 'flex';
            document.querySelector('.Login').style.display = 'none';
            login = false;
        })</script>;");
        }
        switch ($resultado){
            case 0:
                echo ("<script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('tituloResultado').style.display = 'block';
                    document.getElementById('tituloResultado').innerHTML = 'Usuário já cadastrado';
                });
                </script>;");
                break;
            case 1:
                echo ("<script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('tituloResultado').style.display = 'block';
                    document.getElementById('tituloResultado').innerHTML = 'Por favor preencha todos os campos';
                });
                </script>;");
            default:
                break;  
        }
        // if ($objetoCadastra ->  getResultado() == 0){
           
        //     echo ("<script>
        //     document.addEventListener('DOMContentLoaded', function() {
        //         document.getElementById('tituloResultado').innerHTML = 'Usuário já cadastrado';
        //     });
        //     </script>;");
        //     //echo("<script>document.getElementById('tituloResultado').innerHTML = 'abc';</script>");
        // }
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
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
</head>
<body>
    <div class="Login">
        <form action="login.php" method="post" id="formLogin">
            <input type="hidden" name="tipo" value="login">
            <label for="email">Email</label><br>
            <input type="email" name="email"><br>
            <!-- <label for="nome">Nome</label><br>
            <input type="text" name="nome"><br> -->
            <label for="senha">Senha</label><br>
            <input type="password" name="senha"><br>
            <a href="recuperarsenha.html">Recuperar senha</a><br>
            <p id="trocarForm">Não possui conta? Clique aqui.</p>
            <button type="submit" id="btn">Entrar</button>
        </form>
    </div>
    <div class="Cadastro">
        <form action="login.php" method="post" id="formCadastro">
            <h2 id="tituloResultado" style="display: none;"></h2>
            <label for="escolha">Função</label><br>
            <select>
                <option value="escolha">Escolha sua função</option>
                <option value="cliente">Cliente</option>
                <option value="funcionario">Chefe</option>
            </select><br>
            <input type="hidden" name="tipo" value="cadastro">
            <label for="email">Email</label><br>
            <input type="email" name="email"><br>
            <label for="nome">Nome Completo</label><br>
            <input type="text" name="nome"><br>
            <label for="senha">Senha</label><br>
            <input type="password" name="senha"><br>
            <p id="trocarForm">Já possui conta? Clique aqui.</p>
            <button type="submit" id="btn">Cadastrar</button>
        </form>
    </div>
    <script src="./js/script.js"></script>
    
</body>
</html>