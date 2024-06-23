// Altera as regras de exibição para que seja possível editar um cliente
function habilitarEdicao(){
	// Edita os campos input de forma que o usuário possa escrever neles
	$('#input-editar-nome').removeAttr('readonly');
	$('#input-editar-cpf').removeAttr('readonly');
	$('#select-editar-sexo').removeAttr('disabled');
	$('#input-editar-nascimento').removeAttr('readonly');
	$('#select-editar-uf').removeAttr('disabled');
	$('#input-editar-cidade').removeAttr('readonly');
	$('#input-editar-bairro').removeAttr('readonly');
	$('#input-editar-rua').removeAttr('readonly');
	$('#input-editar-numero').removeAttr('readonly');
	$('#input-editar-complemento').removeAttr('readonly');
	$('#input-editar-celular').removeAttr('readonly');
	$('#input-editar-email').removeAttr('readonly');
	$('#input-editar-cep').removeAttr('readonly');

	// Tira a visualização do botão de habilitar edição
	$('#button-habilitar-edicao').addClass('display-none');

	// Adiciona a visualização ao botão para salvar alterações no cliente
	$('#button-salvar-alteracoes').removeClass('display-none');
}