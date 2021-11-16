//Funções para a GZ Sistemas

function validaInteresseFaleConosco(){
   if(fale_conosco.interesse.value == "Senha" ){
        fale_conosco.usrlogin.disabled = false;
        fale_conosco.usrsenha.disabled = false;
   } else {
     fale_conosco.usrlogin.disabled = true;
     fale_conosco.usrsenha.disabled = true;
   }
   return true;
}

function validaform_fale_conosco(){
    if(fale_conosco.nome.value.length<=1){
        alert("O campo Nome deve estar preenchido corretamente.");
        fale_conosco.nome.focus();
        return false;
    }
    var str_email = fale_conosco.email.value ;
    if (( str_email.search(/^\w+((-\w+)|(\.\w+))*\@\w+((\.|-)\w+)*\.\w+$/) == -1 ) || ( str_email == 'Email:' )){
    	alert("O campo E-mail deve ser preenchido corretamente");
    	fale_conosco.email.focus();
    	return false;
    }
    if(fale_conosco.interesse.value == "Senha" ){
        if(fale_conosco.empresa.value.length<=1){
            alert("O campo Empresa deve estar preenchido corretamente.");
            fale_conosco.empresa.focus();
            return false;
        }
        if(fale_conosco.usrlogin.value.length<3){
          alert("O campo Login deve ter no mínimo 3 digitos");
          fale_conosco.usrlogin.focus();
          return false;
        }
        if(fale_conosco.usrsenha.value.length<4){
          alert("O campo Senha deve ter no mínimo 4 digitos");
          fale_conosco.usrsenha.focus();
          return false;
        }
    }
}

///////////////////////////////////////////////////////////////////

function validaform_seja_revendedor(){
	if(seja_revendedor.nomedaempresa.value.length<=1){
		alert("O campo Nome da Empresa deve estar preenchido corretamente.");
		seja_revendedor.nomedaempresa.focus();
		return false;
	}

	if(seja_revendedor.contato.value.length<=1){
		alert("O campo Pessoa para Contato deve estar preenchido corretamente.");
		seja_revendedor.contato.focus();
		return false;
	}

	if(seja_revendedor.cidade.value.length<=1){
		alert("O campo Cidade deve estar preenchido corretamente.");
		seja_revendedor.cidade.focus();
		return false;
	}

	if(seja_revendedor.estado.value.length<=1){
		alert("O campo Estado deve estar preenchido corretamente.");
		seja_revendedor.estado.focus();
		return false;
	}

	if(seja_revendedor.telefone.value.length<=1){
		alert("O campo Telefone deve estar preenchido corretamente.");
		seja_revendedor.telefone.focus();
		return false;
	}


    var str_email = seja_revendedor.email.value ;
    if (( str_email.search(/^\w+((-\w+)|(\.\w+))*\@\w+((\.|-)\w+)*\.\w+$/) == -1 ) || ( str_email == 'Email:' )){
    	alert("O campo E-mail deve ser preenchido corretamente");
    	seja_revendedor.email.focus();
    	return false;
	}

	if(seja_revendedor.mensagem1.value.length<=1){
		alert("A 1° Pergunta deve estar preenchido corretamente.");
		seja_revendedor.mensagem1.focus();
		return false;
	}

	if(seja_revendedor.mensagem2.value.length<=1){
		alert("A 2° Pergunta deve estar preenchido corretamente.");
		seja_revendedor.mensagem2.focus();
		return false;
	}

	if(seja_revendedor.mensagem3.value.length<=1){
		alert("A 3° Pergunta deve estar preenchido corretamente.");
		seja_revendedor.mensagem3.focus();
		return false;
	}

	if(seja_revendedor.mensagem4.value.length<=1){
		alert("A 4° Pergunta deve estar preenchido corretamente.");
		seja_revendedor.mensagem4.focus();
		return false;
	}

	if(seja_revendedor.mensagem5.value.length<=1){
		alert("A 5° Pergunta deve estar preenchido corretamente.");
		seja_revendedor.mensagem5.focus();
		return false;
	}

	if(seja_revendedor.mensagem6.value.length<=1){
		alert("A 6° Pergunta deve estar preenchido corretamente.");
		seja_revendedor.mensagem6.focus();
		return false;
	}

	if(seja_revendedor.mensagem7.value.length<=1){
		alert("A 7° Pergunta deve estar preenchido corretamente.");
		seja_revendedor.mensagem7.focus();
		return false;
	}

	if(seja_revendedor.mensagem8.value.length<=1){
		alert("A 8° Pergunta deve estar preenchido corretamente.");
		seja_revendedor.mensagem8.focus();
		return false;
	}

	if(seja_revendedor.mensagem9.value.length<=1){
		alert("A 9° Pergunta deve estar preenchido corretamente.");
		seja_revendedor.mensagem9.focus();
		return false;
	}

	if(seja_revendedor.mensagem10.value.length<=1){
		alert("A 10° Pergunta deve estar preenchido corretamente.");
		seja_revendedor.mensagem10.focus();
		return false;
	}

	if(seja_revendedor.mensagem11.value.length<=1){
		alert("A 11° Pergunta deve estar preenchido corretamente.");
		seja_revendedor.mensagem11.focus();
		return false;
	}

	if(seja_revendedor.mensagem12.value.length<=1){
		alert("A 12° Pergunta deve estar preenchido corretamente.");
		seja_revendedor.mensagem12.focus();
		return false;
	}

	if(seja_revendedor.mensagem13.value.length<=1){
		alert("A 13° Pergunta deve estar preenchido corretamente.");
		seja_revendedor.mensagem13.focus();
		return false;
	}

	if(seja_revendedor.mensagem14.value.length<=1){
		alert("A 14° Pergunta deve estar preenchido corretamente.");
		seja_revendedor.mensagem14.focus();
		return false;
	}

}

