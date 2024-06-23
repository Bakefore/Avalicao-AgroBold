<?php
	namespace App\Model\Dao;
	use App\Model\Vo\EnderecoVO;
	use App\Model\Dao\MySQL;

	class EnderecoDAO {

		/**
		 * Método construtor de EnderecoDAO
		 * 
		 * @return void
		 */
		public function __construct()
		{

		}

		/**
		 * Faz a inserção do endereço do cliente no banco de dados
		 *
		 * @param EnderecoVO $enderecoVO Endereço a ser inserido
		 *
		 * @return mixed
		 */
		public function inserirEndereco(EnderecoVO $enderecoVO)
		{
			MySQL::getInstance()->requisicao(
				"insert into endereco (rua, numero, complemento, idBairro) values (:rua, :numero, :complemento, :idBairro)",
				array(
					":rua"=>$enderecoVO->getRua(), 
					":numero"=>$enderecoVO->getNumero(),
					":complemento"=>$enderecoVO->getComplemento(),
					":idBairro"=>$enderecoVO->getIdBairro()
				)
			);

			return MySQL::getInstance()->select("select max(id) from endereco", array());
		}

		/**
		 * Faz a busca do endereço pelo id
		 *
		 * @param int $idEndereco Id do endereço a ser buscado
		 *
		 * @return mixed
		 */
		public function pesquisarEnderecoPorId(int $idEndereco)
		{
			$endereco = MySQL::getInstance()->select(
				"select * from endereco where id = :idEndereco",
				array(
					":idEndereco"=>$idEndereco
				)
			);

			if($endereco == null){
				return null;
			}

			return $endereco[0];
		}

		/**
		 * Faz a busca do id do endereço
		 *
		 * @param EnderecoVO $enderecoVO Endereço passado
		 *
		 * @return mixed
		 */
		public function pesquisarIdEndereco(EnderecoVO $enderecoVO)
		{
			$endereco = MySQL::getInstance()->select(
				"select id from endereco where rua = :rua and numero = :numero and complemento = :complemento and idBairro = :idBairro",
				array(
					":rua"=>$enderecoVO->getRua(), 
					":numero"=>$enderecoVO->getNumero(),
					":complemento"=>$enderecoVO->getComplemento(),
					":idBairro"=>$enderecoVO->getIdBairro()
				)
			);

			if($endereco == null){
				return null;
			}

			return $endereco[0];
		}
	}
?>