<?php
	namespace App\Model\Dao;
	use App\Model\Vo\CidadeVO;
	use App\Model\Dao\MySQL;
	class CidadeDAO {

		/**
		 * Método construtor de CidadeDAO
		 * 
		 * @return void
		 */
		public function __construct(){

		}

		/**
		 * Faz a inserção de uma cidade no banco de dados
		 *
		 * @param CidadeVO $cidadeVO Cidade a ser inserida
		 *
		 * @return mixed
		 */
		public function inserirCidade(CidadeVO $cidadeVO)
		{
			MySQL::getInstance()->requisicao("insert into cidade (nome, idEstado) values (:nome, :idEstado)", array(

				":nome"=>$cidadeVO->getNome(), 
				":idEstado"=>$cidadeVO->getIdEstado()
			));

			return MySQL::getInstance()->select("select max(id) from cidade", array());
		}

		/**
		 * Faz a busca da cidade através do id
		 *
		 * @param int $idCidade Id da Cidade
		 *
		 * @return mixed
		 */
		public function pesquisarCidadePorId(int $idCidade)
		{
			$cidade = MySQL::getInstance()->select("select * from cidade where id = :idCidade", array(
				":idCidade"=>$idCidade
			));

			if($cidade == null){
				return null;
			}

			return $cidade[0];
		}

		/**
		 * Faz a busca do id da cidade
		 *
		 * @param CidadeVO $cidadeVO Cidade a ser buscada
		 *
		 * @return mixed
		 */
		public function pesquisarIdCidade(CidadeVO $cidadeVO)
		{
			$cidade = MySQL::getInstance()->select("select id from cidade where nome = :nome and idEstado = :idEstado", array(
				":nome"=>$cidadeVO->getNome(),
				":idEstado"=>$cidadeVO->getIdEstado()
			));

			if($cidade == null){
				return null;
			}

			return $cidade[0];
		}
	}
?>