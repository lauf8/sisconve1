<?php

class ItemCompraModel
{
    private $Id;
    private $produtoId;
    private $compraId;
    private $ipi;
    private $frete;
    private $icms;
    private $preco_compra;
    private $quantidade;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @return mixed
     */
    public function getProdutoId()
    {
        return $this->produtoId;
    }

    /**
     * @return mixed
     */
    public function getCompraId()
    {
        return $this->compraId;
    }

    /**
     * @return mixed
     */
    public function getIpi()
    {
        return $this->ipi;
    }

    /**
     * @return mixed
     */
    public function getFrete()
    {
        return $this->frete;
    }

    /**
     * @return mixed
     */
    public function getIcms()
    {
        return $this->icms;
    }

    /**
     * @return mixed
     */
    public function getPreco_compra()
    {
        return $this->preco_compra;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @param mixed $produtoId
     */
    public function setProdutoId($produtoId)
    {
        $this->produtoId = $produtoId;
    }

    /**
     * @param mixed $compraId
     */
    public function setCompraId($compraId)
    {
        $this->compraId = $compraId;
    }

    /**
     * @param mixed $ipi
     */
    public function setIpi($ipi)
    {
        $this->ipi = $ipi;
    }

    /**
     * @param mixed $frete
     */
    public function setFrete($frete)
    {
        $this->frete = $frete;
    }

    /**
     * @param mixed $icms
     */
    public function setIcms($icms)
    {
        $this->icms = $icms;
    }

    /**
     * @param mixed $preco_compra
     */
    public function setPreco_compra($preco_compra)
    {
        $this->preco_compra = $preco_compra;
    }

    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }
    public function selectAll()
    {
        $this->db->query("SELECT * FROM item_compra");
        return $this->db->resultados();
    }

    public function insert($dados, $ultimoidProduto, $ultimoidCompra)
    {

        $this->setProdutoId($ultimoidProduto);
        $this->setCompraId($ultimoidCompra);
        
        $ipiInt = (int)$dados['ipi'];
        $freteInt = (int)$dados['frete'];
        $icmsInt = (int)$dados['icms'];
        $precoCompraInt = (int)$dados['preco_compra'];
        $quantidadeInt = (int)$dados['quantidade'];

        $this->setIpi($ipiInt);
        $this->setFrete($freteInt);
        $this->setIcms($icmsInt);
        $this->setPreco_compra($precoCompraInt);
        $this->setQuantidade($quantidadeInt);

        $this->db->query("INSERT INTO item_compra(id_produto, id_compra, ipi, frete, icms, preco_compra, quantidade) VALUES (:id_produto, :id_compra, :ipi, :frete, :icms, :preco_compra, :quantidade)");
        
        $this->db->bind(":id_produto", $this->getProdutoId());
        $this->db->bind(":id_compra", $this->getCompraId());
        $this->db->bind(":ipi", $this->getIpi());
        $this->db->bind(":frete", $this->getFrete());
        $this->db->bind(":icms", $this->getIcms());
        $this->db->bind(":preco_compra", $this->getPreco_compra());
        $this->db->bind(":quantidade", $this->getQuantidade());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;

    }
}
