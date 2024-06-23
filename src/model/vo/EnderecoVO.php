<?php
	namespace App\Model\Vo;

	class EnderecoVO {
		private $id;
		private $rua;
		private $numero;
		private $complemento;
		private $idBairro;

		/**
		 * Método construtor de EnderecoVO
		 * 
		 * @param string $rua 	 	  Nome da Rua do endereço
		 * @param int 	 $numero 	  Número do endereço
		 * @param string $complemento Complemento do endereço
		 * @param int    $idBairro 	  Id do bairro do endereço
		 *
		 * @return void
		 */
		public function __construct(
			string $rua,
			int $numero,
			string $complemento,
			int $idBairro
		) {
			$this->rua = $rua;
			$this->numero = $numero;
			$this->complemento = $complemento;
			$this->idBairro = $idBairro;
		}

		/**
		 * Retorna o id do endereço
		 *
		 * @return int
		 */
		public function getId():int
		{
			return $this->id;
		}

		/**
		 * Altera o id do endereço
		 * 
		 * @param int $id Id do endereço
		 *
		 * @return void
		 */
		public function setId(int $id)
		{
			$this->id = $id;
		}

		/**
		 * Retorna a rua do endereço
		 *
		 * @return string
		 */
		public function getRua():string
		{
			return $this->rua;
		}

		/**
		 * Retorna o número do endereço
		 *
		 * @return int
		 */
		public function getNumero():int
		{
			return $this->numero;
		}

		/**
		 * Retorna o complemento do endereço
		 *
		 * @return string
		 */
		public function getComplemento():string
		{
			return $this->complemento;
		}

		/**
		 * Retorna o id do bairro
		 *
		 * @return int
		 */
		public function getIdBairro():int
		{
			return $this->idBairro;
		}

		/**
		 * Altera o id do bairro
		 * 
		 * @param int $idBairro Id do bairro
		 *
		 * @return void
		 */
		public function setIdBairro(int $idBairro){
			$this->idBairro = $idBairro;
		}
	}
?>