<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<header class="headerInicioPerfil">
        <nav class="navInicio">
            <ul class="ulInicio">
                <li class="logo"><img src="./img/logo.png"><a href="inicio.php">ChefConnect</a></li>
                <li class="ultimoLi"><a href="login.php">Sair</a></li>
            </ul>
        </nav>
        <div class="conteudoPrincipal">
        <div class="perfil">
            <h2>Pedro Henrique</h2>
            <p>Eu amo e sou apaixonado por comida francesa</p>
            <div class="redesSociais">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
        <div class="perfil2">
            <h3 id="h3Perfil">Biografia</h3>
            <p id="pPerfil">Detalhe da 
            biografia
            biografia
            biografia
            biografia
            biografia
            biografia
            biografia
            biografia
            biografia
            biografia
            biografia
            biografia
            </p>
            <h3 id="h3Perfil2">Áreas Trabalhadas</h3>
            <p id="pPerfil2">Detalhe da áreas trabalhadas</p>
            <h3 id="h3Perfil3">Experiências</h3>
            <p id="pPerfil3">Detalhe da experiências</p>
	    <button id="btn"><a href='contratar.php'>Contratar</a></button>
        </div>
    </div>
</header>
<script src="https://kit.fontawesome.com/abcafb780b.js" crossorigin="anonymous"></script>
<script>
document.getElementById("h3Perfil").addEventListener("click", function(){
    document.querySelectorAll(".ativo").forEach(function(elemento){
        elemento.classList.remove("ativo");
    });
    document.querySelector("#pPerfil").classList.toggle("ativo");
});
document.getElementById("h3Perfil2").addEventListener("click", function(){
    document.querySelectorAll(".ativo").forEach(function(elemento){
        elemento.classList.remove("ativo");
    });
    document.querySelector("#pPerfil2").classList.toggle("ativo");
});
document.getElementById("h3Perfil3").addEventListener("click", function(){
    document.querySelectorAll(".ativo").forEach(function(elemento){
        elemento.classList.remove("ativo");
    });
    document.querySelector("#pPerfil3").classList.toggle("ativo");
});
</script>
</body>
</html>