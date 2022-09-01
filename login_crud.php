<?php
#Chamando o arquivo conexao.php
include_once"conexao.php";
#pegando o valor da ação via URL
$acao = $_GET['acao'];
#Comparando se o valor da URL é do tipo GET
if(isset($_GET['id'])){
    #Criando uma variavel para armazenar o valor obtido no GET
    $id = $_GET['id'];
}

switch($acao){

    //Cadastrar
    case 'inserir':
    $Nome = $_POST['Nome'];
    $Telefone = $_POST['Telefone'];
    $Email = $_POST['Email'];
    $Senha = $_POST['Senha'];
    $PerguntaSeguranca = $_POST['PerguntaSeguranca'];
    $RespostaSeguranca = $_POST['RespostaSeguranca'];

    $sqlInsert = "INSERT INTO Usuario (Nome, Telefone, Email, Senha, PerguntaSeguranca, RespostaSeguranca) 
    values ('$Nome', '$Telefone', $Email', '$Senha', '$PerguntaSeguranca', '$RespostaSeguranca' )";
        
    if (!mysqli_query($conexao,$sqlInsert)) {
        die("Erro ao cadastrar usuário: ".mysqli_error($conexao));
    }else{
        echo "<script language='javascript' type='text/javascript'>
    alert('usuário cadastrado com sucesso!')
    window.location.href='login_page.php'</script>";
    }
    break;

    //Login
    case 'logar':

    $Email = $_POST['Email'];
    $Senha = $_POST['Senha'];
      
      
    if (isset($_POST['Email']) || isset($_POST['Senha'])){
        if(strlen($_POST['Email']) == 0){
            echo "Preencha se email";
        }else if(strlen($_POST['Senha']) == 0){
            echo "Preencha sua Senha";
        } else {

            $sql_code = "SELECT * FROM Usuario WHERE Email = '$Email' AND Senha = '$Senha'";
            $resultado = mysqli_query($conexao, $sql_code) or die ("Erro ao retornar dados");

            $quantidade = $resultado->num_rows;

            if($quantidade == 1) {
                echo "<script language='javascript' type='text/javascript'>
                alert('Login realizado com sucesso!')
                window.location.href='home.php'</script>";
                
            } else {
                echo "Falha ao logar! E-mail ou senha incorretos";
            }
        }
    }
    mysqli_close($conexao);
        
        
    break;
        
    default:
        header("Location:login_page.php");
        break;
}


?>