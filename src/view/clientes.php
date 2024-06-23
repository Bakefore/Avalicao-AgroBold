<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação - Gestão de Clientes</title>

    <!-- Bootstrap CSS -->
    <link href="common/datatable/bootstrap_css_file.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="common/datatable/dataTables.bootstrap4_css_file.min.css" rel="stylesheet">

    <!-- CSS da página	 -->
    <link rel="stylesheet" type="text/css" href="common/css/style.css">

    <!--Ícone superior da página-->
    <link rel="icon" type="image/x-icon" href="common/img/ico/agro_bold.ico" />
</head>
<body>
    <div class="container mt-5" onclick="desabilitarEdicao()">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h3 class="mb-4">Gerenciamento de Clientes</h3>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <button data-toggle='modal' data-target='#modalCadastro' title="Inserir Cliente" type="button" class="btn btn-primary mb-3">
                    <svg width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                    </svg>
                    <span class="texto-botao-pesquisa">&nbsp;Inserir Cliente</span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <table id="agro_bold_data_table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th width="60px">Nascimento</th>
                            <th width="50px">Sexo</th>
                            <th>Celular</th>
                            <th width="70px">E-mail</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="font-weight-400">
        <!-- Modais -->
        <!-- The Modal 1-->
        <div class="modal" id="modalCadastro">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">				      
                    <!-- Modal Header -->
                    <div class=""> 
                        <!-- <div class="row"> -->
                            <div class="modal-header margin-bottom--27">
                                <h4 class="modal-title">Formulário de Cadastro</h4>		
                                <button type="button" class="close" data-dismiss="modal">&times;</button>  			
                            </div>
                        <!-- </div> -->
                    </div>					        	
                
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h5>Dados Pessoais</h5>
                            </div>	
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 margin-top-10">
                                <label for="input-cadastro-nome">Nome *</label>
                                <input class="form-control" type="text" id="input-cadastro-nome">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 margin-top-10">
                                <label for="input-cadastro-cpf">CPF *</label>
                                <input class="form-control" type="text" id="input-cadastro-cpf">
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 margin-top-10">
                                <label for="select-cadastro-sexo">Sexo *</label>									
                                <select class="form-control" id="select-cadastro-sexo">
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 margin-top-10">
                                <label for="input-cadastro-nascimento">Data de Nascimento *</label>
                                <input class="form-control" type="date" id="input-cadastro-nascimento">
                            </div>
                        </div>

                        <div class="margin-top-10">
                            <h5>Endereço</h5>
                        </div>	

                        <div class="row">
                            <div class="col-8 col-sm-8 col-md-4 col-lg-3 col-xl-3 margin-top-10">
                                <label for="input-cadastro-cep">CEP</label>
                                <input class="form-control" onblur="editarVariaveisGlobais(this.value, 'input-cadastro-rua', 'input-cadastro-bairro', 'input-cadastro-cidade', 'select-cadastro-uf');" type="text" id="input-cadastro-cep">
                            </div>
                            <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 margin-top-10">
                                <label for="select-cadastro-uf">UF *</label>										
                                <select class="form-control" id="select-cadastro-uf"></select>
                            </div>
                            <div class="col-12 col-sm-12 col-md-5 col-lg-3 col-xl-3 margin-top-10">
                                <label for="input-cadastro-cidade">Cidade *</label>
                                <input class="form-control" type="text" id="input-cadastro-cidade">
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 margin-top-10">
                                <label for="input-cadastro-bairro">Bairro *</label>
                                <input class="form-control" type="text" id="input-cadastro-bairro">
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-5 col-xl-5 margin-top-10">
                                <label for="input-cadastro-rua">Rua *</label>
                                <input class="form-control" type="text" id="input-cadastro-rua">
                            </div>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2 margin-top-10">
                                <label for="input-cadastro-numero">Número *</label>
                                <input class="form-control" type="number" id="input-cadastro-numero">
                            </div>
                            <div class="col-8 col-sm-8 col-md-8 col-lg-5 col-xl-5 margin-top-10">
                                <label for="input-cadastro-complemento">Complemento</label>
                                <input class="form-control" type="text" id="input-cadastro-complemento">
                            </div>
                        </div>

                        <div class="margin-top-10"><!-- margin-bottom--10 -->
                            <h5>Contatos</h5>
                        </div>	

                        <div id="div-contato" class="row"><!-- margin-top-10 -->
                            <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 margin-top-10">
                                <label for="input-cadastro-celular">Celular *</label>
                                <input class="form-control" type="text" id="input-cadastro-celular">
                            </div>
                            <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8 margin-top-10">
                                <label for="input-cadastro-email">E-mail *</label>
                                <input class="form-control" type="text" id="input-cadastro-email">
                            </div>																					
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer" align="center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <button id="button-cadastrar-cliente" type="button" class="btn btn-success">Cadastrar</button>
                        </div>				          	
                    </div>
                
                </div>
            </div>
        </div>

        <!-- The Modal 2 -->
        <div class="modal" id="modalEditar">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">				      
                    <!-- Modal Header -->
                    <div class=""> 
                        <!-- <div class="row"> -->
                            <div class="modal-header margin-bottom--27">
                                <h4 class="modal-title">Dados do Cliente</h4>		
                                <button type="button" class="close" data-dismiss="modal">&times;</button>  			
                            </div>
                        <!-- </div> -->
                    </div>					        	
                
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h5>Dados Pessoais</h5>
                            </div>	
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 margin-top-10">
                                <label for="input-editar-nome">Nome *</label>
                                <input class="form-control" type="text" id="input-editar-nome" readonly>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 margin-top-10">
                                <label for="input-editar-cpf">CPF *</label>
                                <input class="form-control" type="text" id="input-editar-cpf" readonly>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 margin-top-10">
                                <label for="select-editar-sexo">Sexo *</label>									
                                <select class="form-control" id="select-editar-sexo" disabled>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 margin-top-10">
                                <label for="input-editar-nascimento">Data de Nascimento *</label>
                                <input class="form-control" type="date" id="input-editar-nascimento" readonly>
                            </div>
                        </div>

                        <div class="margin-top-10">
                            <h5>Endereço</h5>
                        </div>	

                        <div class="row">
                            <div class="col-8 col-sm-8 col-md-4 col-lg-3 col-xl-3 margin-top-10">
                                <label for="input-editar-cep">CEP</label>
                                <input class="form-control" onblur="editarVariaveisGlobais(this.value, 'input-editar-rua', 'input-editar-bairro', 'input-editar-cidade', 'select-editar-uf');" type="text" id="input-editar-cep" readonly>
                            </div>
                            <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 margin-top-10">
                                <label for="select-editar-uf">UF *</label>										
                                <select class="form-control" id="select-editar-uf" disabled></select>
                            </div>
                            <div class="col-12 col-sm-12 col-md-5 col-lg-3 col-xl-3 margin-top-10">
                                <label for="input-editar-cidade">Cidade *</label>
                                <input class="form-control" type="text" id="input-editar-cidade" readonly>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 margin-top-10">
                                <label for="input-editar-bairro">Bairro *</label>
                                <input class="form-control" type="text" id="input-editar-bairro" readonly>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-5 col-xl-5 margin-top-10">
                                <label for="input-editar-rua">Rua *</label>
                                <input class="form-control" type="text" id="input-editar-rua" readonly>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2 margin-top-10">
                                <label for="input-editar-numero">Número *</label>
                                <input class="form-control" type="number" id="input-editar-numero" readonly>
                            </div>
                            <div class="col-8 col-sm-8 col-md-8 col-lg-5 col-xl-5 margin-top-10">
                                <label for="input-editar-complemento">Complemento</label>
                                <input class="form-control" type="text" id="input-editar-complemento" readonly>
                            </div>
                        </div>

                        <div class="margin-top-10"><!-- margin-bottom--10 -->
                            <h5>Contatos</h5>
                        </div>	

                        <div id="div-contato" class="row"><!-- margin-top-10 -->
                            <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 margin-top-10">
                                <label for="input-editar-celular">Celular *</label>
                                <input class="form-control" type="text" id="input-editar-celular" readonly>
                            </div>
                            <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8 margin-top-10">
                                <label for="input-editar-email">E-mail *</label>
                                <input class="form-control" type="text" id="input-editar-email" readonly>
                            </div>																					
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer" align="center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <button id="button-habilitar-edicao" onclick="habilitarEdicao();" type="button" class="btn btn-primary">Habilitar Edição</button>
                            <button id="button-salvar-alteracoes" type="button" class="btn btn-success display-none">Salvar</button>
                        </div>				          	
                    </div>
                
                </div>
            </div>
        </div>

        <!-- Modal para alerta-->
        <div class="modal" id="modalAlert">
            <div class="modal-dialog">
                <div class="modal-content">				      
                    <!-- Modal Header -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"> 
                        <div class="modal-header">
                            <p class="modal-title" id="mensagem-alerta-modal"></p>						          		
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    </div>

    <!--Javascript-->
    <script type="text/javascript" src="common/js/model/configuracoes.js"></script> 

    <!--Javascript Buscar CEP-->
    <script type="text/javascript" src="common/js/model/buscarCep.js"></script> 

    <!-- Ajax do Usuário -->
    <script type="text/javascript" src="common/js/model/ajax/ajaxCliente.js"></script>

    <!-- Ajax remover usuário -->
    <script type="text/javascript" src="common/js/model/ajax/ajaxRemoverCliente.js"></script>

    <!-- jQuery -->
    <script src="common/datatable/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="common/datatable/bootstrap_js_file.min.js"></script>

    <!-- DataTables JS -->
    <script src="common/datatable/jquery.dataTables.min.js"></script>
    <script src="common/datatable/dataTables.bootstrap4_js_file.min.js"></script>

    <script>
        inserirEstados("select-cadastro-uf");
        inserirEstados("select-editar-uf");
        inserirMascaraCPF("input-cadastro-cpf");
        inserirMascaraCPF("input-editar-cpf");
        inserirMascaraCEP("input-cadastro-cep");			
        inserirMascaraCEP("input-editar-cep");			
        inserirMascaraCelular("input-cadastro-celular");
        inserirMascaraCelular("input-editar-celular");

        function exibirMensagem(mensagem){
            document.getElementById('mensagem-alerta-modal').innerHTML = mensagem;
            $('#modalAlert').modal('show');	
        }

        function formatarData(data) {
            var partes = data.split('-');
            return partes[2] + '/' + partes[1] + '/' + partes[0];
        }

        $(document).ready(function() {
            var table = $('#agro_bold_data_table').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "language": {
                    "search": "Pesquisar:",
                    "lengthMenu": "Mostrar _MENU_ clientes por página",
                    "zeroRecords": "Nada encontrado - desculpe",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Próximo"
                    }
                }
            });

            function addRow(retorno) {
                retorno.clientes.forEach(function(cliente) {
                    var nascimentoFormatado = formatarData(cliente.dataNascimento);
                    table.row.add([
                        cliente.nome || '',
                        cliente.cpf || '',
                        nascimentoFormatado || '',
                        cliente.sexo === 'M' ? 'Masculino' : 'Feminino' || '',
                        cliente.celular || '',
                        cliente.email || '',
                        `<div class="d-flex justify-content-center">
                            <button class="btn btn-info btn-sm visualizar mx-1" data-id="${cliente.id}" title='Visualizar Cliente'>
                                <svg width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                                    <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0'/>
                                    <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7'/>
                                </svg>
                            </button>
                            <button class="btn btn-danger btn-sm remover mx-1" data-id="${cliente.id}" title='Remover Cliente'>
                                <svg width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                </svg>
                            </button>
                        </div>`
                    ]).draw(false);
                });
            }

            // Função para atualizar uma linha na tabela
            function updateRow(cliente) {
                var $row = $(`#agro_bold_data_table button[data-id='${cliente.id}']`).closest('tr');
                var rowIdx = table.row($row).index();

                if (rowIdx !== undefined && rowIdx !== null) {
                    var nascimentoFormatado = formatarData(cliente.nascimento);

                    // Atualiza os dados da linha
                    table.row(rowIdx).data([
                        cliente.nome || '',
                        cliente.cpf || '',
                        nascimentoFormatado || '',
                        cliente.sexo === 'M' ? 'Masculino' : 'Feminino' || '',
                        cliente.celular || '',
                        cliente.email || '',
                        `<div class="d-flex justify-content-center">
                            <button class="btn btn-info btn-sm visualizar mx-1" data-id="${cliente.id}" title='Visualizar Cliente'>
                                <svg width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                                    <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0'/>
                                    <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7'/>
                                </svg>
                            </button>
                            <button class="btn btn-danger btn-sm remover mx-1" data-id="${cliente.id}" title='Remover Cliente'>
                                <svg width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                </svg>
                            </button>
                        </div>`
                    ]);

                    // Invalida e redesenha a linha
                    table.row(rowIdx).invalidate().draw(false);
                }
            }

            // Faz uma requisição AJAX para inserir um cliente
            function inserirClientePorAjax(){
                // Verifica se os campos estão preenchidos corretamente
                verificarPreenchimento("#input-cadastro-nome");
                verificarPreenchimento("#input-cadastro-cpf");
                verificarPreenchimento("#select-cadastro-sexo");
                verificarPreenchimento("#input-cadastro-nascimento");
                verificarPreenchimento("#select-cadastro-uf");
                verificarPreenchimento("#input-cadastro-cidade");
                verificarPreenchimento("#input-cadastro-bairro");
                verificarPreenchimento("#input-cadastro-rua");
                verificarPreenchimento("#input-cadastro-numero");
                verificarPreenchimento("#input-cadastro-celular");
                verificarPreenchimento("#input-cadastro-email");
                
                //Cliente
                var nome = $("#input-cadastro-nome").val();
                nome = nome.trim();	
                var cpf = $("#input-cadastro-cpf").val();
                var sexo = $("#select-cadastro-sexo option:selected").val();
                var nascimento = document.getElementById("input-cadastro-nascimento").value;

                //Endereço
                var uf = $("#select-cadastro-uf option:selected").val();
                var cidade = $("#input-cadastro-cidade").val();
                cidade = cidade.trim();	
                var bairro = $("#input-cadastro-bairro").val();
                bairro = bairro.trim();
                var rua = $("#input-cadastro-rua").val();
                rua = rua.trim();
                var numero = $("#input-cadastro-numero").val();
                var complemento = $("#input-cadastro-complemento").val();
                complemento = complemento.trim();
                
                //Contato
                var celular = $("#input-cadastro-celular").val();
                var email = $("#input-cadastro-email").val();
                email = email.trim();

                var dados = {
                    nome: nome,
                    cpf: cpf,
                    sexo: sexo,
                    nascimento: nascimento,
                    uf: uf,
                    cidade: cidade,
                    bairro: bairro,
                    rua: rua,
                    numero: numero,
                    complemento: complemento,
                    celular: celular,
                    email: email
                };

                $.ajax({
                    url: 'cliente/inserir',
                    type: 'POST',
                    dataType: 'json',
                    data: dados,
                    success: function(retorno){
                        // oculta o modal de cadastro após o cadastro com sucesso
                        $('#modalCadastro').modal('hide');

                        // Exibe o modal com uma mensagem de retorno
                        exibirMensagem(retorno.msg);

                        // Redefine os valores dos campos input
                        $('#input-cadastro-nome').val('');
                        $("#input-cadastro-cpf").val('');
                        $("#select-cadastro-sexo option:selected").val('M');
                        $("#input-cadastro-nascimento").val('');
                        $("#select-cadastro-uf option:selected").val('AC');
                        $("#input-cadastro-cidade").val('');
                        $("#input-cadastro-bairro").val('');
                        $("#input-cadastro-rua").val('');
                        $("#input-cadastro-numero").val('');
                        $("#input-cadastro-complemento").val('');
                        $("#input-cadastro-celular").val('');
                        $("#input-cadastro-email").val('');
                        $("#input-cadastro-cep").val('');

                        // Formata a data de nascimento
                        var nascimentoFormatado = formatarData(retorno.cliente.nascimento);

                        // Adiciona uma nova linha na tabela com os dados do cliente inserido
                        table.row.add([
                            retorno.cliente.nome || '',
                            retorno.cliente.cpf || '',
                            nascimentoFormatado || '',
                            retorno.cliente.sexo === 'M' ? 'Masculino' : 'Feminino' || '',
                            retorno.cliente.celular || '',
                            retorno.cliente.email || '',
                            `<div class="d-flex justify-content-center">
                                <button class="btn btn-info btn-sm visualizar mx-1" data-id="${retorno.cliente.id}" title='Visualizar Cliente'>
                                    <svg width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                                        <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0'/>
                                        <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7'/>
                                    </svg>
                                </button>
                                <button class="btn btn-danger btn-sm remover mx-1" data-id="${retorno.cliente.id}" title='Remover Cliente'>
                                    <svg width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                        <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                    </svg>
                                </button>
                            </div>`
                        ]).draw(false);
                    },
                    error: function(retorno){
                        // oculta o modal de cadastro após o cadastro com sucesso
                        $('#modalCadastro').modal('hide');

                        // Exibe o modal com uma mensagem de retorno
                        exibirMensagem(retorno.responseJSON.msg);
                    }
                });
            }

            // Remove todas as funções do botão para que nada fique duplicado
            $('#button-cadastrar-cliente').off('click');

            // Vincula a função de inserir cliente ao botão
            $('#button-cadastrar-cliente').on('click', function() {
                inserirClientePorAjax();
            });

            // Função para visualizar cliente por AJAX
            function visualizarClientePorAjax(idCliente) {
                $.ajax({
                    url: `cliente/visualizar/${idCliente}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(retorno) {
                        // Atribui os dados do cliente aos seus respectivos campos
                        $('#input-editar-nome').val(retorno.cliente.nome);
                        $('#input-editar-cpf').val(retorno.cliente.cpf);
                        $('#select-editar-sexo').val(retorno.cliente.sexo);
                        $('#input-editar-nascimento').val(retorno.cliente.dataNascimento);
                        $('#select-editar-uf').val(retorno.cliente.uf);
                        $('#input-editar-cidade').val(retorno.cliente.cidade);
                        $('#input-editar-bairro').val(retorno.cliente.bairro);
                        $('#input-editar-rua').val(retorno.cliente.rua);
                        $('#input-editar-numero').val(retorno.cliente.numero);
                        $('#input-editar-complemento').val(retorno.cliente.complemento);
                        $('#input-editar-celular').val(retorno.cliente.celular);
                        $('#input-editar-email').val(retorno.cliente.email);
                        $('#input-editar-cep').val(retorno.cliente.cep);

                        // Remove todas as funções do botão para que nada fique duplicado
                        $('#button-salvar-alteracoes').off('click');

                        // Vincula a função de edição ao botão de salvar
                        $('#button-salvar-alteracoes').on('click', function() {
                            editarClientePorAjax(idCliente);
                        });

                        $('#modalEditar').modal('show');
                    },
                    error: function(retorno) {
                        $('#modalCadastro').modal('hide');
                        exibirMensagem(retorno.responseJSON.msg);
                    }
                });
            }

            // Função para editar cliente por AJAX
            function editarClientePorAjax(idCliente) {
                var clienteEditado = {
                    id: idCliente,
                    nome: $('#input-editar-nome').val(),
                    cpf: $('#input-editar-cpf').val(),
                    nascimento: $('#input-editar-nascimento').val(),
                    sexo: $('#select-editar-sexo').val(),
                    celular: $('#input-editar-celular').val(),
                    email: $('#input-editar-email').val(),
                };

                // Verifica se os campos estão preenchidos corretamente
                verificarPreenchimento("#input-editar-nome");
                verificarPreenchimento("#input-editar-cpf");
                verificarPreenchimento("#select-editar-sexo");
                verificarPreenchimento("#input-editar-nascimento");
                verificarPreenchimento("#select-editar-uf");
                verificarPreenchimento("#input-editar-cidade");
                verificarPreenchimento("#input-editar-bairro");
                verificarPreenchimento("#input-editar-rua");
                verificarPreenchimento("#input-editar-numero");
                verificarPreenchimento("#input-editar-celular");
                verificarPreenchimento("#input-editar-email");
                
                //Cliente
                var nome = $("#input-editar-nome").val();
                nome = nome.trim();	
                var cpf = $("#input-editar-cpf").val();
                var sexo = $("#select-editar-sexo option:selected").val();
                var nascimento = document.getElementById("input-editar-nascimento").value;

                //Endereço
                var uf = $("#select-editar-uf option:selected").val();
                var cidade = $("#input-editar-cidade").val();
                cidade = cidade.trim();	
                var bairro = $("#input-editar-bairro").val();
                bairro = bairro.trim();
                var rua = $("#input-editar-rua").val();
                rua = rua.trim();
                var numero = $("#input-editar-numero").val();
                var complemento = $("#input-editar-complemento").val();
                complemento = complemento.trim();
                
                //Contato
                var celular = $("#input-editar-celular").val();
                var email = $("#input-editar-email").val();
                email = email.trim();

                var dados = {
                    nome: nome,
                    cpf: cpf,
                    sexo: sexo,
                    nascimento: nascimento,
                    uf: uf,
                    cidade: cidade,
                    bairro: bairro,
                    rua: rua,
                    numero: numero,
                    complemento: complemento,
                    celular: celular,
                    email: email
                };

                $.ajax({
                    url: `cliente/editar/${idCliente}`,
                    type: 'PUT',
                    dataType: 'json',
                    data: dados,
                    success: function(retorno){
                        $('#modalEditar').modal('hide');
                        exibirMensagem(retorno.msg);
                        $('#input-editar-nome').val('');
                        $("#input-editar-cpf").val('');
                        $("#select-editar-sexo option:selected").val('M');
                        $("#input-editar-nascimento").val('');
                        $("#select-editar-uf option:selected").val('AC');
                        $("#input-editar-cidade").val('');
                        $("#input-editar-bairro").val('');
                        $("#input-editar-rua").val('');
                        $("#input-editar-numero").val('');
                        $("#input-editar-complemento").val('');
                        $("#input-editar-celular").val('');
                        $("#input-editar-email").val('');
                        $("#input-editar-cep").val('');

                        // Atualiza a linha do data table
                        updateRow(retorno.cliente);
                    },
                    error: function(retorno){
                        $('#modalEditar').modal('hide');
                        exibirMensagem(retorno.responseJSON.msg);
                    }
                });
            }

            // Evento de clique no botão de visualizar cliente
            $('#agro_bold_data_table').on('click', '.visualizar', function() {
                // Recupera o id passado em data para passar pra função
                var id = $(this).data('id');

                // Chama o método que fará a consulta no banco para visualizar
                // o cliente
                visualizarClientePorAjax(id);
            });

            // Evento de clique no botão de remover cliente
            $('#agro_bold_data_table').on('click', '.remover', function() {
                // Recupera o id passado em data para passar pra função
                var id = $(this).data('id');

                // Remove o cliente no banco de dados
                removerClientePorAjax(id);

                // Remover a linha da tabela
                var row = table.row($(this).parents('tr'));
                row.remove().draw(false);
            });

            // Faz uma requisição AJAX a fim de listar todos os clientes da plataforma
            $.ajax({
                url: 'listar',
                type: 'GET',
                dataType: 'json',
                success: function(retorno) {
                    addRow(retorno);
                },
                error: function(retorno) {
                    $('#modalEditar').modal('hide');
                    exibirMensagem(retorno.responseJSON.msg);
                }
            });
        });
    </script>
</body>
</html>