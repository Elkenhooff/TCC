<?php
session_start();
include("cadastro.php"); include("loginCliFunc.php");
$objetoCadastra = new Cadastro();
$objetoLogin = new Login();

$mensagemCadastro = '';
$mensagemLogin = '';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $resultado = "";
    if ($_POST['tipo'] == "cadastro"){
        $escolha = $_POST['selectCadastro'];
        if ($escolha == "escolha"){
            $mensagemCadastro = "Por favor escolha um função";
        }else{
            $objetoCadastra -> Cadastrar();
            $resultado = $objetoCadastra -> getResultado(); 
        }

        switch ($resultado){
            case 0: 
                $mensagemCadastro = "Usuário já cadastrado";
                break;
            case 1:
                $mensagemCadastro = "Por favor preencha todos os campos";
                break;
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
        $escolha = $_POST['selectLogin'];
        if ($escolha == "escolha"){
            $mensagemLogin = "Por favor escolha uma função";
        }else{
            $objetoLogin -> logarUsuario();
            $resultado = $objetoLogin -> getResultado();
        }
        switch ($resultado){
            case 0:
                $mensagemLogin = "Usuário incorreto";
                break;
            case 1:
                $mensagemLogin = "Por favor preencha todos os campos";
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChefConnect</title>
    <link rel="stylesheet" href="./css/stylelogin.css">
    <!-- eu tenteiii
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     -->

    
</head>
<nav class="navInicio">
        <ul class="ulInicio">
            <li class="logo"><img src="./imagens/logo.png"><a href="index.html">ChefConnect</a></li>
        </ul>
    </nav>

<body>
    <div class="Login">
        <form action="login.php" method="post" id="formLogin">
        <div class="container">
        <h2 id="tituloResultadoLogin" style="display: none;"><?php echo ($mensagemLogin); ?></h2>
            <input type="hidden" name="tipo" value="login">
            <label for="escolha">Função</label><br>
            <select name="selectLogin">
                <option value="escolha">Escolha sua função</option>
                <option value="cliente">Cliente</option>
                <option value="funcionario">Chefe</option>
            </select><br>
            <!--  cadeado podre pae?  <img id="cadeado" src="imagens/cadeado.png" alt=""> -->
            <label for="email">Email</label><br>
            <input type="email" id="text" name="email" placeholder="Digite seu email"><br>
            <!-- <label for="nome">Nome</label><br>
            <input type="text" name="nome"><br> -->
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha"><br>
            <img id="fecharolho" src="imagens/fechar-o-olho.png" alt=""><br>
            <a href="recuperarsenha.html">Recuperar senha</a><br>
            <p id="trocarCadastro">Não possui conta? Clique aqui.</p>
            <button type="submit" id="btn">Entrar</button>
        </div>
        </form>
    </div>
    <div class="Cadastro">
        <form action="login.php" method="post" id="formCadastro">
        <div class="container">
            <h2 id="tituloResultado" style="display: none;"><?php echo ($mensagemCadastro) ?></h2>
            <label for="escolha">Função</label><br>
            <select name="selectCadastro">
                <option value="escolha">Escolha sua função</option>
                <option value="cliente">Cliente</option>
                <option value="funcionario">Chefe</option>
            </select><br>
            <input type="hidden" name="tipo" value="cadastro">
            <label for="email" >Email</label><br>
            <input type="email" id="text" name="email" placeholder="Digite seu email"><br>
            <label for="nome">Nome Completo</label><br>
            <input type="text" id="text" name="nome" placeholder="Digite seu nome completo"><br>
            <label for="senha">Senha</label>
            <input type="password" id="senha2" name="senha" placeholder="Digite sua senha"><br>
            <img id="fecharolho2" src="imagens/fechar-o-olho.png" alt="">
            <p id="trocarLogin">Já possui conta? Clique aqui.</p>
            <button type="submit" id="btn">Cadastrar</button>
        </div>
        </form>
    </div>
    <script src="./js/script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            let resultadoLogin = "<?php echo $mensagemLogin ?>";
            let resultadoCadastro ="<?php echo $mensagemCadastro?>";

            if (resultadoLogin !== '') {
                document.getElementById('tituloResultadoLogin').style.display = 'block';
                document.getElementById('tituloResultadoLogin').innerHTML = resultadoLogin;
            }

            if (resultadoCadastro !== '') {
                document.getElementById('tituloResultado').style.display = 'block';
                document.getElementById('tituloResultado').innerHTML = resultadoCadastro;
            }
        });

    </script>
</body>
</html>