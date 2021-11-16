/***********************************************************************
FUN��O DE POP-UP COM IMAGEM
-------------------------------------------------------------------
Fun��o: fnImagemPopUp
Dados de Entrada: titulo,largura,altura,imagem,alt. Segue abaixo explica��o de cada um:
			titulo : nome do pop-up
			largura : largura do pop-up
			altura: altura do pop-up
			imagem: link absoluto da imagem que ser� aberta
			alt: nome da imagem
Dados de Sa�da:
Processamento:  Quando a fun��o for acionada ela abrir� um Pop-Up com as dimens�es desejadas
e carregar� a imagem que foi passada via par�metro.

Para fazer a chamada da fun��o, use no evento JavaScript:
	fnImagemPopUp('Nome_Da_Pagina',640,480,'http://LINK_DA_IMAGEM','Titulo_Da_Imagem');

Responsav�l: Jo�o V�tor Molinari
Data: 22/06/2007
************************************************************************/
function fnImagemPopUp( titulo, largura , altura , imagem , alt )
{
		var janela ;
		janela = window.open("","popFoto","width="+largura+",height="+altura+",scrollbars=no,toolbar=no,location=no,status=no,menubar=no,resizable=no,left=300,top=300'");
		janela.document.write('<html><head><title>' + titulo + '</title></head>');
		janela.document.write('<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">');
		janela.document.write('<a href="javascript:window.close();"><img src="'+ imagem + '" alt="' + alt + '" border="0" /></a> ');
		janela.document.write('</body></html>');

}