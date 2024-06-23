<?php
	namespace App\Model\Vo;

	class ContatoVO {
		private $id;
		private $celular;
		private $email;
		private $idCliente;

		/**
		 * Método construtor de ContatoVO
		 * 
		 * @param string $celular 	Celular do contato
		 * @param string $email 	Email do contato
		 * @param int 	 $idCliente Id do cliente
		 *
		 * @return void
		 */
		public function __construct($celular, $email, $idCliente)
		{
			$this->celular = $celular;
			$this->email = $email;
			$this->idCliente = $idCliente;
		}

		/**
		 * Retorna o id do contato
		 *
		 * @return int
		 */
		public function getId():int
		{
			return $this->id;
		}

		/**
		 * Altera o id do contato
		 * 
		 * @param int $id Id do contato
		 *
		 * @return void
		 */
		public function setId($id)
		{
			$this->id = $id;
		}

		/**
		 * Retorna o celular do contato
		 *
		 * @return string
		 */
		public function getCelular():string
		{
			return $this->celular;
		}

		/**
		 * Altera o celular do contato
		 * 
		 * @param string $celular Celular do contato
		 *
		 * @return void
		 */
		public function setCelular($celular)
		{
			$this->celular = $celular;
		}

		/**
		 * Retorna o email do contato
		 *
		 * @return string
		 */
		public function getEmail():string
		{
			return $this->email;
		}

		/**
		 * Altera o email do contato
		 * 
		 * @param string $email Email do contato
		 *
		 * @return void
		 */
		public function setEmail($email)
		{
			$this->email = $email;
		}

		/**
		 * Retorna o id do cliente
		 *
		 * @return int
		 */
		public function getIdCliente():int
		{
			return $this->idCliente;
		}
	}
?>