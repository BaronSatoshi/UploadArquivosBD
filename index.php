<?php

include('config.php');

$msg = false;

if(isset($_FILES['arquivo'])){

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "uploads/";

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

    $sql_code = "INSERT INTO arquivo(codigo,arquivo,data) VALUES(null, '$novo_nome', NOW())";
    if($conn->query($sql_code)){
        $msg = "Arquivo enviado com sucesso";
    } else{
        $msg = "Falha ao enviar arquivo";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Arquivos</title>
</head>
<body>
    <h1>Upload Arquivos</h1>
    <?php if($msg != false) echo "<p> $msg </p>"; ?>
    <form action="" method="post" enctype="multipart/form-data">
        Arquivo: <input type="file" name="arquivo" required>
        <input type="submit" value="Salvar">
    </form>

</body>
</html>