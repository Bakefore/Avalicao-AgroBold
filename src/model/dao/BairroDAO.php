<?php
	namespace App\Model\Dao;
	use App\Model\Vo\BairroVO;
	use App\Model\Dao\MySQL;

	class BairroDAO {

		/**
		 * Método construtor de BairroDAO
		 * 
		 * @return void
		 */
		public function __construct()
		{

		}

		/**
		 * Faz a inserção de um bairro no banco de dados
		 *
		 * @param BairroVO $bairroVO BairroVO para inserção do Bairro
		 *
		 * @return mixed
		 */
		public function inserirBairro(BairroVO $bairroVO)
		{
			MySQL::getInstance()->requisicao("insert into bairro (nome, idCidade) values (:nome, :idCidade)", array(

				":nome"=>$bairroVO->getNome(), 
				":idCidade"=>$bairroVO->getIdCidade()
			));

			return MySQL::getInstance()->select("select max(id) from bairro", array());
		}

		/**
		 * Faz a busca do bairro através do id
		 *
		 * @param int $idBairro Id do Bairro
		 *
		 * @return mixed
		 */
		public function pesquisarBairroPorId(int $idBairro)
		{
			$bairro = MySQL::getInstance()->select("select * from bairro where id = :idBairro", array(
				
				":idBairro"=>$idBairro
			));

			if($bairro == null){
				return null;
			}

			return $bairro[0];
		}

		/**
		 * Faz a busca do id do bairro
		 *
		 * @param BairroVO $bairroVO Bairro a ser buscado
		 *
		 * @return mixed
		 */
		public function pesquisarIdBairro(BairroVO $bairroVO)
		{
			$bairro = MySQL::getInstance()->select("select id from bairro where nome = :nome and idCidade = :idCidade", array(
				":nome"=>$bairroVO->getNome(),
				":idCidade"=>$bairroVO->getIdCidade()
			));

			if($bairro == null){
				return null;
			}

			return $bairro[0];
		}
	}
?>