$(document).ready(function(){
	atualizar();
});

function atualizar(){
	$("#txt-cod").mask("999999999",{placeholder:"Código da Empresa"});
	$("#txt-cnae").mask("9999-9/99",{placeholder:"CNAE PRINCIPAL"});
	$("#txt-cnpj").mask("99.999.999/9999-99",{placeholder:"CNPJ"});
	$("#txt-tel").mask("(99)99999-9999",{placeholder:"TELEFONE"});
	$("#txt-tel-2").mask("(99)99999-9999",{placeholder:"TELEFONE 2"});
	$("#txt-celular").mask("(99)99999-9999",{placeholder:"CELULAR"});
	$("#txt-cep").mask("99999-999",{placeholder:"CEP"});	
	$("#txt-complemento").mask("9?9999",{placeholder:"COMPLEMENTO"});
}

function showProgress(data) {
    
    var ajaxStatus = data.status; 
        
    switch (ajaxStatus) {
        case "begin": 
        	toastInfo("Aguarde...");
            break;  
        case "complete": 
        	toastr.clear();        	
        	break;
    }
}

jsf.ajax.addOnEvent(showProgress);

