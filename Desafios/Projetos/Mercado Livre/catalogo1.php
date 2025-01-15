<link rel="stylesheet" href="Mercado-livre-pag1.css">


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
<section id="sec3">
    <div class="container-produtos">
        <h2 class="titulo-mais">Inspirado no último visto</h2>
        <div class="produtos">
        
        <?php
        // Verifica se há produtos na tabela
        if ($result->num_rows > 0) {
            // Exibe os produtos
            while($row = $result->fetch_assoc()) {
                echo '<div class="area-produtos">';
                echo '<div class="foto-produto"><img src="' . $row['imagem_url'] . '" alt="Produto"></div>';
                echo '<div class="titulo-preco">';
                echo '<a href="#" id="titulo-produto">' . $row['nome'] . '</a>';
                echo '<div class="promo"><span style="font-size: 12px;"><s>R$ ' . $row['preco_antigo'] . '</s></span></div>';
                echo '<div class="valor-desconto"><span class="cifrao">R$ </span><span class="valor">' . number_format($row['preco_atual'], 2, ',', '.') . '</span><span class="centavos"></span><span class="desconto"> ' . $row['desconto'] . '% OFF</span></div>';
                echo '<div class="parcelado"><span class="em">em</span> <span class="vezes">12x </span><span class="parcelado">R$ ' . number_format($row['preco_atual'] / 12, 2, ',', '.') . '</span></div>';
                echo '<div class="frete-gratis"><span class="frete-verde">Frete grátis</span></div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Nenhum produto encontrado.";
        }

        // Fechar a conexão
        $conn->close();
        ?>

        </div>
    </div>
</section>
</body>
</html>
