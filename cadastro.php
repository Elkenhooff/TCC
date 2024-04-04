<?php
Class Cadastro{
    private $link;
    private $resultado;

    public function __construct()
    {
        include("conectadb.php");
        $this->link = $link;
    }

    

    public function Cadastrar(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $escolha = $_POST['selectCadastro'];
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
        
            if ($escolha == "cliente"){
                $sql = "SELECT COUNT(cli_id) FROM clientes WHERE cli_email = ?";
            } elseif ($escolha == "funcionario"){
                // $sql = ; Sql do funcionário (to sem banco de dados socorro)
            }else{
                // colocar algo para impedir o econtinuo do código
            }
            $statement = mysqli_prepare($this->link,$sql);
            mysqli_stmt_bind_param($statement, "s", $email);
            mysqli_stmt_execute($statement);
            mysqli_stmt_bind_result($statement, $contador);
            mysqli_stmt_fetch($statement);
            mysqli_stmt_close($statement);
        
            
            if (trim($nome) == "" || trim($email) == "" || trim($senha) == ""){
                $this->setResultado(1);
                //Resultado 1 == Campo vazios
            } else{
                if ($contador > 0){
                    $this->setResultado(0);
                    //Resultado 0 == Conta já existente
                }
                else{
                        $seguranca = md5(rand() . date('H:i:s'));
                        $senha = md5($senha . $seguranca);

                        if ($escolha == "cliente"){
                            $sql = "INSERT INTO clientes(cli_nome, cli_email, cli_senha, cli_seguranca, cli_ativo) VALUES (?, ?, ?, ?,'s');";
                        } elseif($escolha == "funcionario"){
                            // $sql = ; insert do funcionario 
                        }
                        $statement = mysqli_prepare($this->link,$sql);
                        mysqli_stmt_bind_param($statement, "ssss", $nome, $email, $senha, $seguranca);
                        mysqli_stmt_execute($statement);
                        mysqli_stmt_close($statement);
                        
                        echo ("<script>window.alert('Cadastro completado com sucesso.');</script>");
                        echo ("<script>window.location.href='login.php';</script>");
                }
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