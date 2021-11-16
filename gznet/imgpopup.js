/***********************************************************************
FUNÇÃO DE POP-UP COM IMAGEM
-------------------------------------------------------------------
Função: fnImagemPopUp
Dados de Entrada: titulo,largura,altura,imagem,alt. Segue abaixo explicação de cada um:
			titulo : nome do pop-up
			largura : largura do pop-up
			altura: altura do pop-up
			imagem: link absoluto da imagem que será aberta
			alt: nome da imagem
Dados de Saída:
Processamento:  Quando a função for acionada ela abrirá um Pop-Up com as dimensões desejadas
e carregará a imagem que foi passada via parâmetro.

Para fazer a chamada da função, use no evento JavaScript:
	fnImagemPopUp('Nome_Da_Pagina',640,480,'http://LINK_DA_IMAGEM','Titulo_Da_Imagem');

Responsavél: João Vìtor Molinari
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