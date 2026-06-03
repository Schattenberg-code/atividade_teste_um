<?php

include("../infra/db/connect.php");

if (!isset($_SESSION["usuario"])) {
    header("location: ../index.php");
    exit();
}


//inserir novo usuario

if (isset($_POST["cadastrar"])) {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO usuario (usuario, senha) VALUES ('$usuario','$senha')";
    if ($conn->query($sql) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}

//deletar usuario

if (isset($_POST["deletar"])) {

    $id = $_POST["usuario_id"];

    $sql = "DELETE FROM usuario WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Usuário deletado com sucesso!";
    } else {
        echo "Erro ao deletar: " . $conn->error;
    }
}

/* Recebe os dados do formulário e cadastra um novo usuário no banco de dados. */
//------------------------
?>





<!--   -----------------------html-----------------------    -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>

    <h1>bem vindo</h1>
    <p>usuario logado: <?php echo $_SESSION["usuario"]; ?> <br></p>

    <a href="logout.php">sair</a>

    <h2>Cadastrar novo usuario</h2>

    <form method="POST">
        <label for="usuario">Úsuario:</label>
        <input type="text" name="usuario">
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha">
        <br>
        <br>
        <button name="cadastrar" type="submit">Entrar</button>

    </form>

    <form method="POST">
        <label for="excluirUsuario">Selecione qual usuario deseja excluir</label>
        <select name="usuario_id" id="excluirUsuario">

            <?php
            $sql = "SELECT id, usuario FROM usuario";
            $resultado = $conn->query($sql);

            while ($linha = $resultado->fetch_assoc()) {
                echo "<option value='{$linha['id']}'>
                    {$linha['usuario']}
                  </option>";
            }

            ?>

        </select>
        <button name="deletar" type="submit">Excluir</button>
    </form>




    <?php

    include("../public/component/table.php"); //chama a tabela.php para aparecer na home.php sem a necessidade de escrever todo o códigoda tabela novamente.
    
    ?>

</body>

</html>