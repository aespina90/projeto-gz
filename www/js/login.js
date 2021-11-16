/*
	Login.JS - Precisa de verificação caso seja primeiro acesso.
	Último update: 12/04/2017
*/

/*
 * DECLARAÇÃO DE FUNÇÕES
 */
function emailDefinido() {
    return $("#txt-email").val();
}
function login() {	
  toastInfoNoHide("Realizando login... Aguarde!");
}

function onLoad(){
	if(getUrlVars() == "erro"){		
		abrePainel();
		toastError("Usuário ou senha estão incorretos!");	
	}else if(getUrlVars() == "redefsenha"){
		bootbox.alert({ 
		  size: "small",
		  title: "Senha redefinida!",
		  message: "Sua senha foi redefinida com sucesso!", 
		  callback: function(){}
		});
	}
}

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');    
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];	
    }
    var erro = vars[1];
    return erro;    
}


function abrePainel() {
	bootbox.alert({ 
		  size: "small",
		  title: "Login inválido!",
		  message: "Usuário ou senha estão incorretos!", 
		  callback: function(){}
		});
}
/*
 * FIM DA DECLARAÇÃO DE FUNÇÕES
 */

/*
 * COMANDOS EXECUTADOS AO CARREGAR O SCRIPT
 */
$("#btn-login").click(function (e) {
    login();
});

$("#btn-novo").click(function (e) {
	window.location.replace("ativar.jsf");
});



