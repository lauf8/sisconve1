<div class="dashboard">
    <div class="title-content">
        <div class="title-text">
            <span>
                <a href="./dashboard.php">
                    <img src="../public/img/dashboard-verde.svg" alt="Dashboard">
                    Dashboard
                </a>
            </span>
            <span>/</span>
            <span>
                <img src="../public/img/product-dark.svg" alt="Produto">
                Produtos
            </span>
        </div>
    </div>

    <div class="item-area">
        <div class="manage-item-top">
            <div class="search-item">
                <input id="search" type="text" placeholder="Procure por um produto">
                <img src="../public/img/search-icon.svg" alt="">
            </div>

            <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-produto-modal">
                <img src="../public/img/adicionar-item.svg" alt="Adicionar produto">
                Cadastrar Produto
            </button>

            <?php 
                // modal para cadastro do produto
                include('../app/include/modal/cadastrar-produto-modal.php');
            ?>

        </div>

        <div class="table-item-area">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome do Produto</th>
                        <th>Categoria</th>
                        <th>ICMS</th>
                        <th>IPI</th>
                        <th>Frete</th>
                        <th>Preço de Compra</th>
                        <th>Preço na Fabrica</th>
                        <th>Preço de Venda</th>
                        <th>Lucro</th>
                        <th>Desconto</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($dados['produtos'] as $produto) :?>
                    <tr id="item-details">
                        <td><?= $produto->id_produto ?></td>
                        <td><?= $produto->nome_produto ?></td>
                        <td><?= $produto->nome_categoria ?></td>
                        <td><?= $produto->icms ?></td>
                        <td><?= $produto->ipi ?></td>
                        <td><?= $produto->frete ?></td>
                        <td><?= $produto->preco_compra ?></td>
                        <td><?= $produto->preco_na_fabrica ?></td>
                        <td><?= $produto->preco_venda ?></td>
                        <td><?= $produto->lucro ?></td>
                        <td><?= $produto->desconto ?></td>
                        <td><?= $produto->quantidade ?></td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>