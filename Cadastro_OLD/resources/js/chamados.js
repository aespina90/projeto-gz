var chamados = [];
var identificador = [];
var codigo = 0;
var id = [];
var hist = [];
var histor = [];
var msg = [];
var codCli = "";
var table;
var anexos = [];
var final = 0;

$(document).ready(function() {
	
	document.getElementById("txt-chamado").disabled = true;	
	$("[id$='txt-resposta']").prop("disabled", true );
	document.getElementById("txt-titulo").disabled = true;
	document.getElementById("anexs").disabled = true;
	document.getElementById("txt-atendente").disabled = true;
	document.getElementById("txt-departamento").disabled = true;
	document.getElementById("txt-tipo-chamado").disabled = true;
	document.getElementById("txt-msg").disabled = true;	
	document.getElementById("btn-cancelar").disabled = true;
	$("[id$='files']").css("pointer-events", "none");
	$( "[id$='btn-finalizar']" ).prop("disabled", true );
	$( "[id$='file']" ).prop("disabled", true );
	$( "[id$='btn-enviar']" ).prop("disabled", true );
	
	document.getElementById('alerts').style.display = "none";
	document.getElementById('alertes').style.display = "none";
	
	$("td").addClass("coluna-cliente");	
	$("tr").addClass("clientes");

    $('.cliente').dataTable({
      "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "iDisplayLength": 5,
      "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ Registros por página",
            "sEmptyTable": "Não há registros para o cliente requisitado",
            "sSearch": "",
            "sInfo": "Mostrando _START_ para _END_ de _TOTAL_ registros",
            "sInfoEmpty":"Mostrando 0 para 0 de 0 registros",
            "sInfoFiltered": "(Filtrado de _MAX_ do total de registros)",
            "sZeroRecords": "Nenhum registro encontrado",
        "oPaginate": {
          "sPrevious": "Anterior",
          "sNext": "Próximo"
          }
        }

    });
    
    $('.dataTables_filter input').addClass('form-control').attr('placeholder','Procurar...');
    $('.dataTables_length select').addClass('form-control');   
});

function carregar() {	 
  
  var token = "f0efbf997a29e70c347dbff89970a582";
  var URL = "https://api.tomticket.com/chamados/"+ token +"/1?idcliente="+ codCli + "&ordem=0";
  
  $.ajax({
    url: URL,
    headers: {
      "Accept":"application/json"
    },
    data: {

    },
    success: function (data) {
          chamados.push(data.data);
          chamados[0].forEach(function(arr, i){
            var tr = $("<tr class='chamados' data-toggle='tooltip' title='Clique na coluna Protocolo para selecionar o chamado'>").append($("<td class='coluna-protocolo'>"));
            tr.find(".coluna-protocolo").text("#" + chamados[0][i].protocolo);
            $(tr).append($("<td class='coluna-departamento'>"));
            tr.find(".coluna-departamento").text(chamados[0][i].departamento);
            $(tr).append($("<td class='coluna-cliente'>"));
            tr.find(".coluna-cliente").text(chamados[0][i].titulo);
            $(tr).append($("<td class='coluna-categoria'>"));
            tr.find(".coluna-categoria").text(chamados[0][i].descsituacao);
            $(tr).appendTo($("#tb-chamados"));
            identificador.push(chamados[0][i].idchamado);
            id.push(chamados[0][i].protocolo);
          });
          $("#txt-cliente").text(chamados[0][0].nomecliente);
          
          
           table = $('#tb-chamados').dataTable({
              	"sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
                  "iDisplayLength": 5,
                  "bDestroy":true,
                  "bRetrieve":false,
              	"aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                  "sPaginationType": "bootstrap",
                  "oLanguage": {
                      "sLengthMenu": "_MENU_ Registros por página",
                      "sEmptyTable": "Não há registros para o cliente requisitado",
                      "sSearch": "",
                      "sInfo": "Mostrando _START_ para _END_ de _TOTAL_ registros",
                      "sInfoEmpty":"Mostrando 0 para 0 de 0 registros",
                      "sInfoFiltered": "(Filtrado de _MAX_ do total de registros)",
                      "sZeroRecords": "Nenhum registro encontrado",                      
              		"oPaginate": {
              			"sPrevious": "Anterior",
              			"sNext": "Próximo"
                  	}

                  }

              });
              $('.dataTables_filter input').addClass('form-control').attr('placeholder','Procurar...');
              $('.dataTables_length select').addClass('form-control');
          
    },
    error: function (erro) {
      toastError("Não foi possível pesquisar a comanda!");
    }
  });
}

