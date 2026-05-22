<?php 

session_start();

if(!isset($_SESSION["usuario"])){
    header("location: ../index.php");
    exit();
}

?>


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

</body>
</html>