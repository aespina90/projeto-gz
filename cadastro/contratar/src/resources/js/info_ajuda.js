/**
Criado por: Jonathan Sansalone
Data: 13/04/2018
Este arquivo contém funções que exibem uma caixa com instruções sobre como utilizar uma página web.
*/

// Cadastro de Supervisor
// ===========================================
function ajuda_listagem_supervisor(){
	_notify_ajuda(
		'Cadastro de Supervisores', 
		'Clique em \'Novo\' para cadastrar um novo supervisor.\
		\nPara alterar ou remover um supervisor, passe o mouse sobre a listagem e o botão \'Ações\' aparecerá para cada linha'
	);
}
function ajuda_cadastro_supervisor(){
	_notify_ajuda(
		'Cadastro de Supervisores',
		'Preencha os campos para cadastrar ou alterar um supervisor.\n\
		Clique em \'Salvar\' para confirmar as alterações realizadas e voltar para a listagem de supervisores.\n\
		Ao clicar em \'Voltar\', as alterações serão ignoradas e você será levado para a listagem de supervisores.'
	);
}
// ============================================

//Cadastro de Operador
//===========================================
function ajuda_listagem_operador(){
	_notify_ajuda(
		'Cadastro de Operadores', 
		'Clique em \'Novo\' para cadastrar um novo operador.\
		\nPara alterar ou remover um operador, passe o mouse sobre a listagem e o botão \'Ações\' aparecerá para cada linha'
	);
}
function ajuda_cadastro_operador(){
	_notify_ajuda(
		'Cadastro de Operadores',
		'Preencha os campos para cadastrar ou alterar um operador.\n\
		Clique em \'Salvar\' para confirmar as alterações realizadas e voltar para a listagem de operadores.\n\
		Ao clicar em \'Voltar\', as alterações serão ignoradas e você será levado para a listagem de operadores.'
	);
}
//============================================

//Cadastro de Finalizador
//===========================================
function ajuda_listagem_finalizador(){
	_notify_ajuda(
		'Cadastro de Formas de Pagamento', 
		'Clique em \'Novo\' para cadastrar uma nova forma de pagamento.\
		\nPara alterar ou remover uma forma de pagamento, passe o mouse sobre a listagem e o botão \'Ações\' aparecerá para cada linha'
	);
}
function ajuda_cadastro_finalizador(){
	_notify_ajuda(
		'Cadastro de Formas de Pagamento',
		'Preencha os campos para cadastrar ou alterar uma forma de pagamento.\n\
		Clique em \'Salvar\' para confirmar as alterações realizadas e voltar para a listagem de formas de pagamento.\n\
		Ao clicar em \'Voltar\', as alterações serão ignoradas e você será levado para a listagem de formas de pagamento.\n\
		Ao escolher o modelo \'CARTÃO\', é necessário escolher o modo de pagamento com cartão: Crédito (à vista ou parcelado), Débito ou Refeição.\n\
		O campo \'Máximo de parcelas\' diz respeito à quantidade máxima de parcelas que esta forma de pagamento pode aceitar.\n\
		Válido somente para os modos de pagamento com cartão parcelados.'
	);
}
//============================================

//Cadastro de Produto
//===========================================
function ajuda_listagem_produto(){
	_notify_ajuda(
		'Cadastro de Produtos', 
		'Clique em \'Novo\' para cadastrar um novo produto.\
		\nPara alterar ou remover um produto, passe o mouse sobre a listagem e o botão \'Ações\' aparecerá para cada linha.\n\
		O campo para pesquisa permite a digitação parcial do código de produto ou descrição. Tecle \'ENTER\' no campo ou clique no botão \
		\'Pesquisar\' para efetuar a busca.\n\
		São mostrados somente os primeiros 1000 produtos de acordo com a pesquisa.'
	);
}
function ajuda_cadastro_produto(){
	_notify_ajuda(
		'Cadastro de Produtos',
		'Preencha os campos para cadastrar ou alterar um produto.\n\
		Clique em \'Salvar\' para confirmar as alterações realizadas e voltar para a listagem de produtos.\n\
		Ao clicar em \'Voltar\', as alterações serão ignoradas e você será levado para a listagem de produtos.\n\
		Os campos \'Código do produto\' e \'Código de barras\' possuem um tamanho máximo de até 14 dígitos e \
		também podem ser informados utilizando um leitor USB.\n'
	);
}
//============================================

//Cadastro de Empresa
//===========================================
function ajuda_listagem_empresa(){
	_notify_ajuda(
		'Cadastro de Empresa', 
		'Clique em \'Novo\' para cadastrar uma nova empresa.\
		\nPara alterar ou remover uma empresa, passe o mouse sobre a listagem e o botão \'Ações\' aparecerá para cada linha'
	);
}
function ajuda_cadastro_empresa(){
	_notify_ajuda(
		'Cadastro de Empresa',
		'Preencha os campos para alterar as informações de sua empresa.\n\
		Clique em \'Salvar\' para confirmar as alterações realizadas e voltar para a página inicial.\n\
		Ao clicar em \'Voltar\', as alterações serão ignoradas e você será levado para a página inicial.'
	);
}
//============================================

//Cadastro de Caixa
//===========================================
function ajuda_listagem_caixa(){
	_notify_ajuda(
		'Cadastro de Terminais', 
		'Clique em \'Novo\' para cadastrar um novo terminal.\
		\nPara alterar ou remover um terminal, passe o mouse sobre a listagem e o botão \'Ações\' aparecerá para cada linha'
	);
}
function ajuda_cadastro_caixa(){
	_notify_ajuda(
		'Cadastro de Terminais',
		'Preencha os campos para cadastrar ou alterar um terminal.\n\
		Clique em \'Salvar\' para confirmar as alterações realizadas e voltar para a listagem de terminal.\n\
		Ao clicar em \'Voltar\', as alterações serão ignoradas e você será levado para a listagem de terminal.\n\
		O campo \'Número de série\' pode ser obtido nas configurações do seu terminal.'
	);
}
//============================================

//Cadastro de Caixa
//===========================================
function ajuda_comunicacao_terminal(){
	_notify_ajuda(
		'Comunicação com Terminais', 
		'Faça a leitura do QR Code nas configurações do FlexPdv Mobile em seu terminal.'
	);
}
//============================================


function _notify_ajuda(title, text){
	$.pnotify({ 
		type: 'info',
		title: title, 
		text: text 
	});
}
