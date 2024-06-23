<?php
	namespace App\Model\Vo;

	class CidadeVO {
		private $id;
		private $nome;
		private $idEstado;

		/**
		 * Método construtor de CidadeVO
		 * 
		 * @param string $nome 	   Nome da Cidade
		 * @param int 	 $idEstado Id do estado
		 *
		 * @return void
		 */
		public function __construct(string $nome, int $idEstado)
		{
			$this->nome = $nome;
			$this->idEstado = $idEstado;
		}

		/**
		 * Retorna o id da cidade
		 *
		 * @return int
		 */
		public function getId():int
		{
			return $this->id;
		}

		/**
		 * Altera o id da cidade
		 * 
		 * @param int $id Id da cidade
		 *
		 * @return void
		 */
		public function setId(int $id)
		{
			$this->id = $id;
		}

		/**
		 * Retorna o nome da cidade
		 *
		 * @return string
		 */
		public function getNome():string
		{
			return $this->nome;
		}

		/**
		 * Retorna o id do estado
		 *
		 * @return int
		 */
		public function getIdEstado():int
		{
			return $this->idEstado;
		}

		/**
		 * Altera o id do estado
		 * 
		 * @param int $idEstado Id do estado
		 *
		 * @return void
		 */
		public function setIdEstado(int $idEstado)
		{
			$this->idEstado = $idEstado;
		}
	}
?>