///////////////////////////////////////////////////////////////////

function validaform_area_restrita(){
	if((area_restrita.login.value.length<=1)||(area_restrita.login.value == 'Login')){
		alert("O campo LOGIN deve estar preenchido corretamente.");
		area_restrita.login.focus();
		return false;
	}
	if((area_restrita.senha.value.length<=1)||(area_restrita.senha.value == '******')){
		alert("O campo SENHA deve estar preenchido corretamente.");
		area_restrita.senha.focus();
		return false;
	}
}
////////////////////////////////////////////////////////////////////
function verificaLogin(){
	if(area_restrita.login.value==""){
		alert("Atenção!\nO campo LOGIN deve ser preenchido!");
		area_restrita.login.focus();
		return false;
	}
	return true;
}
//////////////////////////////////////////////////////////////////

function validaformTrabalhe(){
	if (trabalhe.trab_nome.value == '' ){
		alert("Atenção! O campo NOME deve ser preenchido.");
		trabalhe.trab_nome.focus();
		return false;
	}
	if (trabalhe.trab_rg.value == '' ){
		alert("Atenção! O campo RG deve ser preenchido.");
		trabalhe.trab_rg.focus();
		return false;
	}
	if (trabalhe.trab_cpf.value == '' ){
		alert("Atenção! O campo CPF deve ser preenchido.");
		trabalhe.trab_cpf.focus();
		return false;
	}
	if (trabalhe.trab_telefone.value == '' ){
		alert("Atenção! O campo Telefone deve ser preenchido.");
		trabalhe.trab_telefone.focus();
		return false;
	}
}

////////////////////////////////////////////////////////////////////

