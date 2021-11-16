// Retorna apenas numeros
function js_campo_numerico ( x , y , evtKeyPress )
{
	// Inicializa a variavel
	var nTecla = 0;
	// Verifica plataforma
	if (document.all)
	{
		// Plataformas tipo IE
		nTecla = evtKeyPress.keyCode ;
	}
	else
	{
		// Plataformas tipo NETSCAPE
		nTecla = evtKeyPress.which ;
	}
	// Verifica tecla pressionada
	if ((( nTecla > 47 ) && ( nTecla < 58 ))  // numerico (0123456789)
		 || ( nTecla == 8   )   // backspace
		 || ( nTecla == 127 )   // delete
		 || ( nTecla == 0   )   // teclas nao definidas
		 || ( nTecla == 9   )   // tabulacao
		 || ( nTecla == 13  )   // enter
		 //|| ( nTecla == 46  )  // . (ponto)
		 //|| ( nTecla == 45  ) // - (traço)
		 || ( nTecla == 44  ))  // , (virgula)
		 
	{
		// Digita a tecla pressionada
		return true;
	}
	else
	{
		// Ignora a tecla pressionada
		return false;
	}
}

// Validação de CNPJ
function fun_gera_verificacao_cnpj(CNPJ)
{
	erro = new String;
	if (CNPJ.length < 18) erro += "É necessarios preencher corretamente o numero do CNPJ! \n\n";
	
	if ((CNPJ.charAt(2) != ".") || (CNPJ.charAt(6) != ".") || (CNPJ.charAt(10) != "/") || (CNPJ.charAt(15) != "-"))
	{
		if (erro.length == 0) erro += "É necessarios preencher corretamente o numero do CNPJ! \n\n";
	}
	//substituir os caracteres que nao sao numeros
	if(document.layers && parseInt(navigator.appVersion) == 4)
	{
		x = CNPJ.substring(0,2);
		x += CNPJ.substring(3,6);
		x += CNPJ.substring(7,10);
		x += CNPJ.substring(11,15);
		x += CNPJ.substring(16,18);
		CNPJ = x;
	}
	else
	{
		CNPJ = CNPJ.replace(".","");
		CNPJ = CNPJ.replace(".","");
		CNPJ = CNPJ.replace("-","");
		CNPJ = CNPJ.replace("/","");
	}
	
	if( (CNPJ == '11111111111111') || (CNPJ == '22222222222222') || (CNPJ == '33333333333333') || (CNPJ == '44444444444444') ||
		(CNPJ == '55555555555555') || (CNPJ == '66666666666666') || (CNPJ == '77777777777777') || (CNPJ == '88888888888888') ||
		(CNPJ == '99999999999999') || (CNPJ == '00000000000000') )
	{
		  document.getElementById('cnpj_erro').style.display = '';
		  document.getElementById('cnpj_ok').style.display = 'none';
		  document.getElementById('cnpj').className = 'formularioinput_erro';
		  return false;				  
	}
	else
	{
		var nonNumbers = /\D/;
		if (nonNumbers.test(CNPJ)) erro += "A verificacao de CNPJ suporta apenas numeros! \n\n";
		var a = [];
		var b = new Number;
		var c = [6,5,4,3,2,9,8,7,6,5,4,3,2];
		
		for (i=0; i<12; i++)
		{
			a[i] = CNPJ.charAt(i);
			b += a[i] * c[i+1];
		}
		if ((x = b % 11) < 2) { a[12] = 0 } else { a[12] = 11-x }
		b = 0;
		
		for (y=0; y<13; y++)
		{
			b += (a[y] * c[y]);
		}
		if ((x = b % 11) < 2) { a[13] = 0; } else { a[13] = 11-x; }
		
		if ((CNPJ.charAt(12) != a[12]) || (CNPJ.charAt(13) != a[13]))
		{
			erro +="Digito verificador com problema!";
		}
		if (erro.length > 0)
		{
		    document.getElementById('cnpj_erro').style.display = '';
		    document.getElementById('cnpj_ok').style.display = 'none';
		    document.getElementById('cnpj').className = 'formularioinput_erro';
			return false;
		}
		else
		{
			document.getElementById('cnpj_erro').style.display = 'none';
			document.getElementById('cnpj_ok').style.display = '';
			document.getElementById('cnpj').className = 'formularioinput';
		}
		return true;
	}
}

