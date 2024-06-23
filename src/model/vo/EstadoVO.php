<?php
	namespace App\Model\Vo;

	class EstadoVO{
		private $id;
		private $uf;

		/**
		 * Método construtor de EstadoVO
		 * 
		 * @param string $uf UF do Estado
		 *
		 * @return void
		 */
		public function __construct($uf)
		{
			$this->uf = $uf;
		}

		/**
		 * Retorna o id do estado
		 *
		 * @return int
		 */
		public function getId():int
		{
			return $this->id;
		}

		/**
		 * Altera o id do estado
		 * 
		 * @param int $id Id do estado
		 *
		 * @return void
		 */
		public function setId($id)
		{
			$this->id = $id;
		}

		/**
		 * Retorna a UF do estado
		 *
		 * @return string
		 */
		public function getUf(){
			return $this->uf;
		}
	}
?>