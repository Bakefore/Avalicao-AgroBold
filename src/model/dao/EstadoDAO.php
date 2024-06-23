<?php
	namespace App\Model\Dao;
	use App\Model\Vo\EstadoVO;
	use App\Model\Dao\MySQL;

	class EstadoDAO {

		/**
		 * Método construtor de EstadoDAO
		 * 
		 * @return void
		 */
		public function __construct()
		{

		}

		/**
		 * Faz a inserção do estado no banco de dados
		 *
		 * @param EstadoVO $estadoVO Estado a ser inserido
		 *
		 * @return mixed
		 */
		public function inserirEstado(EstadoVO $estadoVO)
		{
			MySQL::getInstance()->requisicao("insert into estado (uf) values (:uf)",
				array(
					":uf"=>$estadoVO->getUf()
				)
			);

			return MySQL::getInstance()->select("select max(id) from estado", array());
		}

		/**
		 * Faz a busca do estado pelo id
		 *
		 * @param int $idEstado Id do estado a ser buscado
		 *
		 * @return mixed
		 */
		public function pesquisarEstadoPorId(int $idEstado)
		{
			$estado = MySQL::getInstance()->select("select * from estado where id = :idEstado", array(
				":idEstado"=>$idEstado
			));

			if($estado == null){
				return null;
			}

			return $estado[0];
		}

		/**
		 * Faz a busca do id do estado
		 *
		 * @param EstadoVO $estadoVO Estado passado
		 *
		 * @return mixed
		 */
		public function pesquisarIdEstado(EstadoVO $estadoVO)
		{
			$estado = MySQL::getInstance()->select("select id from estado where uf = :uf",
				array(
					":uf"=>$estadoVO->getUf()
				)
			);

			if($estado == null){
				return null;
			}

			return $estado[0];
		}

	}
?>