function fVerificaCPF(campo) {
	var CPF = campo.value; // Recebe o valor digitado no campo
	CPF = CPF.replace("-", "");
	CPF = CPF.replace(".", "");
	CPF = CPF.replace(".", "");
	
	if( (CPF == '11111111111') || (CPF == '22222222222') || (CPF == '33333333333') || (CPF == '44444444444') ||
  		(CPF == '55555555555') || (CPF == '66666666666') || (CPF == '77777777777') || (CPF == '88888888888') ||
   		(CPF == '99999999999') || (CPF == '00000000000') )
	{
		  document.getElementById('cpf_erro').style.display = '';
		  document.getElementById('cpf_ok').style.display = 'none';
		  document.getElementById('cpf').className = 'formularioinput_erro';
		  return false;				  
	}
	else
	{
		
		// Aqui começa a checagem do CPF
		var posicao, i, soma, dv, dv_informado;
		var digito = new Array(10);
		dv_informado = CPF.substr(9, 2); // Retira os dois últimos dígitos do número informado
		
		// Desemembra o número do CPF na array DIGITO
		for (i=0; i<=8; i++) {
		  digito[i] = CPF.substr( i, 1);
		}
		
		// Calcula o valor do 10º dígito da verificação
		posicao = 10;
		soma = 0;
		   for (i=0; i<=8; i++) {
			  soma = soma + digito[i] * posicao;
			  posicao = posicao - 1;
		   }
		digito[9] = soma % 11;
		   if (digito[9] < 2) {
				digito[9] = 0;
		}
		   else{
			   digito[9] = 11 - digito[9];
		}
		
		// Calcula o valor do 11º dígito da verificação
		posicao = 11;
		soma = 0;
		   for (i=0; i<=9; i++) {
			  soma = soma + digito[i] * posicao;
			  posicao = posicao - 1;
		   }
		digito[10] = soma % 11;
		   if (digito[10] < 2) {
				digito[10] = 0;
		   }
		   else {
				digito[10] = 11 - digito[10];
		   }
		
		// Verifica se os valores dos dígitos verificadores conferem
		dv = digito[9] * 10 + digito[10];
		   if (CPF.length > 0)
		   {
			   if (dv != dv_informado)  
			   {
				  document.getElementById('cpf_erro').style.display = '';
				  document.getElementById('cpf_ok').style.display = 'none';
				  document.getElementById('cpf').className = 'formularioinput_erro';
				  return false;
			   }
			   else
			   {
				  document.getElementById('cpf_erro').style.display = 'none';
				  document.getElementById('cpf_ok').style.display = '';
				  document.getElementById('cpf').className = 'formularioinput';
				  return false;
			   }
			}
			else
			{
				document.getElementById('cpf_erro').style.display = 'none' ;
				document.getElementById('cpf_ok').style.display = 'none' ;
				document.getElementById('cpf').className = 'formularioinput';
			}
		}
}

/////////////////////////////////////////////////////////////////////////////////////////////////	
/**
* @author Tiago Carvalho projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Script para ocultar/mostrar qualquer objeto
*/
 
