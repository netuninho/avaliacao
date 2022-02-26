<?php

include_once "conexao.php";

try {
    $sql = "SELECT * FROM tblsistema";
    $qry = $con -> query($sql);
    $sistemas = $qry -> fetchALL(PDO::FETCH_OBJ);

} catch(PDOException $e){
    echo $e->getMessage();
}
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema</title>
    <link rel="stylesheet" href="style.css" >
  </head>

  <body>

    <header>
        <a href="formulario.php" >Cadastro</a>
    </header>

    <h1>Listagem</h1>
    <hr>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>N° Ordem</th>
                <th>Data Requisição</th>
                <th>Data Termino</th>
                <th>Funcionario</th>
                <th>Situação</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($sistemas as $sistema) { ?>
            <tr>
                <th><?php echo $sistema->idsistema ?></th>
                <th><?php echo $sistema->cliente ?></th>
                <th><?php echo $sistema->nordem ?></th>
                <th><?php echo $sistema->dtrequisicao ?></th>
                <th><?php echo $sistema->dttermino ?></th>
                <th><?php echo $sistema->funcionario ?></th>
                <th><?php echo $sistema->situacao ?></th>
                <th><?php echo $sistema->preco ?></th>

                <th>
                    <a href="formulario.php?idsistema=<?php echo $sistema->idsistema ?>" >                   
                    <img src="./img/editar.png" alt="Editar">
                    </a>
                </th>

                <th>
                    <a href="formulario.php?op=del&idsistema=<?php echo $sistema->idsistema ?>" >  
                    <img src="./img/excluir.png" alt="Excluir">
                    </a>
                </th>
            </tr>
            <?php } ?>
        </tbody>
    </table>

  </body>
</html>