function FormatMask(objForm, strField, sMask, evtKeyPress) {
  var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;
  if(window.event) { // Internet Explorer
    nTecla = evtKeyPress.keyCode; }
  else if(evtKeyPress.which) { // Nestcape
    nTecla = evtKeyPress.which;
  }
  sValue = objForm[strField].value;
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

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function fnImagemPopUp( titulo , largura , altura , imagem , alt ){
	var janela ;
	janela = window.open("",titulo,"width="+largura+",height="+altura+",scrollbars=no,toolbar=no,location=no,status=no,menubar=no,resizable=no,left=300,top=300'");
	janela.document.write('<html><head><title>'+titulo+'</title></head>');
	janela.document.write('<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">');
	janela.document.write('<img src="'+ imagem + '" alt="' + alt + '" border="0" usemap="#Map"> ');
	janela.document.write('<map name="Map"><area shape="rect" coords="190,6,248,26" href="javascript:window.close();"></map>');
	janela.document.write('</body></html>');
}

function fnImprimiImagem( titulo , largura , altura , imagem , alt ){
	var janela ;
	janela = window.open("",titulo,"width="+largura+",height="+altura+",scrollbars=no,toolbar=no,location=no,status=no,menubar=no,resizable=no,left=300,top=300'");
	janela.document.write('<html><head><title>'+titulo+'</title></head>');
	janela.document.write('<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="self.print();">');
	janela.document.write('<img src="'+ imagem + '" alt="' + alt + '" border="0" usemap="#Map"> ');
	janela.document.write('<map name="Map"><area shape="rect" coords="190,6,248,26" href="javascript:window.close();"></map>');
	janela.document.write('</body></html>');
}

function jMascara (objForm, strField, sMask, evtKeyPress){
    var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;
    if(window.event){
		nTecla = evtKeyPress.keyCode;
	}
    else if(evtKeyPress.which){
        nTecla = evtKeyPress.which;
    }
    sValue = objForm[strField].value;
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
    if (nTecla != 8){
		if (sMask.charAt(i-1) == "9"){
			return ((nTecla > 47) && (nTecla < 58));
		}
        else{
			while(i <= mskLen){
				bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/"))
				bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))
		        if(bolMask){
					sCod += sMask.charAt(i);
					mskLen++;
				}
				else{
					sCod += sValue.charAt(nCount);
					nCount++;
				}
		        i++;
			}
			objForm[strField].value = sCod;
			return true;
        }
	}
    else{
        return true;
    }
}

function jCampoNumerico(x,y,evtKeyPress ){
	var nTecla = 0;
	if(document.all){
		nTecla = evtKeyPress.keyCode;
	}
	else{
		nTecla = evtKeyPress.which ;
	}
	if(((nTecla > 47) && (nTecla < 58)) || (nTecla == 8) || (nTecla == 127) || (nTecla == 0) || (nTecla == 13)){
		return true;
	}
	else{
		return false;
	}
}

function pesquisar_dados(valor,pagina,campo,selecionado){
	extensao = 1 ;
	for(cont_string = 0 ; cont_string < pagina.length ; cont_string++){
		if(pagina.charAt(cont_string) == '.'){
			extensao = 0 ;
		}
	}
	if(extensao != 0){
		pagina = pagina + '.php?' ;
	}
	else{
		pagina = pagina + '&' ;
	}
	http.open( "GET", pagina + "id=" + valor , true );
	http.onreadystatechange = function(){
		handleHttpResponse(campo , selecionado);
	};
	http.send(null);
}

function handleHttpResponse(campo,selecionado){
	campo_select = document.getElementById(campo);
	if(http.readyState == 4){
		campo_select.options.length = 0;
		results = http.responseText.split(",");
		for(i = 0; i < results.length; i++){
			string = results[i].split( "|" );
			if( string[0] != '' ){
				campo_select.options[i] = new Option( string[0], string[1] );
				if(selecionado == string[1]){
					campo_select.options[i].selected = true ;
				}
			}
			if(selecionado == ''){
				campo_select.options[0].selected = true ;
			}
		}
	}
}

function getHTTPObject(){
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
	if(xmlhttp == null && typeof XMLHttpRequest != 'undefined'){
		try{
			xmlhttp = new XMLHttpRequest();
		}
		catch (e){
			xmlhttp = null;
		}
	}
	return xmlhttp;
}
var http = getHTTPObject();



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


function fnDownFile( iduser, idfile, arquivo ) {

  window.open( arquivo, "downFile" );

  var theForm   = document.getElementById('arquivos_interna');
  var hidIdFile = document.getElementById('idfile');
  var hidIdUser = document.getElementById('iduser');

  hidIdFile.value = idfile;
  hidIdUser.value = iduser;

  theForm.submit();
}