<?php
include('conexao.php');
$id = $_GET['id'];
$sql = "SELECT * from contatos where id='$id'";
$resultado = $conexao->query($sql) or die($conexao->error);
$dados = $resultado->fetch_array();
?>

<DOCTYPE html>
    <html lang="pt-br">

    <head>
        <title>Editar Contato</title>
        <meta charset="UTF-8">
        <meta name="author" content="Beatriz, João, Paula">
        <meta name="description" content="Lista de contatos com nome e email." />
        <meta name="keywords" content="Lista, Contatos, Lista de Contatos" />
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="editar.css">
    </head>

    <body>
        <header>
            <h1>Lista de Contatos</h1>
        </header>
        <div id="caixa">
            <form action="salvar_edicao.php?id=<?php echo $id ?>" method="POST" class="edit">
                <h2>Editar Contato</h2>
                <label for="novo_nome" id="label_nome"><b>Nome</b></label><br>
                <input type="text" name="novo_nome" id="novo_nome" value="<?php echo $dados['nome']; ?>"><br>
                <label for="novo_email" id="label_email"><b>Email</b></label><br>
                <input type="email" name="novo_email" id="novo_email" value="<?php echo $dados['email']; ?>"><br>
                <button type="submit" id="salvar">Salvar</button>
            </form>

        </div>
    </body>

    </html>