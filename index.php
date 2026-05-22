<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "root";
$db = "sistema_simples";
$conn = new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    die("Erro na conexão");
}else{
    echo ("<p> BD: ok </p>");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuario 
    WHERE usuario = '$usuario' 
    AND senha = '$senha'";

    $resultado = $conn -> query($sql);


    if($resultado -> num_rows > 0){
        $_SESSION["usuario"] = $usuario;
        header("Location: public\home.php");
        exit();
    }else{
        $erro = "Usuário ou senha inválidos.";
    }

}



?>







<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login com PHP</title>
</head>
<body>


    <h2>Login com PHP</h2>

    <form method="POST">
    <label for="usuario">Úsuario:</label>
    <input type="text" name="usuario">
    <br>
    <br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha">
    <br>
    <br>
    <button type="submit">Entrar</button>

    </form>


</body>
</html>

<?php

if(isset($erro)){
    echo $erro;
}

?>