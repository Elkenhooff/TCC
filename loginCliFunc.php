<?php
class Login{
    private $link;
    private $resultado;

    public function __construct(){
        include("conectadb.php");
        $this-> link = $link;
    }


    public function logarUsuario(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $escolha = $_POST['selectLogin'];
            $email = $_POST["email"];
            $senha = $_POST["senha"];


            if ($escolha == "cliente"){
                // Pegando a chave de segurança
                $sql = "SELECT cli_seguranca FROM clientes WHERE cli_email = ?";
                $statement = mysqli_prepare($this->link,$sql);
                mysqli_stmt_bind_param($statement, 's', $email);
                mysqli_stmt_execute($statement);
                mysqli_stmt_bind_result($statement, $seguranca);
                mysqli_stmt_fetch($statement);
                mysqli_stmt_close($statement);
                
                $senha = md5($senha . $seguranca); 

                // Verifcar o login
                $sql = "SELECT cli_id, cli_nome FROM clientes WHERE cli_email = ? AND cli_senha = ? AND cli_ativo = 's';";
                $statement = mysqli_prepare($this->link,$sql);
                mysqli_stmt_bind_param($statement, 'ss', $email, $senha);
                mysqli_stmt_execute($statement);
                mysqli_stmt_bind_result($statement, $idcliente, $nomecliente);
                mysqli_stmt_fetch($statement);
                mysqli_stmt_close($statement);

                if (trim($email) == "" || trim($senha) == ""){
                    $this->setResultado(1);
                    //Resultado 1 == Campo vazios
                } else{
                    if ($idcliente){
                        $_SESSION['idcliente'] = $idcliente;
                        $_SESSION['nomecliente'] = $nomecliente;

                        echo ("<script>window.location.href='inicio.php';</script>");
                    }
                    else{
                        //Não achou o cliente
                        $this->setResultado(0);
                    }
                }
                
            } elseif ($escolha == "funcionario"){
                $sql = "SELECT func_seguranca FROM funcionarios WHERE func_email = ?";
                $statement = mysqli_prepare($this->link,$sql);
                mysqli_stmt_bind_param($statement, 's', $email);
                mysqli_stmt_execute($statement);
                mysqli_stmt_bind_result($statement, $seguranca);
                mysqli_stmt_fetch($statement);
                mysqli_stmt_close($statement);

                $senha = md5($senha . $seguranca);

                $sql = "SELECT func_id, func_nome FROM funcionarios WHERE func_email = ? AND func_senha = ? AND func_ativo = 's';";
                $statement = mysqli_prepare($this->link,$sql);
                mysqli_stmt_bind_param($statement, 'ss', $email, $senha);
                mysqli_stmt_execute($statement);
                mysqli_stmt_bind_result($statement, $idfuncionario, $nomefuncionario);
                mysqli_stmt_fetch($statement);
                mysqli_stmt_close($statement);

                if (trim($email) == "" || trim($senha) == ""){
                    $this->setResultado(1);
                    //Resultado 1 == Campo vazios
                } else{
                    if ($idfuncionario){
                        $_SESSION['idfuncionario'] = $idfuncionario;
                        $_SESSION['nomefuncionario'] = $nomefuncionario;

                        echo ("<script>window.location.href='inicio.php';</script>");
                    }
                    else{
                        //Não achou o funcionário
                        $this->setResultado(0);
                    }
                }
            }
        }
    }

    public function setResultado($x){
        $this->resultado = $x;
    }

    public function getResultado(){
        return $this->resultado;
    }

}