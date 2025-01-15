<?php
// Configurações do banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "produtos";

// Conexão com o banco de dados
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta os dados da tabela
$sql = "SELECT * FROM catalogo_produtos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .produto { border: 1px solid #ccc; margin: 10px; padding: 10px; border-radius: 5px; }
        .produto img { max-width: 100px; display: block; margin-bottom: 10px; }
        .produto strong { font-size: 1.2em; }
    </style>
</head>
<body>
    <h1>Catálogo de Produtos</h1>
    <div>
        <?php
        if ($resultado->num_rows > 0) {
            // Exibe os dados de cada linha
            while ($linha = $resultado->fetch_assoc()) {
                echo "<div class='produto'>";
                echo "<img src='" . $linha["imagem_url"] . "' alt='Imagem do Produto'>";
                echo "<strong>" . $linha["nome"] . "</strong><br>";
                echo "De: R$ " . $linha["preco_antigo"] . " por: R$ " . $linha["preco_atual"] . "<br>";
                echo "Desconto: " . $linha["desconto"] . "%<br>";
                echo "Parcelado em: " . $linha["parcelado_em"] . "x<br>";
                echo $linha["frete_gratis"] ? "Frete grátis!" : "Frete não incluso.";
                echo "</div>";
            }
        } else {
            echo "Nenhum produto encontrado.";
        }
        ?>
    </div>
</body>
</html>
