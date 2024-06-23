<?php
	namespace App\Model\Dao;
	use App\Util\ResponseUtil;	

	class MySQL extends \PDO{
		private $DBhost = "localhost:3306";
		private $DBname = "agro_bold";
		private $DBuser = "root";
		private $DBpassword = "";
		private $conexao;
		private static $sql;

		/**
		 * Método construtor de MySQL
		 * 
		 * @return void
		 */
		public function __construct() {
			$options = array(
				\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
				\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
			);
	
			try {
				parent::__construct(
					"mysql:host=$this->DBhost;dbname=$this->DBname",
					"$this->DBuser",
					"$this->DBpassword",
					$options
				);
			} catch(\PDOException $e) {
				die("Erro ao conectar com o banco de dados: " . $e->getMessage());
			}
		}

		/**
		 * Configura os parâmetros da consulta SQL
		 * 
		 * @param \PDOStatement $statement Declaração preparada do PDO
		 * @param array 		$parameters Parâmetros da Requisição
		 * 
		 * @return void
		 */
		private function setParams($statement, $parameters = array())
		{
			foreach ($parameters as $key => $value) {
				$this->setParam($statement, $key, $value);
			}
		}

		/**
		 * Define um parâmetro da requisição
		 * 
		 * @param \PDOStatement $statement Declaração preparada do PDO
		 * @param string 		$key 	   Chave do parâmetro
		 * @param mixed 		$value 	   Valor do parâmetro
		 * 
		 * @return void
		 */
		private function setParam($statement, $key, $value)
		{
			$statement->bindParam($key, $value);
		}

		/**
		 * Executa uma requisição definida
		 * 
		 * @param string $linha 	 Consulta SQL
		 * @param array  $parametros Parâmetros da Requisição
		 * 
		 * @return \PDOStatement
		 */
		public function requisicao($linha, $parametros = array())
		{
			$stmt = $this->prepare($linha);
			$this->setParams($stmt, $parametros);
			$stmt->execute();
			return $stmt;
		}

		/**
		 * Executa uma requisição SELECT e retorna os resultados
		 * 
		 * @param string $linha 	 Consulta SQL
		 * @param array  $parametros Parâmetros da Requisição
		 * 
		 * @return array
		 */
		public function select($linha, $parametros = array()):array
		{
			$stmt = $this->requisicao($linha, $parametros);
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}

		/**
		 * Retorna uma única instância da classe MySQL (Singleton)
		 * 
		 * @return MySQL
		 */
		public static function getInstance():MySQL
		{
			if (!isset(self::$sql)) {
	            self::$sql = new MySQL();
	        }
	 
	        return self::$sql;
		}
	}
?>