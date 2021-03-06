<?php
class CompraController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            URL::redirecionar('UsuarioController/login');
        endif;
        $this->compraModel = $this->model('CompraModel');
        $this->produtoModel = $this->model('ProdutoModel');
        $this->fornecedorModel = $this->model('FornecedorModel');
        $this->itemCompraModel = $this->model('ItemCompraModel');
    }

    public function index()
    {
    }
    public function listarCompras()
    {
        $dados = [
            'compras' => $this->compraModel->selectAll()
        ];
        $this->view('compra/listarCompras', $dados);
    }

    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [



                // Compra
                'parcelas' =>  trim($formulario['parcelas']),

                // Produto
                'nome_produto' => trim($formulario['nome_produto']),

                // item_compra
                'ipi' => trim($formulario['ipi']),
                'frete' => trim($formulario['frete']),
                'icms' => trim($formulario['icms']),
                'preco_compra' => trim($formulario['preco_compra']),
                'quantidade' => trim($formulario['quantidade']),

                // Erro
                "nome_fornecedor_erro" =>  '',
                "telefone_erro" => '',
                "estado_erro" => '',
                "cidade_erro" => '',

                // Compra
                'parcelas_erro' =>  '',

                // Produto
                'nome_produto_erro' => '',

                // item_compra
                'ipi_erro' => '',
                'frete_erro' => '',
                'icms_erro' => '',
                'preco_compra_erro' => '',
                'qunatidade_erro' => '',

            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['parcelas'])) :
                    $dados['parcelas_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['nome_produto'])) :
                    $dados['nome_produto_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['ipi'])) :
                    $dados['ipi_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['frete'])) :
                    $dados['frete_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['icms'])) :
                    $dados['icms_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['preco_compra'])) :
                    $dados['preco_compra_erro'] = "Preencha o campo";
                endif;

            else :
                if (Validar::validarCampoNumerico($formulario['parcelas'])) :
                    $dados['parcelas_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoString($formulario['nome_produto'])) :
                    $dados['nome_produto_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['ipi'])) :
                    $dados['ipi_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['frete'])) :
                    $dados['frete_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['icms'])) :
                    $dados['icms_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['preco_compra'])) :
                    $dados['preco_compra_erro'] = "Formato informado <b>invalido</b>";

                else :
                    if ($this->compraModel->insert($dados)) :
                        echo 'Cadastro realizado como sucesso <hr>';
                        $ultimoidCompra = $this->compraModel->getUltimoId();
                    else :
                        die("Erro");

                    endif;

                    if ($this->produtoModel->insert($dados)) :
                        echo 'Cadastro realizado como sucesso <hr>';
                        $ultimoidProduto = $this->produtoModel->getUltimoId();
                    else :
                        die("Erro");

                    endif;

                    if ($this->itemCompraModel->insert($dados, $ultimoidProduto, $ultimoidCompra)) :
                        echo 'Cadastro realizado como sucesso <hr>';


                    else :
                        die("Erro");

                    endif;

                endif;
            endif;
        else :
            $dados = [
                // Compra
                'parcelas' =>  '',

                // Produto
                'nome_produto' => '',

                // item_compra
                'ipi' => '',
                'frete' => '',
                'icms' => '',
                'preco_compra' => '',

                // Erro
                "nome_fornecedor_erro" =>  '',
                "telefone_erro" => '',
                "estado_erro" => '',
                "cidade_erro" => '',

                // Compra
                'parcelas_erro' =>  '',

                // Produto
                'nome_produto_erro' => '',

                // item_compra
                'ipi_erro' => '',
                'frete_erro' => '',
                'icms_erro' => '',
                'preco_compra_erro' => '',
            ];
        endif;
        $this->view('compra/cadastarCompras', $dados);
    }
}
