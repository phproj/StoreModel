<?php
session_start();
include_once("conexaoCbancoCriado.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha =  filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$senhaRepete=  filter_input(INPUT_POST, 'senhaRepete', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO usuario (nome, email, senha, senhaRepete) VALUES ('$nome', '$email', '$senha', '$senhaRepete')";
$resultado_usuario = mysqli_query($conecta, $result_usuario);

if(mysqli_insert_id($conecta)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
 
	header("Location: pagCadastro.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário nÃo foi cadastrado com sucesso</p>";
        
	header("Location: pagCadastroErro.php");
}
?>
