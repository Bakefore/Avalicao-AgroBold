<?php
	namespace App\Model\Vo;

	class ClienteVO {
		private $id;
		private $nome;
		private $cpf;
		private $dataNascimento;
		private $sexo;
		private $senha;
		private $ativo;
		private $idEndereco;

		/**
		 * Método construtor de ClienteVO
		 * 
		 * @param string $nome 			 Nome do Cliente
		 * @param string $cpf 			 CPF do Cliente
		 * @param string $dataNascimento Data de Nascimento do Cliente
		 * @param string $sexo 			 Sexo do Cliente
		 * @param int 	 $idEndereco 	 Id do endereço do cliente
		 *
		 * @return void
		 */
		public function __construct(
			$nome,
			$cpf,
			$dataNascimento,
			$sexo,
			$idEndereco
		){
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->dataNascimento = $dataNascimento;
			$this->sexo = $sexo;
			$this->ativo = true;
			$this->idEndereco = $idEndereco;
		}

		/**
		 * Retorna o id do cliente
		 *
		 * @return int
		 */
		public function getId():int
		{
			return $this->id;
		}

		/**
		 * Altera o id do cliente
		 * 
		 * @param int $id Id do cliente
		 *
		 * @return void
		 */
		public function setId($id):void
		{
			$this->id = $id;
		}

		/**
		 * Retorna o nome do cliente
		 *
		 * @return string
		 */
		public function getNome():string
		{
			return $this->nome;
		}

		/**
		 * Retorna o CPF do cliente
		 *
		 * @return string
		 */
		public function getCPF():string
		{
			return $this->cpf;
		}

		/**
		 * Retorna a data de nascimento do cliente
		 *
		 * @return string
		 */
		public function getDataNascimento():string
		{
			return $this->dataNascimento;
		}

		/**
		 * Retorna o Sexo do cliente
		 *
		 * @return string
		 */
		public function getSexo():string
		{
			return $this->sexo;
		}

		/**
		 * Retorna se o cliente está ativo ou não
		 *
		 * @return bool
		 */
		public function getAtivo():bool
		{
			return $this->ativo;
		}

		/**
		 * Altera o estado do cliente
		 * 
		 * @param bool $idEndereco Id do endereço cliente
		 *
		 * @return void
		 */
		public function setAtivo($ativo):void
		{
			$this->ativo = $ativo;
		}

		/**
		 * Retorna o Id do endereço do cliente
		 *
		 * @return int
		 */
		public function getIdEndereco():int
		{
			return $this->idEndereco;
		}		

		/**
		 * Altera o id do endereço do cliente
		 * 
		 * @param int $idEndereco Id do endereço cliente
		 *
		 * @return void
		 */
		public function setIdEndereco($idEndereco):void
		{
			$this->idEndereco = $idEndereco;
		}
	}
?>