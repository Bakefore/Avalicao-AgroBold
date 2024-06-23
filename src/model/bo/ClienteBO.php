<?php 
	namespace App\Model\Bo;
	use App\Model\Dao\ClienteDAO;
	use App\Model\Vo\ClienteVO;

	class ClienteBO {
		private $clienteDAO;

		/**
		 * Método construtor de ClienteBO
		 *
		 * @return void
		 */
		public function __construct()
		{
			$this->clienteDAO = new ClienteDAO();
		}

		/**
		 * Realiza a edição de um cliente
		 *
		 * @param array $data Dados para edição do cliente
		 *
		 * @return mixed
		 */
		public function editarCliente(array $data)
		{
			$clienteVO = new ClienteVO(
				$data['nome'],
				$data['cpf'],
				$data['nascimento'],
				$data['sexo'],
				$data['idEndereco'],
			);

			$clienteVO->setId($data['id']);

			$this->clienteDAO->editarCliente($clienteVO);
		}

		/**
		 * Remove o usuário do banco de dados
		 *
		 * @param int $idCliente Id do usuário a ser removido
		 *
		 * @return mixed
		 */
		public function removerCliente(int $idCliente){
			$this->clienteDAO->removerCliente($idCliente);
		}

		/**
		 * Realiza a busca de um cliente pelo id
		 *
		 * @param int $idCliente Id do cliente a ser buscado
		 *
		 * @return mixed
		 */
		public function pesquisarClientePorId(int $idCliente)
		{
			return $this->clienteDAO->pesquisarClientePorId($idCliente);
		}

		/**
		 * Realiza a listagem de todos os clientes já registrados
		 *
		 * @return mixed
		 */
		public function listarClientes()
		{
			return $this->clienteDAO->listarClientes();
		}

		/**
		 * Faz a inserção de um cliente no banco de dados
		 *
		 * @param array $data Dados para inserção do cliente
		 *
		 * @return mixed
		 */
		public function inserirCliente(array $data)
		{
			$clienteVO = new ClienteVO(
				$data['nome'],
				$data['cpf'],
				$data['nascimento'],
				$data['sexo'],
				$data['idEndereco'],
			);
	
			return $this->clienteDAO->inserirCliente($clienteVO)[0]['max(id)'];				 	
		}	

		/**
		 * Faz uma busca por usuários no banco de dados
		 *
		 * @param string $filtro 	  Texto utilizado na busca
		 *
		 * @return mixed
		 */
		public function pesquisarClientes(string $filtro)
		{
			$resultado = $this->clienteDAO->pesquisarClientes($filtro);

			$arrayAdministradores = array();
			if($resultado != null){
				for ($i=0; $i < count($resultado); $i++) { 
					$clienteVO = new ClienteVO($resultado[$i]['nome'], $resultado[$i]['cpf'], 
						$resultado[$i]['dataNascimento'], $resultado[$i]['sexo'],
						$resultado[$i]['idEndereco']);
					$clienteVO->setId($resultado[$i]['id']);

					array_push($arrayAdministradores, $clienteVO);
				}
				return $arrayAdministradores;
			}
			return null;
		}

		/**
		 * Reune todas as validações do Cliente
		 *
		 * @param array $data Dados a serem validados
		 *
		 * @return void
		 */
		public function validar(array $data):void
		{
			$clienteVO = new ClienteVO(
				$data['nome'],
				$data['cpf'],
				$data['nascimento'],
				$data['sexo'],
				1,
			);

			if (!$this->verificarCampos($clienteVO)) {
				throw new \Exception('Preencha todos os campos obrigatórios!');
			}

			if (!$this->validarCPF($clienteVO->getCPF())) {
				throw new \Exception('O CPF inserido não é válido!');
			}

			if (!$this->verificarCPF($clienteVO->getCPF(), $data['id'] ?? null)) {
				throw new \Exception('O CPF inserido já está cadastrado!');
			}
		}

		/**
		 * Valida o formato do CPF passado
		 *
		 * @param string $cpf CPF passado para verificação
		 *
		 * @return bool
		 */
		public function validarCPF(string $cpf = null):bool
		{
			// Etapa 1: Cria um array com apenas os digitos numéricos, isso permite
			// receber o cpf em diferentes formatos como "000.000.000-00", "00000000000",
			// "000 000 000 00" etc...
			$j=0;
			for($i=0; $i<(strlen($cpf)); $i++){
				if(is_numeric($cpf[$i]))
					{
						$num[$j]=$cpf[$i];
						$j++;
					}
			}
			// Etapa 2: Conta os dígitos, um cpf válido possui 11 dígitos numéricos.
			if(count($num)!=11){
				$isCpfValid=false;
			}
			// Etapa 3: Combinações como 00000000000 e 22222222222 embora não sejam
			// cpfs reais resultariam em cpfs válidos após o calculo dos dígitos verificares
			// e por isso precisam ser filtradas nesta parte.
			else{
				for($i=0; $i<10; $i++){
					if ($num[0]==$i && $num[1]==$i && $num[2]==$i && $num[3]==$i && $num[4]==$i && $num[5]==$i && $num[6]==$i && $num[7]==$i && $num[8]==$i){
						$isCpfValid=false;
						break;
					}
				}
			}
			// Etapa 4: Calcula e compara o primeiro dígito verificador.
			if(!isset($isCpfValid)){
				$j=10;
				for($i=0; $i<9; $i++){
					$multiplica[$i]=$num[$i]*$j;
					$j--;
				}
				$soma = array_sum($multiplica);	
				$resto = $soma%11;			
				if($resto<2){
					$dg=0;
				}
				else{
					$dg=11-$resto;
				}
				if($dg!=$num[9]){
					$isCpfValid=false;
				}
			}
			// Etapa 5: Calcula e compara o segundo dígito verificador.
			if(!isset($isCpfValid)){
				$j=11;
				for($i=0; $i<10; $i++){
					$multiplica[$i]=$num[$i]*$j;
					$j--;
				}
				$soma = array_sum($multiplica);
				$resto = $soma%11;
				if($resto<2){
					$dg=0;
				}
				else{
					$dg=11-$resto;
				}
				if($dg!=$num[10]){
					$isCpfValid=false;
				}
				else{
					$isCpfValid=true;
				}
			}
			//Etapa 6: Retorna o Resultado em um valor booleano.
			return $isCpfValid;	
		}

		/**
		 * Verifica se o CPF já existe no banco de dados
		 *
		 * @param string $cpf 		CPF passado para inserção
		 * @param int 	 $idCliente Id do cliente caso esteja sendo editado
		 *
		 * @return bool
		 */
		public function verificarCPF(string $cpf, int $idCliente = null):bool
		{
			if($this->clienteDAO->pesquisarPorCPF($cpf, $idCliente)){
				return false;
			}	
			return true;
		}

		/**
		 * Realiza a busca do id de um cliente pelo CPF
		 *
		 * @param string $cpf CPF passada para usar na busca
		 *
		 * @return mixed
		 */
		public function pesquisarIdClientePorCPF(string $cpf){
			return $this->clienteDAO->pesquisarIdClientePorCPF($cpf);
		}

		/**
		 * Verifica se existe algum campo vazio
		 *
		 * @param ClienteVO $clienteVO Cliente passado para verificação
		 *
		 * @return bool
		 */
		public function verificarCampos(ClienteVO $clienteVO):bool
		{
			if(($clienteVO->getNome() === "") || ($clienteVO->getCPF() === "") || ($clienteVO->getDataNascimento() === "") || 
				($clienteVO->getSexo() === "") || ($clienteVO->getIdEndereco() === "")){
				return false;				
			}
			return true;
		}
	}
?>