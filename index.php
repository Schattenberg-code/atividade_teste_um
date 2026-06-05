<?php

include("infra/db/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $sql = "SELECT * FROM usuario 
    WHERE usuario = '$usuario' 
    AND senha = '$senha'";
    $resultado = $conn->query($sql);
    if ($resultado->num_rows > 0) {
        $_SESSION["usuario"] = $usuario;
        header("Location: public\home.php");
        exit();
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login com PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div
        class="w-25 p-5 pb-4 pt-5 container-sm shadow-lg p-3 mb-5 bg-body-tertiary rounded rounded-3 position-absolute top-50 start-50 translate-middle">

        <form method="POST">
            <p class="h2 pb-3 d-flex justify-content-center">Entrar</p>
            <div>
                <label class="form-label" for="usuario">Usuário:</label>
                <input class="form-control" type="text" name="usuario">
            </div>
            <div>
                <label class="form-label" for="senha">Senha:</label>
                <input class="form-control" type="password" name="senha">
            </div>
            <div class="d-grid gap-2 mt-5">
                <button class="btn btn-primary" type="submit">Entrar</button>
            </div>
        </form>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>

</html>

<?php
if (isset($erro)) {
    echo $erro;
}
?>