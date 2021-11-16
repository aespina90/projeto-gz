var ajax;
var dadosUsuario;

// ----- Cria o objeto e faz a requisição -----
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
	//ajax é a variável que vai armanezar o objeto que será utilizado baseado no navegador usado pelo usuário
	if (ajax){
		iniciaRequisicao(tipo,url,assinc); // Iniciou com sucesso
	}else{
		alert("Seu navegador não possui suporte a essa aplicação"); // Mensagem que será exibida caso não seja possível iniciar a requisição
	}
}
// ----- Inicia o objeto criado e envia os dados (se existirem) -----
function iniciaRequisicao(tipo, url, bool){
	ajax.onreadystatechange = trataResposta; //Atribui ao objeto a resposta da função trataResposta
	ajax.open(tipo, url, bool); //Informa os parâmetros do objeto: tipo de envio, url e se a comunicação será assíncrona ou não
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");//Recupera as informações do cabeçalho
	ajax.send(dadosUsuario);// Envia os dados processados para o navegador
}
// ----- Inicia requisição com envio de dados -----
function enviaDados(url){
	criaQueryString(); //Chama a função que transformará os dados enviados em ua string
	requisicaoHTTP("POST", url, true); //Chama a função que fará a requisição de dados ao servidor
}
// ----- Cria a string a ser enviada, formato campo1=valor&campo2=valor2... -----
function criaQueryString(){
	dadosUsuario = "";
	var frm = document.forms[0]; //Identifica o formulário
	var numElementos = frm.elements.length;// Informa o número de elementos
	for(var i = 0; i < numElementos; i++){//Monta a querystring
		if(i < numElementos-1){ //Se i for menor que o número de elementos (menos 1)
			dadosUsuario += frm.elements[i].name+"="+encodeURIComponent(frm.elements[i].value)+"&"; //recupera os valores que comporão a url se houver mais elementos a serem incluídos;
		}
		else{
			dadosUsuario += frm.elements[i].name+"="+encodeURIComponent(frm.elements[i].value); //recupera os valores que comporão a url se houver mais elementos a serem incluídos;
		}
	}
}
// ----- Trata a resposta do servidor -----
function trataResposta(){
	if(ajax.readyState == 4){// Se todas as informações e a conexão foi fechada...
		if(ajax.status == 200){// Se o status da conexão for 200
			trataDados(); // Chama a função trataDAdos
		}
		else{
			alert("Problema na comunicação com o objeto XMLHttpRequest.");
		}
	}
}


var dadosAtuais; //Array que guarda os dados atuais da linha antes de editá-la
var linhaEmEdicao = null; //Guarda o ID da linha a ser editada, incluída ou excluída
var linhasNovas = 0; //Variável auxiliar

