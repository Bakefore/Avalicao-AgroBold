<?php
	namespace App\Model\Bo;
	use App\Model\Dao\EstadoDAO;
	use App\Model\Vo\EstadoVO;

	class EstadoBO {
		private $estadoDAO;

		/**
		 * Método construtor de EstadoBO
		 * 
		 * @return void
		 */
		public function __construct()
		{
			$this->estadoDAO = new EstadoDAO();
		}

		/**
		 * Faz a inserção de um estado no banco de dados
		 *
		 * @param array $data Dados para inserção do estado
		 *
		 * @return mixed
		 */
		public function inserirEstado(array $data)
		{
			$estadoVO = new EstadoVO(
				$data['uf'],
			);

			$procurar = $this->pesquisarIdEstado($estadoVO);		 

			if($procurar !== null){
				return $procurar['id'];
			}
			return $this->estadoDAO->inserirEstado($estadoVO)[0]['max(id)'];	
		}

		/**
		 * Pesquisa o estado pelo id
		 *
		 * @param int $idEstado Id do estado
		 *
		 * @return EstadoVO
		 */
		public function pesquisarEstadoPorId(int $idEstado):EstadoVO
		{
			$estadoArray = $this->estadoDAO->pesquisarEstadoPorId($idEstado);
			return $this->converterParaEstado($estadoArray);
		}

		/**
		 * Faz a conversão de um array para EstadoVO
		 *
		 * @param array $estadoArray Array correspondente ao estado
		 *
		 * @return EstadoVO
		 */
		public function converterParaEstado(array $estadoArray):EstadoVO
		{
			$estadoVO = new EstadoVO($estadoArray['uf']);
			$estadoVO->setId($estadoArray['id']);
			return $estadoVO;
		}

		/**
		 * Reune todas as validações do Estado
		 *
		 * @param array $data Dados a serem validados
		 *
		 * @return void
		 */
		public function validar(array $data):void
		{
			$estadoVO = new EstadoVO(
				$data['uf'],
			);

			if (!$this->verificarCampos($estadoVO)) {
				throw new \Exception('Preencha todos os campos obrigatórios!');
			}
		}

		/**
		 * Faz a verificação se os campos estão preenchidos corretamente
		 *
		 * @param EstadoVO $estadoVO Estado a ser verificado
		 *
		 * @return bool
		 */
		public function verificarCampos(EstadoVO $estadoVO):bool
		{
			if(($estadoVO->getUf() == "")){
				return false;				
			}
			return true;
		}

		/**
		 * Realiza a busca do id de um estado
		 *
		 * @param EstadoVO $estadoVO Estado passado
		 *
		 * @return mixed
		 */
		public function pesquisarIdEstado(EstadoVO $estadoVO)
		{
			return $this->estadoDAO->pesquisarIdEstado($estadoVO);
		}
	}
?>