function limparTabela() {
	table.fnDestroy();
	if($('.chamados').length > 0){
		$('.chamados').remove();
	}		
}

function limpar() {
	var branco = "";
	  document.getElementById("txt-resposta").disabled = true;	  
	  $( "[id$='btn-enviar']" ).prop("disabled", true );
	  document.getElementById("btn-cancelar").disabled = true;
	  $("[id$='files']").css("pointer-events", "none");
	  $( "[id$='btn-finalizar']" ).prop("disabled", true );
	  $( "[id$='file']" ).prop("disabled", true );
	  $("#chat").html("");
	  $("#anexos").html("");
	  histor = [];
	  hist = [];
	  anexos = [];
	  $("[id$='txt-resposta']").val(branco);	  
	  $("#txt-chamado").val(branco);
	  $("#txt-titulo").val(branco);
	  $("#txt-atendente").val(branco);
	  $("#txt-departamento").val(branco);
	  $("#txt-tipo-chamado").val(branco);
	  $("#txt-msg").val(branco);
}

$("#btn-cancelar").click(function (e) {
  limpar();
});

$("#file").change(function (e) {
	var teste = $("#file").val();
	var filename = $('#file').val().replace(/C:\\fakepath\\/i, '');
	$("#anexs").val(filename);
	document.getElementById('alertes').style.display = "block";
});

$("#tb-chamados").on("click", '.coluna-protocolo', function(event){
  var index = $(this).index();
	var col1value = $(this).parent().find(".coluna-protocolo").first().text();
  var status = $(this).parent().find(".coluna-categoria").first().text();
  if(status == "Finalizado" || status == "Aguardando avaliação do gerente" || status == "Cancelado"){
    toastError("CHAMADO JÁ FINALIZADO OU AGUARDANDO APROVAÇÃO OU CANCELADO!");
    codigo = col1value.replace("#", "");
    for(var i = 0; i<chamados[0].length; i++){
      if(chamados[0][i].protocolo == codigo){
        $("#chat").html("");
        $("#anexos").html("");
        histor = [];
        hist = [];
        anexos = [];
        $("#txt-titulo").val(chamados[0][i].titulo);
        $("#txt-atendente").val(chamados[0][i].atendente);
        $("#txt-departamento").val(chamados[0][i].departamento);
        //$("#txt-tipo-chamado").val(chamados[0][i].categoria); preenchimento de valor na linha 300
        $("#txt-msg").val(chamados[0][i].mensagem);
        $("#id-chamado").val(chamados[0][i].idchamado);

        historico(chamados[0][i].idchamado);
        break;
      }
    }
    $("#txt-chamado").val(codigo);    
    $( "[id$='btn-enviar']" ).prop("disabled", true );
    document.getElementById("btn-cancelar").disabled = false;  
    $( "[id$='file']" ).prop("disabled", true );
    $("[id$='files']").css("pointer-events", "none");
    $( "[id$='btn-finalizar']" ).prop("disabled", true );    
    $( "[id$='txt-resposta']" ).prop("disabled", true );
  } else{
    codigo = col1value.replace("#", "");
    for(var i = 0; i<chamados[0].length; i++){
      if(chamados[0][i].protocolo == codigo){    	  
    	  $("#chat").html("");
    	  $("#anexos").html("");
    	  histor = [];
    	  hist = []; 
    	  anexos = [];
        $("#txt-titulo").val(chamados[0][i].titulo);
        $("#txt-atendente").val(chamados[0][i].atendente);
        $("#txt-departamento").val(chamados[0][i].departamento);
        //$("#txt-tipo-chamado").val(chamados[0][i].categoria); preenchimento de valor na linha 300
        $("#txt-msg").val(chamados[0][i].mensagem);
        $("#id-chamado").val(chamados[0][i].idchamado);
        
        historico(chamados[0][i].idchamado);
        break;
      }
    }
    $("#txt-chamado").val(codigo);    
    $( "[id$='btn-enviar']" ).prop("disabled", false );
    document.getElementById("btn-cancelar").disabled = false; 
    $( "[id$='file']" ).prop("disabled", false );
    $( "[id$='btn-finalizar']" ).prop("disabled", false );    
    $( "[id$='txt-resposta']" ).prop("disabled", false );
    
    $("[id$='files']").css("pointer-events", "auto");    
  }
  
  document.getElementById('alerts').style.display = "none";
});

