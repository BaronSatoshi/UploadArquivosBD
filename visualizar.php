<?php

include('config.php');

$sql = "SELECT * FROM arquivo";
$consulta = $conn->query($sql);
while($linha = mysqli_fetch_array($consulta)){
    $album[] = $linha;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./lightbox/dist/css/lightbox.min.css">
    <title>Upload Arquivos</title>
</head>
<body>
    <h1>Visualizar Arquivos</h1>
    <a href="index.php">Voltar</a>
    <table>
        <tr>
            <?php 
                $cont = 0;
                foreach($album as $foto){
                    $cont++;
            ?>
            <td>
            <a href="<?php echo "uploads/" .$foto['arquivo']?>" data-lightbox="image-1" data-title="<?php echo $foto['arquivo']?>">
                <img src="<?php echo "uploads/" .$foto['arquivo']?>" width="260" height="200">
            </a>
            </td>
            <?php 
            if($cont == 4){
                echo "</tr>";
                echo "<tr>";
                $cont = 0;
            }   
        } 
            ?>
        </tr>
    </table>
    <script src="./lightbox/dist/js/lightbox-plus-jquery.min.js"></script>
</body>
</html>