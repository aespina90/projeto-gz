/*
	Login.JS - Precisa de verificação caso seja primeiro acesso.
	Último update: 12/04/2017
*/

function onLoad(){
	if(getUrlVars() == "enviado"){		
		bootbox.alert({ 
		  size: "small",
		  title: "E-mail enviado!",
		  message: "Um e-mail com o link de recuperação foi enviado!", 
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