//Prepara uma linha para edição
function EditarLinha(idLinha, cod, id){
	if(linhaEmEdicao == null){//Se linhaEmEdicao não for nulo...

		//Obtém a linha a ser editada e altera a sua cor
		var linha = document.getElementById(idLinha);//Obtém o id da linha que será editada
		linha.className = 'linhaSelecionada';//Altera a cor da linha que será editada
		var celulas = linha.cells;//Aramazena a célula que será editada

		//salva os dados atuais para o caso de cancelamento
		SalvaDados(idLinha);//Chama a função que salvára os dados atuais da linha antes de editá-la

		linhaEmEdicao = idLinha; //Armazena o id da linha que será editada
		//Cria os campo de texto editáveis
		celulas[0].innerHTML = '<input type="hidden" class="inputedit" name="cod" value="'+celulas[0].innerHTML+'">';//Armazena o código do produto num campo oculto de formulário
		celulas[1].innerHTML = '<input type="text" class="inputedit" size=1 name="uf" value="'+celulas[1].innerHTML+'">';//Mostrar o campo texto permitindo a edição do nome do produto
		celulas[2].innerHTML = '<input type="text" class="inputedit" size=30 name="nome" value="'+celulas[2].innerHTML+'">';//Mostrar o campo texto permitindo a edição do preço do produto
		celulas[3].innerHTML = '<input type="text" class="inputedit" size=10 name="login" value="'+celulas[3].innerHTML+'">';//Mostrar o campo texto permitindo a edição do preço do produto
		celulas[4].innerHTML = '<input type="text" class="inputedit" size=10 name="senha" value="'+celulas[4].innerHTML+'">';//Mostrar o campo texto permitindo a edição do preço do produto
		celulas[5].innerHTML = '<input type="text" class="inputedit" size=1 name="ct" value="'+celulas[5].innerHTML+'">';//Mostrar o campo texto permitindo a edição do preço do produto
		celulas[6].innerHTML = '<input type="text" class="inputedit" size=1 name="ar" value="'+celulas[6].innerHTML+'">';//Mostrar o campo texto permitindo a edição do preço do produto
                celulas[7].innerHTML = '<input type="text" class="inputedit" size=1 name="el" value="'+celulas[7].innerHTML+'">';//Mostrar o campo texto permitindo a edição do preço do produto
                celulas[8].innerHTML = '<input type="text" class="inputedit" size=1 name="pc" value="'+celulas[8].innerHTML+'">';//Mostrar o campo texto permitindo a edição do preço do produto
                celulas[9].innerHTML = '<input type="text" class="inputedit" size=1 name="ts" value="'+celulas[9].innerHTML+'">';//Mostrar o campo texto permitindo a edição do preço do produto
                celulas[10].innerHTML = '<input type="text" class="inputedit" size=1 name="em" value="'+celulas[10].innerHTML+'">';//Mostrar o campo texto permitindo a edição do preço do produto
                celulas[11].innerHTML = '<input type="text" class="inputedit" size=1 name="qw" value="'+celulas[11].innerHTML+'">';//Mostrar o campo texto permitindo a edição do preço do produto
                celulas[12].innerHTML = '<input type="text" class="inputedit" size=1 name="ok" value="'+celulas[12].innerHTML+'">';//Mostrar o campo texto permitindo a edição do preço do produto
		celulas[13].innerHTML = '<a onclick="Atualizar(document.formulario.cod.value, document.formulario.uf.value, document.formulario.nome.value, document.formulario.login.value, document.formulario.senha.value, document.formulario.ct.value, document.formulario.ar.value, document.formulario.el.value, document.formulario.pc.value, document.formulario.ts.value, document.formulario.em.value, document.formulario.qw.value, document.formulario.ok.value);"><img src="../../images/ok1.jpg">';//Monta os links que chamarão as funções para atualizar ou cancelar a edição da linha
		celulas[14].innerHTML = '<a onclick="Cancelar('+id+');"><img src="../../images/no.jpg"></a>';//Insere um espaço na última célula
	}
	else {alert("Você já está digitando um registro.");}
}

//Exclui uma linha da tabela
function ExcluirLinha(idLinha, cod){
	if(!linhaEmEdicao){
		var linha = document.getElementById(idLinha);//Armazena o id da linha que será excluída
		linha.className = 'linhaSelecionada';// define a classe de estilos que será usada na linha
		if(confirm("Tem certeza que deseja excluir essa linha?")){//Pergunta se a linha realmente deve ser excluída
			var url = "model_dg.php?acao=excluir&cod="+cod;//Url que será enviada
			requisicaoHTTP("GET", url, true);//Função que fará a requisição
		}else{
			linha.className = 'linha';//Define a classe de estilo que será usada se a linha não estiver maracada para exclusão
		}
	}else{
		alert("Você está com um registro aberto. Feche-o antes de prosseguir.");
	}
}

function Checar(cod){
    if(confirm("Checar?")){
	var url = "model_dg.php?acao=checar&cod="+cod;//Url que será enviada
	requisicaoHTTP("GET", url, true);//Função que fará a requisição
    }
}

//Cria um novo registro


//Salva os dados atuais num array
function SalvaDados(idLinha){
	var celulas = document.getElementById(idLinha).cells;//Armazena o id  da célula
	dadosAtuais = new Array(celulas.length);//Armazena num array os dados atuais da linha
	for(var i=0; i<celulas.length; i++){
		dadosAtuais[i] = celulas[i].innerHTML; //Preenche o array
	}
	linhaEmEdicao = null;
}

//Cancela a edição de uma linha
function Cancelar(id){
	self.location.href="controle.php"; //Direciona a página
}

//Cancela a inclusão de uma linha, excluindo-a

//Atualiza o conteúdo da linha
function Atualizar(c, uf , nome, login , senha, ct, ar, el, pc, ts, em, qw, ok){
        //Aviso(1); //Exibe o aviso aguarde...
	var dados = ObtemDadosForm(uf , nome, login , senha, ct, ar, el, pc, ts, em, qw, ok);//Chama a função que montará a string com os dados que estarão na url
	var cod = c;//Armazena o código do produto que será atualizado
	var url = "model_dg.php?acao=atualizar"; //Monta a url
	url += "&cod="+cod+"&"+dados;//Monta a url
	requisicaoHTTP("GET", url, true);//Inicia a requisição
}

