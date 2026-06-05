<?php

include("../infra/db/connect.php");

if (!isset($_SESSION["usuario"])) {
    header("location: ../index.php");
    exit();
}


//---------inserir novo usuario----------

if (isset($_POST["cadastrar"])) {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if (!empty($usuario) && !empty($senha)) {
        $sql = "INSERT INTO usuario (usuario, senha) VALUES ('$usuario','$senha')";
        if ($conn->query($sql) === TRUE) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }
    }
}
/* Recebe os dados do formulário e cadastra um novo usuário no banco de dados. */

//----------------------------------------

//--------------deletar usuario------------

if (isset($_POST["deletar"])) {

    $id = $_POST["usuario_id"];

    $sql = "DELETE FROM usuario WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Usuário deletado com sucesso!";
    } else {
        echo "Erro ao deletar: " . $conn->error;
    }
}

//-----------------------------------------

//--------------editar usuario-------------

if (isset($_POST["editar"])) {

    $id = $_POST["usuario_id"];
    $novoNome = $_POST["editarNome"];
    $novaSenha = $_POST["editarSenha"];

    $sql = "UPDATE usuario SET usuario = '$novoNome',senha = '$novaSenha' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário deletado com sucesso!";
    } else {
        echo "Erro ao deletar: " . $conn->error;
    }
}

//---------------------------------------------

?>

<!--------------------html--------------------->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>

    <section id="page-section">
        <div class=" div-conteudo shadow-lg rounded rounded-3 w-75 container-xxl">

            <div>
                <h1 class="fs-1 text-center">bem vindo</h1>
                <p class="text-center">usuario logado: <?php echo $_SESSION["usuario"]; ?> <br></p>
                <a class="btn btn-outline-danger d-flex justify-content-center" href="logout.php">sair</a>
                <hr>
            </div>

            <form method="POST" id="form-adicionar-usuario">
                <p class="h2 pb-3 d-flex justify-content-center mt-5">Cadastro novo usuário</p>
                <div class="w-50 mx-auto">
                    <label class="form-label fw-bold " for="usuario">Úsuario:</label>
                    <input class="form-control" type="text" name="usuario">
                </div>
                <div class="w-50 mx-auto">
                    <label class="form-label fw-bold" for="senha">Senha:</label>
                    <input class="form-control" type="password" name="senha">
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-primary w-25" name="cadastrar" type="submit">Cadastrar</button>
                </div>
            </form>

            <hr>

            <form method="POST">
                <p class="h2 pb-3 d-flex justify-content-center mt-5">Excluir usuário</p>
                <div class="w-50 mx-auto">
                    <label class="form-label fw-bold" for="excluirUsuario">Selecione qual usuario deseja excluir</label>
                    <select class="form-select ms-0" name="usuario_id" id="excluirUsuario">
                        <?php
                        $sql = "SELECT id, usuario FROM usuario";
                        $resultado = $conn->query($sql);
                        while ($linha = $resultado->fetch_assoc()) {
                            echo "<option value='{$linha['id']}'>{$linha['usuario']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-primary w-25" name="deletar" type="submit">Excluir</button>
                </div>
            </form>

            <hr>

            <form method="POST">
                <p class="h2 pb-3 d-flex justify-content-center mt-5">Editar usuário</p>
                <div class="w-50 mx-auto">
                    <label class="form-label fw-bold" for="editarUsuario"> Selecione um usuario para editar </label>
                    <select class="form-select ms-0" name="usuario_id" id="editarUsuario">
                        <?php
                        $sql = "SELECT id, usuario FROM usuario";
                        $resultado = $conn->query($sql);

                        while ($linha = $resultado->fetch_assoc()) {
                            echo "<option value='{$linha['id']}'>{$linha['usuario']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="w-50 mx-auto">
                    <label class="form-label fw-bold" for="">nome</label>
                    <input class="form-control" type="text" name="editarNome">
                </div>
                <div class="w-50 mx-auto">
                    <label class="form-label fw-bold" for="">Senha</label>
                    <input class="form-control" type="text" name="editarSenha">
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-primary w-25" name="deletar" type="editar">Editar</button>
                </div>
            </form>

            <?php
            include("../public/component/table.php"); //chama a tabela.php para aparecer na home.php sem a necessidade de escrever todo o códigoda tabela novamente.
            ?>

        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
</html>