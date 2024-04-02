<?php
Class Cadastro{
    private $link;
    private $resultado;

    public function __construct()
    {
        include("conectadb.php");
        $this->link = $link;
    }

    public function cadastroCliente(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
        
            $sql = "SELECT COUNT(cli_id) FROM clientes WHERE cli_email = ?";
            $statement = mysqli_prepare($this->link,$sql);
            mysqli_stmt_bind_param($statement, "s", $email);
            mysqli_stmt_execute($statement);
            mysqli_stmt_bind_result($statement, $contador);
            mysqli_stmt_fetch($statement);
            mysqli_stmt_close($statement);
        
            if ($contador > 0){
                $this->setResultado("s");
            }else{
                
            }
        }
    }
    
    public function setResultado($valor){
        $this->resultado = $valor;
    }
    
    public function getResultado(){
        return $this->resultado;
    }
}


?>