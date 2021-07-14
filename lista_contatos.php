<?php
include('conexao.php');
$pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
$sql = "SELECT * from contatos where nome like '%$pesquisa%' or email like '%$pesquisa%' order by nome, email asc;";
$resultado = $conexao->query($sql) or die($conexao->error);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Contato</title>
    <meta charset="UTF-8">
    <meta name="author" content="Beatriz, João, Paula">
    <meta name="description" content="Lista de contatos com nome e email." />
    <meta name="keywords" content="Lista, Contatos, Lista de Contatos" />
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="listacontatos.css">
</head>

<body>
    <header>
        <h1>Lista de Contatos</h1>

        <div id="caixa_pesquisa">
            <form id="barra_de_pesquisa" action="lista_contatos.php" method="GET">
                <label for="pesquisa"></label>
                <input type="search" name="pesquisa" id="busca" placeholder="Buscar Contato">
                <button type="submit" id="pesquisa">Pesquisar</button>
            </form>
        </div>
    </header>

    <main id="contatos">
        <section>
            <div id="add">
                <form action="salvar.php" method="POST">
                    <h2>Adicionar Contato</h2>
                    <label for="nome" class="label_add">Nome</label> <br>
                    <input type="text" name="nome" class="input_add" placeholder="Digite o nome"> <br>
                    <label for="email" class="label_add">Email</label> <br>
                    <input type="email" name="email" class="input_add" placeholder="Digite o email"> <br>
                    <button type="submit" id="adicionar">Adicionar</button>
                </form>
            </div>
        </section>
        <section>
            <div id="tabela">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="edicoes">Opções</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($dados = $resultado->fetch_array()) { ?>
                            <tr>
                                <td><?php echo $dados['nome']; ?></td>
                                <td><?php echo $dados['email']; ?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $dados['id']; ?>"> <button type="button" class="editar">Editar</button></a>
                                    <a href="excluir.php?id=<?php echo $dados['id']; ?>"> <button type="button" class="excluir">Excluir</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>

</html>