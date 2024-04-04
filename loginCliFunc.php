<?php
class Login{
    private $link;

    public function __construct(){
        include("conectadb.php");
        $this-> link = $link;
    }


    public function logarUsuario(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
        }
    }



}