<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "sistema_simples";
$conn = new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    die("Erro na conexão");
}else{
    echo ("<p> BD: ok </p>");
}

//faz a conexão entre o php e o banco de dados de forma rápida sem a necessidade de repetir o código várias vezes.
?>



