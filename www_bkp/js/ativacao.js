function onLoad(){
	if(window.location.href.indexOf('ativacao=sucesso') > 0){		
		bootbox.alert({ 
			  size: "small",
			  title: "Conta ativada!",
			  message: "Sua conta foi ativada com sucesso!", 
			  callback: function(){
				  window.location = "index.jsf"; 
			  }
		});
	}else if(window.location.href.indexOf('ativacao=erro') > 0){		
		bootbox.alert({ 
			  size: "small",
			  title: "Erro!",
			  message: "Não foi possível ativar sua conta! Entre em contato com o suporte técnico.", 
			  callback: function(){
				   
			  }
		});
	}
	
	//document.getElementByClassName("btn-Ativar").disabled = true;
	$('.btn-Ativar').attr('disabled', 'disabled');
}
	
function HabiDsabi(){	
	if(document.getElementById('ckb-termos').checked){
		$('.btn-Ativar').removeAttr('disabled');
	} else {	
		$('.btn-Ativar').attr('disabled', 'disabled');
	}
}
