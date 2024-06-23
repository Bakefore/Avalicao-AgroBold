<?php
	namespace App\Model\Dao;
	use App\Model\Vo\ClienteVO;
	use App\Model\Dao\MySQL;

	class ClienteDAO {

		/**
		 * Método construtor de ClienteDAO
		 * 
		 * @return void
		 */
		public function __construct(){

		}

		/**
		 * Faz a edição de um cliente no banco de dados
		 *
		 * @param ClienteVO $clienteVO cliente a ser inserido
		 *
		 * @return mixed
		 */
		public function editarCliente(ClienteVO $clienteVO)
		{
			MySQL::getInstance()->requisicao(
				"update cliente set nome = :nome, dataNascimento = :dataNascimento, sexo = :sexo, idEndereco = :idEndereco where id = :idCliente",
				array(
					":nome"=>$clienteVO->getNome(),
					":dataNascimento"=>$clienteVO->getDataNascimento(),
					":sexo"=>$clienteVO->getSexo(),
					":idEndereco"=>$clienteVO->getIdEndereco(),
					":idCliente"=>$clienteVO->getId(),
				)
			);
		}

		/**
		 * Faz a remoção de um cliente no banco de dados
		 *
		 * @param int $idCliente Id do cliente a ser removido
		 *
		 * @return mixed
		 */
		public function removerCliente(int $idCliente){
			MySQL::getInstance()->requisicao(
				"delete from cliente where id = :idCliente",
				array(
					":idCliente"=>$idCliente
				)
			);
		}

		/**
		 * Faz a inserção de um cliente no banco de dados
		 *
		 * @param ClienteVO $clienteVO Cliente a ser inserido
		 *
		 * @return mixed
		 */
		public function inserirCliente(ClienteVO $clienteVO)
		{
			MySQL::getInstance()->requisicao(
				"insert into cliente (nome, cpf, dataNascimento, sexo, ativo, idEndereco) values (:nome, :cpf, :dataNascimento, :sexo, :ativo, :idEndereco)",
				array(
					":nome"=>$clienteVO->getNome(), 
					":cpf"=>$clienteVO->getCPF(), 
					":dataNascimento"=>$clienteVO->getDataNascimento(), 
					":sexo"=>$clienteVO->getSexo(),
					":ativo"=>$clienteVO->getAtivo(),
					":idEndereco"=>$clienteVO->getIdEndereco() 
				)
			);

			return MySQL::getInstance()->select("select max(id) from cliente", array());
		}

		/**
		 * Faz a busca do cliente através do id
		 *
		 * @param int $idCliente Id do Cliente
		 *
		 * @return mixed
		 */
		public function pesquisarClientePorId($idCliente)
		{
			$cliente = MySQL::getInstance()->select(
				"select
					cliente.*,
					contato.id as idContato,
					contato.celular,
					contato.email,
					endereco.rua,
					endereco.numero,
					endereco.complemento,
					bairro.nome as bairro,
					cidade.nome as cidade,
					estado.uf
				from
					cliente
				left join 
					contato ON contato.idCliente = cliente.id
				left join 
					endereco ON endereco.id = cliente.idEndereco
				left join 
					bairro ON bairro.id = endereco.idBairro
				left join
					cidade ON cidade.id = bairro.idCidade
				left join 
					estado ON estado.id = cidade.idEstado
				where 
					cliente.id = :idCliente",
				array(				
					":idCliente"=>$idCliente
				)
			);

			if($cliente == null){
				return null;
			}

			return $cliente[0];
		}

		/**
		 * Realiza a listagem de todos os clientes já registrados
		 *
		 * @return mixed
		 */
		public function listarClientes()
		{
			$clientes = MySQL::getInstance()->select(
				"select
					cliente.id,
					cliente.nome,
					cliente.cpf,
					cliente.dataNascimento,
					cliente.sexo,
					contato.celular,
					contato.email
				from
					cliente
				inner join 
					contato ON contato.idCliente = cliente.id",
			);

			if($clientes == null){
				return null;
			}

			return $clientes;
		}

		/**
		 * Faz a busca do cliente através do CPF
		 *
		 * @param string $cpf CPF do Cliente
		 * @param int	 $idCliente Id do cliente caso esteja sendo editado
		 *
		 * @return mixed
		 */
		public function pesquisarPorCPF(string $cpf, int $idCliente = null)
		{
			$cliente = MySQL::getInstance()->select(
				"select * from cliente where cpf = :cpf and ativo = true and id != :idCliente",
				array(
					":cpf"=>$cpf,
					':idCliente'=>$idCliente
				)
			);

			if($cliente == null){
				return false;
			}

			return true;
		}

		/**
		 * Faz a busca do id do cliente através do CPF
		 *
		 * @param string $cpf CPF do Cliente
		 *
		 * @return mixed
		 */
		public function pesquisarIdClientePorCPF(string $cpf)
		{
			$cpf = MySQL::getInstance()->select(
				"select id from cliente where cpf = :cpf and ativo = true",
				array(
					":cpf"=>$cpf
				)
			);

			if($cpf == null){
				return null;
			}

			return $cpf[0];
		}

		/**
		 * Faz uma busca dos clientes por meio do filtro passado
		 *
		 * @param string $filtro Filtro a ser utilizado na busca
		 *
		 * @return mixed
		 */
		public function pesquisarClientes(string $filtro)
		{
			$clientes = MySQL::getInstance()->select(
				"select * from cliente where (nome like :filtro or cpf like :filtro or dataNascimento like :filtro) and ativo = true order by nome",
				array(
					":filtro"=>"%".$filtro."%",
				)
			);

			if($clientes == null){
				return null;
			}

			return $clientes;
		}
	}
?>