<?php
	namespace App\Model\Vo;

	class BairroVO {
		private $id;
		private $nome;
		private $idCidade;

		/**
		 * Método construtor de BairroVO
		 * 
		 * @param string $nome 	   Nome do Bairro
		 * @param int 	 $idCidade Id da cidade
		 *
		 * @return void
		 */
		public function __construct(string $nome, int $idCidade)
		{
			$this->nome = $nome;
			$this->idCidade = $idCidade;
		}

		/**
		 * Retorna o id do bairro
		 *
		 * @return int
		 */
		public function getId():int
		{
			return $this->id;
		}

		/**
		 * Altera o id do bairro
		 * 
		 * @param int $id Id do bairro
		 *
		 * @return void
		 */
		public function setId(int $id)
		{
			$this->id = $id;
		}

		/**
		 * Retorna o nome do bairro
		 *
		 * @return string
		 */
		public function getNome():string
		{
			return $this->nome;
		}

		/**
		 * Retorna o id da cidade
		 *
		 * @return int
		 */
		public function getIdCidade():int
		{
			return $this->idCidade;
		}

		/**
		 * Altera o id da cidade
		 * 
		 * @param int $idCidade Id da cidade
		 *
		 * @return void
		 */
		public function setIdCidade(int $idCidade)
		{
			$this->idCidade = $idCidade;
		}
	}
?>