function jMostraOculta_Objeto ( campo , acao )
{
	if ( acao == 'onBlur' ) 
	{
		document.getElementById(campo).style.display='none';
	}
	else if ( acao = 'onFocus' ) 
	{
		document.getElementById(campo).style.display='';
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////////
/**
* @author Maikel Finck projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Script para usuário digitar apenas números
*/

function jCampoNumerico ( x , y , evtKeyPress )
{
// Inicializa a variavel
var nTecla = 0;
// Verifica plataforma
if (document.all)
{
// Plataformas tipo IE
nTecla = evtKeyPress.keyCode ;
}
else
{
// Plataformas tipo NETSCAPE
nTecla = evtKeyPress.which ;
}
// Verifica tecla pressionada
if ((( nTecla > 47 ) && ( nTecla < 58 ))  // numerico (0123456789)
|| ( nTecla == 8   )   // backspace
|| ( nTecla == 127 )   // delete
|| ( nTecla == 0   )   // teclas nao definidas
//|| ( nTecla == 9   )   // tabulacao
|| ( nTecla == 13  )   // enter
//|| ( nTecla == 44  )   // , (vírgula)
//|| ( nTecla == 46  ))  // . (ponto)
)
{
// Digita a tecla pressionada
return true;
}
else
{
// Ignora a tecla pressionada
return false;
}
}


/***********************************************************************
FUNÇÃO PRINCIPAL DA MASCARA
-------------------------------------------------------------------
Função: fnMascara
Dados de Entrada: objeto (nome do campo no formulário), evt (evento do campo), mask(O Formato de mascara que deseja)
Dados de Saída:
Processamento: Enquanto o usuario for digitando automaticamente ele ja 
vai colocando os pontos(se necessario), barras(se necessario), traço(se necessario) e entre outros.
Uso no formulário: onkeypress="return fnMascara(this, event,'#####-###');"
Lembrando que #####-### é o formato da mascara que você quer, no caso é a de CEP

Responsavél: Marcelo Abib Cardoso
Data: 17/08/2006
************************************************************************/
function fnMascara(objeto, evt, mask)
{ 
	var LetrasU = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	var LetrasL = 'abcdefghijklmnopqrstuvwxyz';
	var Letras  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';	
	var Numeros = '0123456789';
	var Fixos  = '().-:/ ';
	var Charset = " !\"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_/`abcdefghijklmnopqrstuvwxyz{|}~";

	evt = (evt) ? evt : (window.event) ? window.event : "";
	var value = objeto.value;
	if (evt) {
 	var ntecla = (evt.which) ? evt.which : evt.keyCode;
 	tecla = Charset.substr(ntecla - 32, 1);
 	if (ntecla < 32) return true;

 	var tamanho = value.length;
 	if (tamanho >= mask.length) return false;

 	var pos = mask.substr(tamanho,1);
 	while (Fixos.indexOf(pos) != -1)
	 	{
 	 		value += pos;
 	 		tamanho = value.length;
 	 		if (tamanho >= mask.length) return false;
 	 		pos = mask.substr(tamanho,1);
		}

 	switch (pos) 
		{
   			case '#' : if (Numeros.indexOf(tecla) == -1) return false; break;
   			case 'A' : if (LetrasU.indexOf(tecla) == -1) return false; break;
   			case 'a' : if (LetrasL.indexOf(tecla) == -1) return false; break;
   			case 'Z' : if (Letras.indexOf(tecla) == -1) return false; break;
   			case '*' : objeto.value = value; return true; break;
   			default : return false; break;
 		}
	}
	objeto.value = value;
	return true;
}
// Função para abrir um Pop-up
function jPopUp(jURL, jDestino, jW, jH, jScroll,jResize)
	{
		var myWin = window.open(jURL,jDestino,'width='+jW+',height='+jH+',scrollbars='+jScroll+',toolbar=no,location=no,status=yes,menubar=no,resizable='+jResize+',left=0,top=0')
		myWin.focus();
	}

/////////////////////////////////////////////////////////////////////////////////////////////////
/**
* @author Tiago de Carvalho projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Montagem de Combo Box dinâmica com AJAX
*/
	function pesquisar_dados( valor , pagina , campo , selecionado )
	{
	
		extensao = 1 ;

		for ( cont_string = 0 ; cont_string < pagina.length ; cont_string ++ )
		{
			if ( pagina.charAt(cont_string) == '.' )
			{
				extensao = 0 ;
			}
		}
		
		if ( extensao != 0 )
		{
			pagina = pagina + '.php?' ;
		}
		
		else
		{
			pagina = pagina + '&' ;
		}
		http.open( "GET", pagina + "id=" + valor , true ); 
		http.onreadystatechange = function()
        {
            // chama a função que colocará o conteúdo
            handleHttpResponse(campo , selecionado);
        };
		
		http.send(null);
	}

/////////////////////////////////////////////////////////////////////////////////////////////////
/**
* @author Tiago de Carvalho projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Essa função tem a finalidade de "pegar" o resultado da página processada, 
             e apresentar no seu defido lugar. Poderiamos jogar em um textarea, uma <div>, 
			 um <p>, ou até mesmo um alert.
*/		
	function handleHttpResponse( campo , selecionado )
	{
		campo_select = document.getElementById(campo);
		if (http.readyState == 4) 
		{
	  		campo_select.options.length = 0;
		    results = http.responseText.split(",");
		    for( i = 0; i < results.length; i++ )
		    {
			
	    		string = results[i].split( "|" );

				// checa se o texto não está vazio...
				if ( string[0] != '' )
				{

					campo_select.options[i] = new Option( string[0], string[1] ) ;

					// checa se a opção é a selecionada...
					if ( selecionado == string[1] )
					{
						// se for, coloca ela como selecionada
						campo_select.options[i].selected = true ;
					}
					
				}
				
				// verifica se o selecionado está vazio
				if ( selecionado == '' )
				{
					// se estiver, coloca o 1o item como selecionado.
					campo_select.options[0].selected = true ;
				}
	  		}
		}
	}
/////////////////////////////////////////////////////////////////////////////////////////////////
/**
* @author Tiago de Carvalho projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Identificação do Navegador e Suporte ao XMLHttpRequest.
*/
function getHTTPObject() 
{
		if(typeof ActiveXObject == "undefined" && typeof XMLHttpRequest == "undefined") return null;
		var xmlhttp;
		/*@cc_on
		@if (@_jscript_version >= 5) {
		try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
		try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
		xmlhttp = false;
		}
		}
		}
		@else xmlhttp = null;
		@end @*/

		if (xmlhttp == null && typeof XMLHttpRequest != 'undefined') {
		try {
		xmlhttp = new XMLHttpRequest();
		} catch (e) {
		xmlhttp = null;
		}
		}
		return xmlhttp; 		
	
}
	
	var http = getHTTPObject();
	
////////////////////////////////////////////////////////////////////////////////////////////////

//*** Código base do Ajax
function abreAjax(url, div)
{

	var http_request = false;

	// Mozilla, Safari,...
	if (window.XMLHttpRequest)
	{
	   http_request = new XMLHttpRequest();
		if (http_request.overrideMimeType)
		{
			http_request.overrideMimeType('text/xml');
		}
	}
	// IE
	else if(window.ActiveXObject)
	{
		try{
			http_request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				http_request = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}

	// se conectar, executa...
	http_request.onreadystatechange = function()
	{
		// chama a função que colocará o conteúdo
		conteudoPagina(http_request , div);
	};

	// define método como GET
	http_request.open('GET', url, true);

	http_request.setRequestHeader('Content-Type',"application/x-www-form-urlencoded; charset=iso-8859-1");
    http_request.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
    http_request.setRequestHeader("Cache-Control","post-check=0, pre-check=0");
    http_request.setRequestHeader("Pragma", "no-cache");

	http_request.send(null);
}

//*** função para exibição da página
function conteudoPagina(http, div)
{

	// se estiver carregando...
	if(http.readyState == 1)
	{
			// Quando estiver carregando, exibe: carregando...
			document.getElementById(div).innerHTML = "<center><p>Carregando...</p></center>";
	}

	// quando tiver terminado de carregar
	if (http.readyState == 4)
	{
			// checagem de status
			if (http.status == 200)
			{

				// Aqui é onde se mostra a página carregada

				// Conteúdo da página chamada
				var resultado = http.responseText;

				// Resolve o problema dos acentos
				resultado = resultado.replace(/\+/g," ");
				resultado = unescape(resultado);

				// Coloca na página atual o conteúdo da página requisitada pelo AJAX
				document.getElementById(div).innerHTML = resultado;
				
	            // executa scripts
	            extraiScript(resultado);
			}

			// se checagem de status falhar...
			else
			{
				alert('Houve um problema de conexão no servidor. Por favor tente novamente mais tarde.');
			}
	}

}

/////////////////////////////////////////////////////////////////////////////////////////////////

function extraiScript(texto){
    // inicializa o inicio ><
    var ini = 0;
    // loop enquanto achar um script
    while (ini!=-1){
        // procura uma tag de script
        ini = texto.indexOf('<script', ini);
        // se encontrar
        if (ini >=0){
            // define o inicio para depois do fechamento dessa tag
            ini = texto.indexOf('>', ini) + 1;
            // procura o final do script
            var fim = texto.indexOf('</script>', ini);
            // extrai apenas o script
            codigo = texto.substring(ini,fim);
            // executa o script
            eval(codigo);
        }
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////////
/**
* @author "Desconhecido" projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Script para aplicação de Máscaras
*/
 
function jMascara (objForm, strField, sMask, evtKeyPress) {
      var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;

      if(window.event) { // Internet Explorer
        nTecla = evtKeyPress.keyCode; }
      else if(evtKeyPress.which) { // Nestcape
        nTecla = evtKeyPress.which;
      }

      sValue = objForm[strField].value;

      // Limpa todos os caracteres de formatação que
      // já estiverem no campo.
      sValue = sValue.toString().replace( "-", "" );
      sValue = sValue.toString().replace( "-", "" );
      sValue = sValue.toString().replace( ".", "" );
      sValue = sValue.toString().replace( ".", "" );
      sValue = sValue.toString().replace( "/", "" );
      sValue = sValue.toString().replace( "/", "" );
      sValue = sValue.toString().replace( "(", "" );
      sValue = sValue.toString().replace( "(", "" );
      sValue = sValue.toString().replace( ")", "" );
      sValue = sValue.toString().replace( ")", "" );
      sValue = sValue.toString().replace( " ", "" );
      sValue = sValue.toString().replace( " ", "" );
      fldLen = sValue.length;
      mskLen = sMask.length;

      i = 0;
      nCount = 0;
      sCod = "";
      mskLen = fldLen;

      if (nTecla != 8) { // backspace
        if (sMask.charAt(i-1) == "9") { // apenas números...
          return ((nTecla > 47) && (nTecla < 58)); } // números de 0 a 9
        else { // qualquer caracter...

		
		  while (i <= mskLen) {
	        bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/"))
	        bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))
	
	        if (bolMask) {
	          sCod += sMask.charAt(i);
	          mskLen++; }
	        else {
	          sCod += sValue.charAt(nCount);
	          nCount++;
	        }
	
	        i++;
	      }
	
	      objForm[strField].value = sCod;

          return true;
        } }
      else {
        return true;
      }
    }