<?php
	namespace App\Model\Bo;
	use App\Model\Dao\ContatoDAO;
	use App\Model\Vo\ContatoVO;

	class ContatoBO {
		private $contatoDAO;

		/**
		 * Método construtor de ContatoBO
		 * 
		 * @return void
		 */
		public function __construct()
		{
			$this->contatoDAO = new ContatoDAO();
		}

		/**
		 * Faz a inserção do contato do cliente no banco de dados
		 *
		 * @param array $data Dados para inserção do contato
		 *
		 * @return mixed
		 */
		public function inserirContato(array $data)
		{
			$contatoVO = new ContatoVO(
				$data['celular'],
				$data['email'],
				$data['idCliente'],
			);

			return $this->contatoDAO->inserirContato($contatoVO);
		}

		/**
		 * Realiza a edição de um contato
		 *
		 * @param array $data Dados para edição do contato
		 *
		 * @return mixed
		 */
		public function editarContato(array $data)
		{
			$contatoVO = new ContatoVO(
				$data['celular'],
				$data['email'],
				$data['idCliente'],
			);

			$contatoVO->setId($data['idContato']);

			$this->contatoDAO->editarContato($contatoVO);
		}

		/**
		 * Remove o contato do banco de dados
		 *
		 * @param int $idContato Id do contato a ser removido
		 *
		 * @return mixed
		 */
		public function removerContato(int $idContato){
			$this->contatoDAO->removerContato($idContato);
		}

		/**
		 * Pesquisa pelos contatos a partir do id do cliente
		 *
		 * @param int $idCliente Id do cliente
		 *
		 * @return ContatoVO
		 */
		public function pesquisarContatosPeloIdCliente(int $idCliente):ContatoVO
		{
			$contatoArray = $this->contatoDAO->pesquisarContatosPeloIdCliente($idCliente);
			return $this->converterParaContato($contatoArray);
		}

		/**
		 * Faz a conversão de um array para ContatoVO
		 *
		 * @param array $contatoArray Array correspondente ao contato
		 *
		 * @return ContatoVO
		 */
		public function converterParaContato(array $contatoArray):ContatoVO
		{
			$contatoVO = new ContatoVO($contatoArray['celular'], $contatoArray['email'], $contatoArray['idCliente']);
			$contatoVO->setId($contatoArray['id']);
			return $contatoVO;
		}

		/**
		 * Reune todas as validações do Endereço
		 *
		 * @param array $data Dados a serem validados
		 *
		 * @return void
		 */
		public function validar(array $data):void
		{
			$contatoVO = new ContatoVO(
				$data['celular'],
				$data['email'],
				1,
			);

			if (!$this->verificarCampos($contatoVO)) {
				throw new \Exception('Preencha todos os campos obrigatórios!');
			}
			
			if (!$this->validarFormatoEmail($contatoVO->getEmail())) {
				throw new \Exception('O formato do e-mail não é válido!');
			}

			if (!$this->verificarEmail($contatoVO->getEmail(), $data['idContato'] ?? null)) {
				throw new \Exception('O email inserido já está cadastrado!');
			}
		}

		/**
		 * Faz a verificação se os campos estão preenchidos corretamente
		 *
		 * @param ContatoVO $contatoVO Contato a ser verificado
		 *
		 * @return bool
		 */
		public function verificarCampos(ContatoVO $contatoVO):bool
		{
			if(($contatoVO->getCelular() == "") || ($contatoVO->getEmail() == "") || 
				($contatoVO->getIdCliente() == "")){
				return false;				
			}
			return true;
		}

		/**
		 * Verifica se o email já está cadastrado
		 *
		 * @param string $email 	Email a ser verificado
		 * @param int 	 $idContato Id do contato caso esteja sendo editado
		 *
		 * @return bool
		 */
		public function verificarEmail(string $email, int $idContato = null):bool
		{
			if($this->contatoDAO->pesquisarPorEmail($email, $idContato)){
				return false;
			}	
			return true;
		}

		/**
		 * Valida o formato do email
		 *
		 * @param string $email Email a ser verificado
		 *
		 * @return bool
		 */
		function validarFormatoEmail($email):bool
		{
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				return true;
			}
			return false;
		}

		/**
		 * Busca o email de contato através do CPF
		 *
		 * @param string $cpf CPF do cliente
		 *
		 * @return mixed
		 */
		public function pesquisarEmailPorCPF(string $cpf)
		{
			return $this->contatoDAO->pesquisarEmailPorCPF($cpf);
		}
	}
?>