//Chamada do programa em PHP que cadastra no banco de dados


//Coloca os dados do formulário em formato de query string

function ObtemDadosForm(uf , nome, login , senha, ct, ar, el, pc, ts, em, qw, ok){
	parametros = "uf="+uf+"&nome="+nome+"&login="+login+"&senha="+senha+"&ct="+ct+"&ar="+ar+"&el="+el+"&pc="+pc+"&ts="+ts+"&em="+em+"&qw="+qw+"&ok="+ok;//Define os parâmetros da url que será enviada
	return parametros;//Retorna o valor da variável como resposta da função
}

//Exibe ou oculta a mensagem de espera
function Aviso(exibir){
	var saida = document.getElementById("avisos");//Armazena a chamada da div avisos
	if(exibir){// Se exibir for verdadeio...
		saida.className = "aviso";//Define que a classe a ser usada será avisos
		saida.innerHTML = "Aguarde... Processando!";// Exibe o aviso: Aguarde... Processando!
	}else{
		saida.className = "";//Elimina a classe se exibir for falso
		saida.innerHTML = "";//Não exibe nenhum aviso
	}
}

//Trata a  resposta do servidor, de acordo com a operação realizada
function trataDados(){
	var resposta = ajax.responseText; //armazena a resposta do servidor
	var linha = document.getElementById(linhaEmEdicao);//Aramazena o id da linha em edição
	if(resposta == "atualizou"){//registro foi atualizado
		//volta ao estilo antigo
		linha.className='linha'; //Define o nome da classe que será usada na linha
		var celulas = linha.cells; 
		//coloca novos valores nas celulas
		var meuForm = document.forms.formulario;//Armazena a chamada do formulário
		var nome = meuForm.nome.value; //Armazena o valor do campo nome
		var preco = meuForm.preco.value;//Armazena o valor do campo preço
		celulas[1].innerHTML = nome;//Insere o nome do produto na celula
		celulas[2].innerHTML = preco;//Insere o preço do produto na célula
		celulas[3].innerHTML = dadosAtuais[3];// link para edição
		celulas[4].innerHTML = dadosAtuais[4];// link para exclusão
		linhaEmEdicao = null;
	}else if (resposta == "excluir"){// registro excluído
		linha.parentNode.removeChild(linha);//Remove a linha
		linhaEmEdicao=null;
	}else if(resposta.substring(0,9)=="cadastrou"){// registro foi incluído
		linha.className='linha';//Define a classe que será usada
		var celulas = linha.cells;
		//obtém o código gerado para o produto no banco de dados
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
			alert('Linha Atualizada.');
			window.location.reload();
		}else if(resposta == 2){
			alert('Linha Excluida.');
			window.location.reload();
                }else if(resposta == 3){
			window.location.reload();
                        window.opener.location.reload();
                }
		Aviso(0);
	}
}


/*
requisicaoHTTP = tenta  instanciar o objeto XMLHttpRequest e, se conseguir, chama a função que fará a requisição, passando a ela os dados fornecidos pelo usuário.

iniciaRequisição = recebe os dados da função requisiçãoHTTP e processa a requisição, além de definir a função que irá tratar a resposta do servidor.

enviaDados = faz uma requisição definindo antes os dados a serem enviados, que, no caso, são obtidos de um formulário HTML. Caso não haja dados a seresm enviados, podemos chamar diretamente a função requisicaoHTTP.

criaQueryString = coloca os dados do firmulário no formato de uma QueryString, para que o servidor possa identificar os pares nome/valor.

trataResposta = verifica se a requisição foi conluída e inicia o tratamento dos dados. Há diferença desta função para a função trataDados(), que você deverá criar em seu programa para realizar o tratamento desejado sobre os dados retornados pelo servidor.

Possíveis valores do readyState
0(Não Iniciado): O Objeto foi criado mas o método open() não foi chamado ainda. 
1(Carregando): O método open() foi chamado mas a requisição não foi enviada ainda. 
2(Carregado): A requisição foi enviada. 
3(Incompleto): Uma parte da resposta do servidor foi recebida. 
4(Completo): Todos as informações foram recebidas e a conexão foi fechada com sucesso. 
*/