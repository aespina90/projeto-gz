function abreAjax(url,destino){
	var http_request = false;
	if(window.XMLHttpRequest){
		http_request = new XMLHttpRequest();
		if(http_request.overrideMimeType){
			http_request.overrideMimeType('text/xml');
		}
	}
	else if(window.ActiveXObject){
		try{
			http_request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e){
			try{
				http_request = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){}
		}
	}
	if(!http_request){
		alert('O seu browser não suporta AJAX!');
		return false;
	}
	http_request.onreadystatechange = function(){ conteudoPagina(http_request,destino); };
	http_request.open('GET', url, true);
	http_request.send(null);
}
function conteudoPagina(http_request,destino){
	if(http_request.readyState == 1){ /*document.getElementById(destino).innerHTML = "<center><img alt='Carregando' title='Carregando' src='imagens/load.gif' /></center>";*/ }
	if(http_request.readyState == 4){
		if(http_request.status == 200){
			var resultado = http_request.responseText;
			resultado = resultado.replace(/\+/g," ");
			resultado = unescape(resultado);
			document.getElementById(destino).innerHTML = resultado;
			extraiScript(resultado);
		}
		else{
			alert('Houve um problema de conexão no servidor. Por favor tente novamente mais tarde.');
		}
	}
}
function extraiScript(texto){
    var ini = 0;
    while(ini!=-1){
        ini = texto.indexOf('<script', ini);
        if(ini >=0){
            ini = texto.indexOf('>', ini) + 1;
            var fim = texto.indexOf('</script>', ini);
            codigo = texto.substring(ini,fim);
            eval(codigo);
        }
    }
}