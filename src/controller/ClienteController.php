<?php
namespace App\Controller;
use App\Model\Bo\BairroBO;
use App\Model\Bo\CidadeBO;
use App\Model\Bo\ClienteBO;
use App\Model\Bo\ContatoBO;
use App\Model\Bo\EnderecoBO;
use App\Model\Bo\EstadoBO;
use App\Util\ResponseUtil;

class ClienteController {
    private $clienteBO;
    private $enderecoBO;
    private $bairroBO;
    private $cidadeBO;
    private $estadoBO;
    private $contatoBO;

    /**
     * Método construtor de ClienteController
     *
     * @return void
     */
    public function __construct(){
        $this->clienteBO = new ClienteBO();
        $this->enderecoBO = new EnderecoBO();
        $this->bairroBO = new BairroBO();
        $this->cidadeBO = new CidadeBO();
        $this->estadoBO = new EstadoBO();
        $this->contatoBO = new ContatoBO();
    }

    /**
     * Método responsável por carregar view de clientes
     *
     * @return void
     */
    public function index() {
        require 'src/view/clientes.php';
    }

    /**
     * Método responsável por inserir um cliente no banco de dados
     *
     * @return JsonResponse
     */
    public function inserir(){
        $input = file_get_contents('php://input');
        $data = array();
        parse_str($input, $data);

        if (json_last_error() === JSON_ERROR_NONE) {
            try {
                $this->clienteBO->validar($data);
                $this->estadoBO->validar($data);
                $this->cidadeBO->validar($data);
                $this->bairroBO->validar($data);
                $this->enderecoBO->validar($data);
                $this->contatoBO->validar($data);

                $resposta = $this->estadoBO->inserirEstado($data);
                $data['idEstado'] = $resposta;
                $resposta = $this->cidadeBO->inserirCidade($data);
                $data['idCidade'] = $resposta;
                $resposta = $this->bairroBO->inserirBairro($data);
                $data['idBairro'] = $resposta;
                $resposta = $this->enderecoBO->inserirEndereco($data);
                $data['idEndereco'] = $resposta;
                $resposta = $this->clienteBO->inserirCliente($data);
                $data['idCliente'] = $resposta;
                $data['id'] = $resposta;
                $resposta = $this->contatoBO->inserirContato($data);

                return ResponseUtil::jsonResponse(
                    [
                        'status' => 'success',
                        'msg' => 'Cliente inserido com sucesso!',
                        'cliente' => $data,
                    ]
                );
            } catch (\Exception $e) {
                return ResponseUtil::jsonResponse(
                    [
                        'status' => 'error',
                        'msg' => $e->getMessage(),
                    ],
                    400
                );
            }
        } else {
            return ResponseUtil::jsonResponse(
                [
                    'status' => 'error',
                    'msg' => 'Erro ao processar os dados recebidos.',
                    'data' => $data,
                ],
                400
            );
        }
    }

    /**
     * Método responsável por listar todos os clientes
     *
     * @return JsonResponse
     */
    public function listar(){			
        try {
            $clientes = $this->clienteBO->listarClientes();

            return ResponseUtil::jsonResponse(
                [
                    'status' => 'success',
                    'msg' => 'Clientes listados com sucesso!',
                    'clientes' => $clientes,
                ]
            );
        } catch (\Exception $e) {
            return ResponseUtil::jsonResponse(
                [
                    'status' => 'error',
                    'msg' => $e->getMessage(),
                ],
                400
            );
        }
    }

    /**
     * Método responsável por buscar o cliente por id no banco
     * de dados para poder exibir os dados na tela para edição
     * 
     * @param int $idCliente Id do cliente a ser buscado para edição
     *
     * @return JsonResponse
     */
    public function visualizar($idCliente){			
        try {
            $cliente = $this->clienteBO->pesquisarClientePorId($idCliente);

            return ResponseUtil::jsonResponse(
                [
                    'status' => 'success',
                    'msg' => 'Cliente removido com sucesso!',
                    'cliente' => $cliente,
                ]
            );
        } catch (\Exception $e) {
            return ResponseUtil::jsonResponse(
                [
                    'status' => 'error',
                    'msg' => $e->getMessage(),
                ],
                400
            );
        }
    }

    /**
     * Método responsável por editar as informações do cliente
     * 
     * @param int $idCliente Id do cliente a ser editado
     *
     * @return JsonResponse
     */
    public function editar($idCliente){
        $input = file_get_contents('php://input');
        $data = array();
        parse_str($input, $data);

        if (json_last_error() === JSON_ERROR_NONE) {
            try {
                $cliente = $this->clienteBO->pesquisarClientePorId($idCliente);

                // Passa o id do cliente no data para que o id seja ignorado
                // durante a verificação para poder editar o cliente sem
                // dar problema dizendo que o CPF já existe
                $data['id'] = $cliente['id'];

                // Passa o id do contato no data para que o id do contato seja
                // ignorado durante a verificação para poder editar o contato
                // sem dar problema dizendo que o email já existe
                $data['idContato'] = $cliente['idContato'];

                $this->clienteBO->validar($data);
                $this->estadoBO->validar($data);
                $this->cidadeBO->validar($data);
                $this->bairroBO->validar($data);
                $this->enderecoBO->validar($data);
                $this->contatoBO->validar($data);

                $resposta = $this->estadoBO->inserirEstado($data);
                $data['idEstado'] = $resposta;
                $resposta = $this->cidadeBO->inserirCidade($data);
                $data['idCidade'] = $resposta;
                $resposta = $this->bairroBO->inserirBairro($data);
                $data['idBairro'] = $resposta;
                $resposta = $this->enderecoBO->inserirEndereco($data);
                $data['idEndereco'] = $resposta;
                $resposta = $this->clienteBO->editarCliente($data);
                $data['idCliente'] = $resposta;
                $resposta = $this->contatoBO->editarContato($data);

                return ResponseUtil::jsonResponse(
                    [
                        'status' => 'success',
                        'msg' => 'Os dados do cliente foram atualziados com sucesso!',
                        'cliente' => $data,
                    ]
                );
            } catch (\Exception $e) {
                return ResponseUtil::jsonResponse(
                    [
                        'status' => 'error',
                        'msg' => $e->getMessage(),
                    ],
                    400
                );
            }
        } else {
            return ResponseUtil::jsonResponse(
                [
                    'status' => 'error',
                    'msg' => 'Erro ao processar os dados recebidos.',
                    'data' => $data,
                ],
                400
            );
        }
    }

    /**
     * Método responsável por remover um cliente do banco de dados
     *
     * @return JsonResponse
     */
    public function remover($idCliente){
        try {
            $cliente = $this->clienteBO->pesquisarClientePorId($idCliente);
            if ($cliente['idContato']) {
                $this->contatoBO->removerContato($cliente['idContato']);
            }
            $this->clienteBO->removerCliente($idCliente);

            return ResponseUtil::jsonResponse(
                [
                    'status' => 'success',
                    'msg' => 'Cliente removido com sucesso!',
                    'cliente' => $cliente,
                ]
            );
        } catch (\Exception $e) {
            return ResponseUtil::jsonResponse(
                [
                    'status' => 'error',
                    'msg' => $e->getMessage(),
                ],
                400
            );
        }
    }
}