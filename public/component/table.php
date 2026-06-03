
<hr>

<h4> Usuários cadastrados: </h4>

<table class="table" border="1" cellpadding="10">
<tr>
    <th scope="col">ID</th>
    <th scope="col">Usuário</th>
    <th scope="col">Senha</th>
</tr>

<?php

//----------------------
//Essa área serve para exibir uma tabela na página que mostra todos os usuários cadastrados no banco de dados.

$sqlUsuarios = "SELECT * FROM usuario";

$resultadoUsuarios = $conn -> query($sqlUsuarios);

while($linha = $resultadoUsuarios->fetch_assoc()){
    echo "<tr>
            <th scope='row' >".$linha["id"]."</td>
            <td>".$linha["usuario"]."</td>
            <td>".$linha["senha"]."</td>
          </tr>";
}

//--------------------------

?>



</table>