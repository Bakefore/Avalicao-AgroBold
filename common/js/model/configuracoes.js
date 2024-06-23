// Controla a exibição do menu dropdown
var menuDropdown = false;

// Array com todos os estados do Brasil em ordem alfabética
var ufArray = ["AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", 
	"MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RS", "RO", "RR", "SC", "SP", "SE", "TO"];

// Insere os estados com suas opções num campo select
function inserirEstados(idSelect){
	for (var i = 0; i < ufArray.length; i++) {
		var option = document.createElement('option');
		option.text = ufArray[i];
		option.value = ufArray[i];
		document.getElementById(idSelect).appendChild(option);
	}
}

// Verifica se o campo está preenchido, removendo os espaços do início
// e do final para que não seja passado um valor vazio
function verificarPreenchimento(id){
	campo = $(id).val(); 
	if(campo.trim() == ""){
		$(id).css({"border-color": "red"});	
	}
	else{
		$(id).css({"border-color": ""});
	}
}

// Faz a inserção de uma de CPF no campo input
function inserirMascaraCPF(id){
	document.getElementById(id).addEventListener('input', function (e) {
		var aux = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
		e.target.value = aux[1] + (aux[2]? '.' + aux[2] : '') + (aux[3]? '.' + aux[3] : '') 
		+ (aux[4]? '-' + aux[4] : '');
	});
}

// Faz a inserção de uma máscara para celular no campo input
function inserirMascaraCelular(id){
	document.getElementById(id).addEventListener('input', function (e) {
		var aux = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,1})(\d{0,4})(\d{0,4})/);
		e.target.value = (aux[1]? '(' + aux[1] + ') ' : '') + aux[2] + (aux[3]? '.' + aux[3] : '') 
		+ (aux[4]? '-' + aux[4] : '');
	});
}

// Faz a inserção de uma máscara de CEP no campo input
function inserirMascaraCEP(id){
	document.getElementById(id).addEventListener('input', function (e) {
		var aux = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})/);
		e.target.value = (aux[1]? aux[1] : '') + (aux[2]? '.' + aux[2] : '') + (aux[3]? '-' + aux[3] : '');
	});
}

// Muda as regras de exibição para que a edição não seja possível
function desabilitarEdicao(){
	// Edita os campos input de forma que o usuário não possa escrever neles
	$('#input-editar-nome').attr('readonly', true);
	$('#input-editar-cpf').attr('readonly', true);
	$('#select-editar-sexo').attr('disabled', true);
	$('#input-editar-nascimento').attr('readonly', true);
	$('#select-editar-uf').attr('disabled', true);
	$('#input-editar-cidade').attr('readonly', true);
	$('#input-editar-bairro').attr('readonly', true);
	$('#input-editar-rua').attr('readonly', true);
	$('#input-editar-numero').attr('readonly', true);
	$('#input-editar-complemento').attr('readonly', true);
	$('#input-editar-celular').attr('readonly', true);
	$('#input-editar-email').attr('readonly', true);
	$('#input-editar-cep').attr('readonly', true);

	// Adiciona a visualização do botão de habilitar edição
	$('#button-habilitar-edicao').removeClass('display-none');

	// Remove a visualização ao botão para salvar alterações no cliente
	$('#button-salvar-alteracoes').addClass('display-none');
}
