<?php 
$idsistema = isset($_GET["idsistema"]) ? $_GET["idsistema"]:null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;
 
try {
    $localhost= "localhost";
    $username = "root";
    $password = "";
    $db = "bdavaliacao";
    $con = new PDO ("mysql:host=$localhost;dbname=$db",$username,$password);

    if($op=="del"){
        $sql = "DELETE FROM tblsistema where idsistema= :idsistema";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":idsistema",$idsistema);
        $stmt->execute();
        header("location: lista.php");

    }

    if($idsistema){
        $sql = "SELECT * FROM tblsistema where idsistema=:idsistema";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":idsistema",$idsistema);       
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_OBJ);
    }

    if($_POST){
        if($_POST["idsistema"]){
        $sql = "UPDATE tblsistema SET cliente=:cliente, nordem=:nordem, dtrequisicao=:dtrequisicao, dttermino=:dttermino, funcionario=:funcionario, situacao=:situacao, preco=:preco WHERE idsistema= idsistema";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":cliente",$_POST["cliente"]);
        $stmt->bindValue(":nordem",$_POST["nordem"]);
        $stmt->bindValue(":dtrequisicao",$_POST["dtrequisicao"]);
        $stmt->bindValue(":dttermino",$_POST["dttermino"]);
        $stmt->bindValue(":funcionario",$_POST["funcionario"]);
        $stmt->bindValue(":situacao",$_POST["situacao"]);
        $stmt->bindValue(":preco",$_POST["preco"]);

        $stmt->bindValue(":idsistema",$_POST["idsistema"]);
        $stmt->execute();        

        } else {
            $sql = "INSERT INTO tblsistema (cliente,nordem,dtrequisicao,dttermino,funcionario,situacao,preco) values(:cliente,:nordem,:dtrequisicao,:dttermino,:funcionario,:situacao,:preco)";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":cliente",$_POST["cliente"]);
            $stmt->bindValue(":nordem",$_POST["nordem"]);
            $stmt->bindValue(":dtrequisicao",$_POST["dtrequisicao"]);
            $stmt->bindValue(":dttermino",$_POST["dttermino"]);
            $stmt->bindValue(":funcionario",$_POST["funcionario"]);
            $stmt->bindValue(":situacao",$_POST["situacao"]);
            $stmt->bindValue(":preco",$_POST["preco"]);
            $stmt->execute();            
        }
            header("location: lista.php");
    }
    
} catch(PDOException $e){
    echo "Erro: ".$e->getMessage();
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
        <a href="lista.php">Lista</a>
        <hr>
    </header>
    <h1>Cadastro</h1>
    <form method="post">

        Cliente <input type="text" name="cliente" value="<?php echo isset ($sistema) ? $sistema->cliente:null ?>">
        N° Ordem <input type="text" name="nordem"   value="<?php echo isset($sistema) ? $sistema->nordem:null ?>">
        Data da Requisição <input type="date" name="dtrequisicao"   value="<?php echo isset($sistema) ? $sistema->dtrequisicao:null ?>">
        Data deo Termino <input type="date" name="dttermino"   value="<?php echo isset($sistema) ? $sistema->dttermino:null ?>">
        Funcionario <input type="text" name="funcionario"   value="<?php echo isset($sistema) ? $sistema->funcionario:null ?>">
        <p>Está Ativo?</p>
        <div class="checkbox">
            <input type="checkbox" name="situacao"checked value="<?php echo isset($sistema) ? $sistema->situacao:null ?>">
            <label for="1">Sim</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" name="situacao">
            <label for="2">Não</label>
        </div>
        Preço <input type="text" name="preco"   value="<?php echo isset($sistema) ? $sistema->preco:null ?>">
        <input type="submit" value="Cadastrar">
    </form>

  </body>
</html>
