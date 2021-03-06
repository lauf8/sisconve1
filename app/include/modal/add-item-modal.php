<!-- Modal Add Item -->
<div class="modal fade" id="add-item-modal" tabindex="-1" aria-labelledby="logoff-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-add-items">
            <div class="modal-header d-block modal-header-add-items float-right">
                <div class="close-modal">
                    <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                </div>
            </div>
            <div class="content-box">
                <div class="title-modal-add-item">
                    <h2>Adicionar Item</h2>
                </div>
                <div class="input-modal-add-item">
                    <div class="input-product">
                        <label for="nome-produto">Nome do produto</label>
                        <div class="input">
                            <select name="nome-produto" id="nome-produto" class="name-product" placeholder="" required>
                                <option value="" disabled selected>Selecione um produto</option>
                                <option value="0">Boneca Cotiplas</option>
                                <option value="1">Caneca Porcelux</option>
                            </select>
                            <img src="../public/img/search-icon.svg" alt="Procurar">
                        </div>
                    </div>
                    <div class="input-quantidade">
                        <label for="quantidade-item">Quantidade</label>
                        <div class="input">
                            <input name="quantidade-item" id="quantidade-item" class="quant-product" type="text" min="1" value="1" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="buttons-modal">
                <a href="#" data-dismiss="modal" class="cancel btn-modal">
                    <span>Cancelar</span>
                </a>
                <a href="#" id="btn-add-item-modal" data-dismiss="modal" class="confirm btn-modal">
                    <span>Adicionar</span>
                </a>
            </div>
        </div>
    </div>
</div>