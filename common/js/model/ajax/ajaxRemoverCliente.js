function removerClientePorAjax(idCliente){
	$.ajax({
		url: `cliente/remover/${idCliente}`,
		type: 'DELETE',
        dataType: 'json',
		success: function(retorno){
			exibirMensagem(retorno.msg);
			return retorno;
		},
		error: function(){
			exibirMensagem("Houve algum erro!");
		}
	});				
}