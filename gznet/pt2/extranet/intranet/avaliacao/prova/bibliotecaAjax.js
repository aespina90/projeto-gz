var ajax;
var dadosUsuario;

// ----- Cria o objeto e faz a requisi��o -----
function requisicaoHTTP(tipo,url,assinc){
	if(window.XMLHttpRequest){// Objeto usado no Mozila, Safari...
		ajax = new XMLHttpRequest;
	}
	else if(window.ActiveXObject){// Objeto usado pelo Internet Explorer
		ajax = new ActiveXObject("Msxml2.XMLHTTP");
		if(!ajax){
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	//ajax � a vari�vel que vai armanezar o objeto que ser� utilizado baseado no navegador usado pelo usu�rio
	if (ajax){
		iniciaRequisicao(tipo,url,assinc); // Iniciou com sucesso
	}else{
		alert("Seu navegador n�o possui suporte a essa aplica��o"); // Mensagem que ser� exibida caso n�o seja poss�vel iniciar a requisi��o
	}
}
// ----- Inicia o objeto criado e envia os dados (se existirem) -----
function iniciaRequisicao(tipo, url, bool){
	ajax.onreadystatechange = trataResposta; //Atribui ao objeto a resposta da fun��o trataResposta
	ajax.open(tipo, url, bool); //Informa os par�metros do objeto: tipo de envio, url e se a comunica��o ser� ass�ncrona ou n�o
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");//Recupera as informa��es do cabe�alho
	ajax.send(dadosUsuario);// Envia os dados processados para o navegador
}
// ----- Inicia requisi��o com envio de dados -----
function enviaDados(url){
	criaQueryString(); //Chama a fun��o que transformar� os dados enviados em ua string
	requisicaoHTTP("POST", url, true); //Chama a fun��o que far� a requisi��o de dados ao servidor
}
// ----- Cria a string a ser enviada, formato campo1=valor&campo2=valor2... -----
function criaQueryString(){
	dadosUsuario = "";
	var frm = document.forms[0]; //Identifica o formul�rio
	var numElementos = frm.elements.length;// Informa o n�mero de elementos
	for(var i = 0; i < numElementos; i++){//Monta a querystring
		if(i < numElementos-1){ //Se i for menor que o n�mero de elementos (menos 1)
			dadosUsuario += frm.elements[i].name+"="+encodeURIComponent(frm.elements[i].value)+"&"; //recupera os valores que compor�o a url se houver mais elementos a serem inclu�dos;
		}
		else{
			dadosUsuario += frm.elements[i].name+"="+encodeURIComponent(frm.elements[i].value); //recupera os valores que compor�o a url se houver mais elementos a serem inclu�dos;
		}
	}
}
// ----- Trata a resposta do servidor -----
function trataResposta(){
	if(ajax.readyState == 4){// Se todas as informa��es e a conex�o foi fechada...
		if(ajax.status == 200){// Se o status da conex�o for 200
			trataDados(); // Chama a fun��o trataDAdos
		}
		else{
			alert("Problema na comunica��o com o objeto XMLHttpRequest.");
		}
	}
}


var dadosAtuais; //Array que guarda os dados atuais da linha antes de edit�-la
var linhaEmEdicao = null; //Guarda o ID da linha a ser editada, inclu�da ou exclu�da
var linhasNovas = 0; //Vari�vel auxiliar

//Prepara uma linha para edi��o
function EditarLinha(idLinha, cod, id){
	if(linhaEmEdicao == null){//Se linhaEmEdicao n�o for nulo...
		
		//Obt�m a linha a ser editada e altera a sua cor
		var linha = document.getElementById(idLinha);//Obt�m o id da linha que ser� editada
		linha.className = 'linhaSelecionada';//Altera a cor da linha que ser� editada
		var celulas = linha.cells;//Aramazena a c�lula que ser� editada
		
		//salva os dados atuais para o caso de cancelamento
		SalvaDados(idLinha);//Chama a fun��o que salv�ra os dados atuais da linha antes de edit�-la

		linhaEmEdicao = idLinha; //Armazena o id da linha que ser� editada
		//Cria os campo de texto edit�veis
		celulas[0].innerHTML = '<input type="hidden" name="cod" value="'+celulas[0].innerHTML+'">';//Armazena o c�digo do produto num campo oculto de formul�rio
		celulas[1].innerHTML = '<input type="text" name="pergunta" value="'+celulas[1].innerHTML+'">';//Mostrar o campo texto permitindo a edi��o do nome do produto
		celulas[2].innerHTML = '<input type="text" name="r_certa" value="'+celulas[2].innerHTML+'">';//Mostrar o campo texto permitindo a edi��o do pre�o do produto
		celulas[3].innerHTML = '<input type="text" name="r_2" value="'+celulas[3].innerHTML+'">';//Mostrar o campo texto permitindo a edi��o do pre�o do produto
		celulas[4].innerHTML = '<input type="text" name="r_3" value="'+celulas[4].innerHTML+'">';//Mostrar o campo texto permitindo a edi��o do pre�o do produto
		celulas[5].innerHTML = '<input type="text" name="r_4" value="'+celulas[5].innerHTML+'">';//Mostrar o campo texto permitindo a edi��o do pre�o do produto
		celulas[6].innerHTML = '<input type="text" name="r_5" value="'+celulas[6].innerHTML+'">';//Mostrar o campo texto permitindo a edi��o do pre�o do produto
		celulas[7].innerHTML = '<a href="#" onclick="Atualizar(document.formulario.cod.value, document.formulario.pergunta.value, document.formulario.r_certa.value, document.formulario.r_2.value, document.formulario.r_3.value, document.formulario.r_4.value, document.formulario.r_5.value);"><img src="../../../images/ok1.jpg" alt="Atualizar" /></a>';//Monta os links que chamar�o as fun��es para atualizar ou cancelar a edi��o da linha
		celulas[8].innerHTML = '<a href="#" onclick="Cancelar('+id+');"><img src="../../../images/no.jpg" alt="Cancelar" /></a>';//Insere um espa�o na �ltima c�lula
	}
	else {alert("Voc� j� est� digitando um registro.");}
}

//Exclui uma linha da tabela
function ExcluirLinha(idLinha, cod){
	if(!linhaEmEdicao){
		var linha = document.getElementById(idLinha);//Armazena o id da linha que ser� exclu�da
		linha.className = 'linhaSelecionada';// define a classe de estilos que ser� usada na linha
		if(confirm("Tem certeza que deseja Ativar/Desativar essa Pergunta?")){//Pergunta se a linha realmente deve ser exclu�da
			Aviso(1); // Exibe o aviso: Aguarde...
			var url = "index2.php?acao=excluir&cod="+cod;//Url que ser� enviada
			requisicaoHTTP("GET", url, true);//Fun��o que far� a requisi��o
		}else{
			linha.className = 'linha';//Define a classe de estilo que ser� usada se a linha n�o estiver maracada para exclus�o
		}
	}else{
		alert("Voc� est� com um registro aberto. Feche-o antes de prosseguir.");
	}
}

//Cria um novo registro
function NovoRegistro(cod){
	//Se houver linha sendo editada, cancela edi��o
	if(linhaEmEdicao){// Se linhas em edi��o for nulo...
		alert("Voc� est� com um registro aberto. Feche-o antes de prosseguir");
	}else{
		//Insere uma nova linha na tabela
		proxIndice = document.getElementById('minhaTabela').rows.length-1;//Armazena o �ndice a linha que ser� inserida
		var novaLinha = document.getElementById('minhaTabela').insertRow(proxIndice);//Insere uma nova linha na tabela
		novaLinha.className = 'linhas';//Define a classe de estilos que ser� usada na n ova linha
	}
	
	//Define o id da nova linha (que ser� usado em caso de edi��o/exclus�o
	novoId = "nova"+linhasNovas;//Armazena o id da linha
	novaLinha.setAttribute('id', novoId);//Define que o nome do id ser� o valor da vari�vel novoId
	linhasNovas++; //Incrementa o valor da vari�vel
	linhaEmEdicao = novoId;// Aramazena o valor da vari�vel novoId
	
	//Insere as c�lulas na linha criada
	var novasCelulas = new Array(5); //Cria um array
	for(var i=0; i<9; i++){
		novasCelulas[i] = novaLinha.insertCell(i); //Preenche o array
	}
	//Cria os campos dos formul�rios
	novasCelulas[0].innerHTML = '*'; //c�digo do produto
	novasCelulas[1].innerHTML = '<input type="text" name="pergunta">'; //insere o campo nome
	novasCelulas[2].innerHTML = '<input type="text" name="r_certa">'; //insere o campo c�digo
	novasCelulas[3].innerHTML = '<input type="text" name="r_2">'; //insere o campo c�digo
	novasCelulas[4].innerHTML = '<input type="text" name="r_3">'; //insere o campo c�digo
	novasCelulas[5].innerHTML = '<input type="text" name="r_4">'; //insere o campo c�digo
	novasCelulas[6].innerHTML = '<input type="text" name="r_5">'; //insere o campo c�digo
	novasCelulas[7].innerHTML = '<a href="#" onclick="Cadastrar(document.formulario.pergunta.value, document.formulario.r_certa.value, document.formulario.r_2.value, document.formulario.r_3.value, document.formulario.r_4.value, document.formulario.r_5.value, '+cod+');"><img src="../../../images/ok1.jpg" alt="Atualizar" /></a>'; //Monta os links que chamar�o as fun��es para cadastrar e cancelar a inser��o de uma nova linha
	novasCelulas[8].innerHTML = '<a href="#" onclick="CancelarInclusao();"><img src="../../../images/no.jpg" alt="Cancelar" /></a>';// Cria o link para cancelar a inser��o de dados do formul�rio
}

//Salva os dados atuais num array
function SalvaDados(idLinha){
	var celulas = document.getElementById(idLinha).cells;//Armazena o id  da c�lula
	dadosAtuais = new Array(celulas.length);//Armazena num array os dados atuais da linha
	for(var i=0; i<celulas.length; i++){
		dadosAtuais[i] = celulas[i].innerHTML; //Preenche o array
	}
	linhaEmEdicao = null;
}

//Cancela a edi��o de uma linha
function Cancelar(id){
	self.location.href="index.php?id="+id; //Direciona a p�gina
}

//Cancela a inclus�o de uma linha, excluindo-a
function CancelarInclusao(){
	var linha = document.getElementById(linhaEmEdicao);//Armazena o id da linha em edi��o
	linha.parentNode.removeChild(linha);// Remove a linha que seria inclu�da
	linhasNovas--;//Decrementa o n�mero de linhas
	linhaEmEdicao = null;
}

//Atualiza o conte�do da linha
function Atualizar(c, p ,rc ,r2 , r3, r4, r5){
	Aviso(1); //Exibe o aviso aguarde...
	var dados = ObtemDadosForm(p, rc, r2, r3, r4, r5);//Chama a fun��o que montar� a string com os dados que estar�o na url
	var cod = c;//Armazena o c�digo do produto que ser� atualizado
	var url = "index2.php?acao=atualizar"; //Monta a url
	url += "&cod="+cod+"&"+dados;//Monta a url
	requisicaoHTTP("GET", url, true);//Inicia a requisi��o
}

//Chamada do programa em PHP que cadastra no banco de dados
function Cadastrar(p, rc, r2, r3, r4, r5, cod){
	Aviso(1);//Chama a fun��o aviso
	var dados = ObtemDadosForm(p, rc, r2, r3, r4, r5); //Armazena a string com dados que compor�o a url
	var url = "index2.php?acao=cadastrar&"+dados;//Url que ser� enviada
	requisicaoHTTP("GET", url, true);//Inicia a requisi��o
}

//Coloca os dados do formul�rio em formato de query string

function ObtemDadosForm(p, rc, r2, r3, r4, r5){
	parametros = "p="+p+"&r_c="+rc+"&r_2="+r2+"&r_3="+r3+"&r_4="+r4+"&r_5="+r5;//Define os par�metros da url que ser� enviada
	return parametros;//Retorna o valor da vari�vel como resposta da fun��o
}

//Exibe ou oculta a mensagem de espera
function Aviso(exibir){
	var saida = document.getElementById("avisos");//Armazena a chamada da div avisos
	if(exibir){// Se exibir for verdadeio...
		saida.className = "aviso";//Define que a classe a ser usada ser� avisos
		saida.innerHTML = "Aguarde... Processando!";// Exibe o aviso: Aguarde... Processando!
	}else{
		saida.className = "";//Elimina a classe se exibir for falso
		saida.innerHTML = "";//N�o exibe nenhum aviso
	}
}

//Trata a  resposta do servidor, de acordo com a opera��o realizada
function trataDados(){
	var resposta = ajax.responseText; //armazena a resposta do servidor
	var linha = document.getElementById(linhaEmEdicao);//Aramazena o id da linha em edi��o
	if(resposta == "atualizou"){//registro foi atualizado
		//volta ao estilo antigo
		linha.className='linha'; //Define o nome da classe que ser� usada na linha
		var celulas = linha.cells; 
		//coloca novos valores nas celulas
		var meuForm = document.forms.formulario;//Armazena a chamada do formul�rio
		var nome = meuForm.nome.value; //Armazena o valor do campo nome
		var preco = meuForm.preco.value;//Armazena o valor do campo pre�o
		celulas[1].innerHTML = nome;//Insere o nome do produto na celula
		celulas[2].innerHTML = preco;//Insere o pre�o do produto na c�lula
		celulas[3].innerHTML = dadosAtuais[3];// link para edi��o
		celulas[4].innerHTML = dadosAtuais[4];// link para exclus�o
		linhaEmEdicao = null;
	}else if (resposta == "excluir"){// registro exclu�do
		linha.parentNode.removeChild(linha);//Remove a linha
		linhaEmEdicao=null;
	}else if(resposta.substring(0,9)=="cadastrou"){// registro foi inclu�do
		linha.className='linha';//Define a classe que ser� usada
		var celulas = linha.cells;
		//obt�m o c�digo gerado para o produto no banco de dados
		novoCodigo = resposta.substring(10);
		//coloca os novos valores na celula
		var meuForm = document.forms.formulario;
		var nome = meuForm.nome.value;
		var preco = meuForm.preco.value;
		celulas[0].innerHTML = novoCodigo;
		celulas[1].innerHTML = nome;
		celulas[2].innerHTML = preco;
		celulas[3].innerHTML = '<a href="#" onclick="EditarLinha(\''+linhaEmEdicao+'\');">Editar</a>';//Link para editar a linha
		celulas[4].innerHTML = '<a href="#" onclick="ExcluirLinha(\''+linhaEmEdicao+'\');">Excluir</a>';//Link para excluir a linha
		linhaEmEdicao = null;
	}else{//mensagem de erro
		if(resposta == 1){
			alert('Pergunta Atualizada.');
			window.location.reload();
		}else if(resposta == 2){
			alert('Pergunta Ativada.');
			window.location.reload();
		}else if(resposta == 3){
			alert('Pergunta Desativada.');
			window.location.reload();
		}else{
			alert('Pergunta Cadastrada.');
			window.location.reload();
		}
		Aviso(0);
	}
}


/*
requisicaoHTTP = tenta  instanciar o objeto XMLHttpRequest e, se conseguir, chama a fun��o que far� a requisi��o, passando a ela os dados fornecidos pelo usu�rio.

iniciaRequisi��o = recebe os dados da fun��o requisi��oHTTP e processa a requisi��o, al�m de definir a fun��o que ir� tratar a resposta do servidor.

enviaDados = faz uma requisi��o definindo antes os dados a serem enviados, que, no caso, s�o obtidos de um formul�rio HTML. Caso n�o haja dados a seresm enviados, podemos chamar diretamente a fun��o requisicaoHTTP.

criaQueryString = coloca os dados do firmul�rio no formato de uma QueryString, para que o servidor possa identificar os pares nome/valor.

trataResposta = verifica se a requisi��o foi conlu�da e inicia o tratamento dos dados. H� diferen�a desta fun��o para a fun��o trataDados(), que voc� dever� criar em seu programa para realizar o tratamento desejado sobre os dados retornados pelo servidor.

Poss�veis valores do readyState
0(N�o Iniciado): O Objeto foi criado mas o m�todo open() n�o foi chamado ainda. 
1(Carregando): O m�todo open() foi chamado mas a requisi��o n�o foi enviada ainda. 
2(Carregado): A requisi��o foi enviada. 
3(Incompleto): Uma parte da resposta do servidor foi recebida. 
4(Completo): Todos as informa��es foram recebidas e a conex�o foi fechada com sucesso. 
*/