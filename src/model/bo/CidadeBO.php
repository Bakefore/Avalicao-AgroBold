<?php
	namespace App\Model\Bo;
	use App\Model\Dao\CidadeDAO;
	use App\Model\Vo\CidadeVO;

	class CidadeBO {
		private $cidadeDAO;

		/**
		 * Método construtor de CidadeBO
		 * 
		 * @return void
		 */
		public function __construct(){
			$this->cidadeDAO = new CidadeDAO();
		}

		/**
		 * Faz a inserção de uma cidade no banco de dados
		 *
		 * @param array $data Dados para inserção da cidade
		 *
		 * @return mixed
		 */
		public function inserirCidade($data){			
			$cidadeVO = new CidadeVO(
				$data['cidade'],
				$data['idEstado'],
			);

			$procurar = $this->pesquisarIdCidade($cidadeVO);		 

			if($procurar !== null){
				return $procurar['id'];
			}
			return $this->cidadeDAO->inserirCidade($cidadeVO)[0]['max(id)'];			 	
		}

		/**
		 * Pesquisa uma cidade pelo id
		 *
		 * @param int $idCidade Id da cidade
		 *
		 * @return CidadeVO
		 */
		public function pesquisarCidadePorId(int $idCidade):CidadeVO
		{
			$cidadeArray = $this->cidadeDAO->pesquisarCidadePorId($idCidade);
			return $this->converterParaCidade($cidadeArray);
		}

		/**
		 * Faz a conversão de um array para CidadeVO
		 *
		 * @param array $cidadeArray Array correspondente à cidade
		 *
		 * @return CidadeVO
		 */
		public function converterParaCidade(array $cidadeArray):CidadeVO
		{
			$cidadeVO = new CidadeVO($cidadeArray['nome'], $cidadeArray['idEstado']);
			$cidadeVO->setId($cidadeArray['id']);
			return $cidadeVO;
		}

		/**
		 * Reune todas as validações da Cidade
		 *
		 * @param array $data Dados a serem validados
		 *
		 * @return void
		 */
		public function validar(array $data):void
		{
			$cidadeVO = new CidadeVO(
				$data['cidade'],
				1,
			);

			if (!$this->verificarCampos($cidadeVO)) {
				throw new \Exception('Preencha todos os campos obrigatórios!');
			}
		}

		/**
		 * Faz a verificação se os campos estão preenchidos corretamente
		 *
		 * @param CidadeVO $CidadeVO Cidade para ser verificada
		 *
		 * @return bool
		 */
		public function verificarCampos(CidadeVO $cidadeVO):bool
		{
			if(($cidadeVO->getNome() == "") || ($cidadeVO->getIdEstado() == "")){
				return false;				
			}
			return true;
		}

		/**
		 * Pesquisa o id da cidade passada
		 *
		 * @param CidadeVO $cidadeVO Cidade para ser pesquisada
		 *
		 * @return array
		 */
		public function pesquisarIdCidade(CidadeVO $cidadeVO){
			return $this->cidadeDAO->pesquisarIdCidade($cidadeVO);
		}
	}
?>