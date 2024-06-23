<?php
	namespace App\Model\Dao;
	use App\Model\Vo\ContatoVO;
	use App\Model\Dao\MySQL;

	class ContatoDAO {

		/**
		 * Método construtor de ContatoDAO
		 * 
		 * @return void
		 */
		public function __construct()
		{

		}

		/**
		 * Faz a inserção do contato do cliente no banco de dados
		 *
		 * @param ContatoVO $clienteVO Contato a ser inserido
		 *
		 * @return mixed
		 */
		public function inserirContato(ContatoVO $contatoVO)
		{
			MySQL::getInstance()->requisicao(
				"insert into contato (celular, email, idCliente) values (:celular, :email, :idCliente)",
				array(
					":celular"=>$contatoVO->getCelular(), 
					":email"=>$contatoVO->getEmail(),
					":idCliente"=>$contatoVO->getIdCliente()
				)
			);
		}

		/**
		 * Faz a edição de um contato no banco de dados
		 *
		 * @param ContatoVO $clienteVO cliente a ser inserido
		 *
		 * @return mixed
		 */
		public function editarContato(ContatoVO $contatoVO)
		{
			MySQL::getInstance()->requisicao("update contato set celular = :celular, email = :email where id = :id", array(

				":celular"=>$contatoVO->getCelular(),
				":email"=>$contatoVO->getEmail(),
				":id"=>$contatoVO->getId()
			));
		}

		/**
		 * Busca os contatos através do id do cliente
		 *
		 * @param int $idCliente Id do cliente
		 *
		 * @return mixed
		 */
		public function pesquisarContatosPeloIdCliente(int $idCliente)
		{
			$contatos = MySQL::getInstance()->select(
				"select * from contato where idCliente = :idCliente",
				array(
					":idCliente"=>$idCliente
				)
			);

			if($contatos == null){
				return null;
			}

			return $contatos[0];
		}

		/**
		 * Faz a remoção de um contato no banco de dados
		 *
		 * @param int $idContato Id do contato a ser removido
		 *
		 * @return mixed
		 */
		public function removerContato(int $idContato){
			MySQL::getInstance()->requisicao(
				"delete from contato where id = :idContato",
				array(
					":idContato"=>$idContato
				)
			);
		}

		/**
		 * Busca os contatos através do email
		 *
		 * @param string $email 	Email do contato
		 * @param int	 $idContato Id do contato caso esteja sendo editado
		 *
		 * @return mixed
		 */
		public function pesquisarPorEmail(string $email, int $idContato = null)
		{
			$contato = MySQL::getInstance()->select(
				"select * from contato where email = :email and id != :idContato",
				array(
					":email"=>$email,
					":idContato"=>$idContato
				)
			);

			if($contato == null){
				return false;
			}

			return true;
		}

		/**
		 * Busca o email através do CPF do cliente
		 *
		 * @param string $cpf CPF do cliente
		 *
		 * @return mixed
		 */
		public function pesquisarEmailPorCPF(string $cpf)
		{
			$email = MySQL::getInstance()->select(
				"select c.email, u.nome from contato as c inner join cliente as u
				on c.idCliente = u.id where u.cpf = :cpf",
				array(
					":cpf"=>$cpf
				)
			);

			if($email == null){
				return null;
			}

			return $email[0];
		}
	}
?>