<?php
	namespace App\Model\Bo;
	use App\Model\Dao\BairroDAO;
	use App\Model\Vo\BairroVO;

	class BairroBO {
		private $bairroDAO;

		/**
		 * Método construtor de BairroBO
		 * 
		 * @return void
		 */
		public function __construct(){
			$this->bairroDAO = new BairroDAO();
		}

		/**
		 * Faz a inserção de um bairro no banco de dados
		 *
		 * @param array $data Dados para inserção do bairro
		 *
		 * @return int
		 */
		public function inserirBairro(array $data):int
		{
			$bairroVO = new BairroVO(
				$data['bairro'],
				$data['idCidade'],
			);

			$procurar = $this->pesquisarIdBairro($bairroVO);		 

			if($procurar !== null){
				return $procurar['id'];
			}
			return $this->bairroDAO->inserirBairro($bairroVO)[0]['max(id)'];			 	
		}

		/**
		 * Faz a busca por um bairro por meio do id
		 *
		 * @param int $idBairro Id do bairro
		 *
		 * @return BairroVO
		 */
		public function pesquisarBairroPorId(int $idBairro):BairroVO
		{
			$bairroArray = $this->bairroDAO->pesquisarBairroPorId($idBairro);
			return $this->converterParaBairro($bairroArray);
		}

		/**
		 * Faz a conversão de um array para BairroVO
		 *
		 * @param array $bairroArray Array correspondente ao bairro
		 *
		 * @return BairroVO
		 */
		public function converterParaBairro(array $bairroArray):BairroVO
		{
			$bairroVO = new BairroVO($bairroArray['nome'], $bairroArray['idCidade']);
			$bairroVO->setId($bairroArray['id']);
			return $bairroVO;
		}

		/**
		 * Reune todas as validações do Bairro
		 *
		 * @param array $data Dados a serem validados
		 *
		 * @return void
		 */
		public function validar(array $data):void
		{
			$bairroVO = new BairroVO(
				$data['bairro'],
				1,
			);

			if (!$this->verificarCampos($bairroVO)) {
				throw new \Exception('Preencha todos os campos obrigatórios!');
			}
		}

		/**
		 * Faz a verificação se os campos estão preenchidos corretamente
		 *
		 * @param BairroVO $bairroVO Bairro para ser verificado
		 *
		 * @return bool
		 */
		public function verificarCampos(BairroVO $bairroVO):bool
		{
			if(($bairroVO->getNome() == "") || ($bairroVO->getIdCidade() == "")){
				return false;				
			}
			return true;
		}

		/**
		 * Pesquisa o id do bairro passado
		 *
		 * @param BairroVO $bairroVO Bairro para ser pesquisado
		 *
		 * @return mixed
		 */
		public function pesquisarIdBairro(BairroVO $bairroVO)
		{
			return $this->bairroDAO->pesquisarIdBairro($bairroVO);
		}
	}
?>