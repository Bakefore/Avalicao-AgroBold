<?php
	namespace App\Model\Bo;
	use App\Model\Dao\EnderecoDAO;
	use App\Model\Vo\EnderecoVO;

	class EnderecoBO {
		private $enderecoDAO;

		/**
		 * Método construtor de EnderecoBO
		 * 
		 * @return void
		 */
		public function __construct()
		{
			$this->enderecoDAO = new EnderecoDAO();
		}

		/**
		 * Faz a inserção de um endereço no banco de dados
		 *
		 * @param array $data Dados para inserção do endereço
		 *
		 * @return mixed
		 */
		public function inserirEndereco(array $data)
		{
			$enderecoVO = new EnderecoVO(
				$data['rua'],
				$data['numero'],
				$data['complemento'],
				$data['idBairro'],
			);

			$procurar = $this->pesquisarIdEndereco($enderecoVO);		 

			if($procurar !== null){
				return $procurar['id'];
			}
			return $this->enderecoDAO->inserirEndereco($enderecoVO)[0]['max(id)'];				 	
		}

		/**
		 * Pesquisa o endereço pelo id
		 *
		 * @param int $idEndereco Id do endereço
		 *
		 * @return EnderecoVO
		 */
		public function pesquisarEnderecoPorId(int $idEndereco):EnderecoVO
		{
			$enderecoArray = $this->enderecoDAO->pesquisarEnderecoPorId($idEndereco);
			return $this->converterParaEndereco($enderecoArray);
		}

		/**
		 * Faz a conversão de um array para EnderecoVO
		 *
		 * @param array $enderecoArray Array correspondente ao endereço
		 *
		 * @return EnderecoVO
		 */
		public function converterParaEndereco(array $enderecoArray):EnderecoVO
		{
			$enderecoVO = new EnderecoVO($enderecoArray['rua'], $enderecoArray['numero'], $enderecoArray['complemento'], 
				$enderecoArray['idBairro']);
			$enderecoVO->setId($enderecoArray['id']);
			return $enderecoVO;
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
			$enderecoVO = new EnderecoVO(
				$data['rua'],
				$data['numero'],
				$data['complemento'],
				1,
			);

			if (!$this->verificarCampos($enderecoVO)) {
				throw new \Exception('Preencha todos os campos obrigatórios!');
			}
		}

		/**
		 * Faz a verificação se os campos estão preenchidos corretamente
		 *
		 * @param EnderecoVO $enderecoVO Endereço a ser verificado
		 *
		 * @return bool
		 */
		public function verificarCampos(EnderecoVO $enderecoVO):bool
		{
			if(($enderecoVO->getRua() == "") || ($enderecoVO->getNumero() == "") || ($enderecoVO->getIdBairro() == "")){
				return false;				
			}
			return true;
		}

		/**
		 * Realiza a busca do id de um endereço
		 *
		 * @param EnderecoVO $enderecoVO Endereço passado
		 *
		 * @return mixed
		 */
		public function pesquisarIdEndereco(EnderecoVO $enderecoVO)
		{
			return $this->enderecoDAO->pesquisarIdEndereco($enderecoVO);
		}
	}
?>