$(".table").on("click", '.coluna-cliente', function(event){		  
	  var index = $(this).index();	  
	  var col1value = $(this).parent().find(".coluna-cliente").first().text().trim();
	  if(col1value.trim() != ""){
		  codCli = col1value;
		  if($('.chamados').length > 0){
			limparTabela();
			carregar();
		  } else{	
			carregar();
		  }
		  
		  document.getElementById('alert').style.display = "none";
		  document.getElementById('alerts').style.display = "block";
	  }
});

function formatBytes(bytes,decimals) {
	   if(bytes == 0) return '0 Bytes';
	   var k = 1000,
	       dm = decimals || 2,
	       sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
	       i = Math.floor(Math.log(bytes) / Math.log(k));
	       var dec = parseFloat((bytes / Math.pow(k, i)).toFixed(dm))
	   return Math.round(dec) + ' ' + sizes[i];
	}

function historico(idchamado) {
	  var token = "f0efbf997a29e70c347dbff89970a582";

	  var URL = "https://api.tomticket.com/chamado/" + token + "/" + idchamado;


	  $.ajax({
	    url: URL,
	      headers: {
	        "Accept":"application/json"
	      },
	      data: {

	      },
	      success: function (resposta) {

	        hist.push(resposta.data);
	        histor.push(hist[0].historico);
	        histor[0].forEach(function(arr, i){
	          var chat = $("<div class='chat-message chat-primary msg'></div>").append($("<div class='chat-contact'></div>"));
	          if(histor[0][i].atendente != null){
	            chat.find(".chat-contact").text(histor[0][i].atendente);

	          } else{
	            chat.find(".chat-contact").text("Cliente");
	          }
	          $(chat).append($("<div class='chat-text'></div>"));
	          var teste = histor[0][i].mensagem.replace(/\n|\r\n|\r/g, "<br>");
	          var odd = teste.replace("\n","<br/>");

	          chat.find(".chat-text").html(odd + "<small class='pull-right'>" + histor[0][i].data_hora + "</small>");
	          $(chat).appendTo($("#chat"));

	          var teste = histor[0][i].anexos.length;

	          if(teste > 1){
	            for(var o = 0; histor[0][i].anexos.length > o; o++){
	              var files = $("<a href="+histor[0][i].anexos[o].url+">"+ histor[0][i].anexos[o].nome + "(" + formatBytes(histor[0][i].anexos[o].tamanhobytes) + ")</a><br/>").appendTo($("#anexos"));
	            }
	          } else{
	            if(teste != 0){
	              var files = $("<a href="+histor[0][i].anexos[0].url+">"+ histor[0][i].anexos[0].nome + "(" + formatBytes(histor[0][i].anexos[0].tamanhobytes) + ")</a><br/>").appendTo($("#anexos"));
	            }
	          }

	        });
	        
	        if(hist[0].campospersonalizados[1].value != null){
	        	$("#txt-tipo-chamado").val(hist[0].Versão);
	        } else{
	        	$("#txt-tipo-chamado").val("Não informado!");
	        }
	        

	      },
	      error: function (erro) {
	        toastError("Não foi possível realizar a pesquisa! Verifique Internet");
	      }
	  });
	}