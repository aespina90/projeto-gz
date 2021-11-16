
function callApi() {
    $("#myModal").show();
    var loading = $(".div-ajax-carregamento-pagina");
    $("#btn-criar").attr("disabled", true);
    loading.show();

    $.ajax({
        url: "https://painel.gzcloud.com.br/services/contratacao",
        method: "POST",
        headers: {
            "Content-Type":"application/x-www-form-urlencoded",
            "Accept":"application/json"
        },
        data: {
            "cnpj": $("#cpf_cnpj").val().replace(/\./g,'').replace(/-/g,'').replace(/\//g,''), //string
            "razaoSocial": $("#razaoSocial").val(), //string
            "nomeFantasia": $("#nomeFantasia").val(), //string
            "cep": $("#cep").val().replace(/[^\d]+/g,''), //string
            "estado": $("#uf").val(), //string
            "municipio": $("#municipio").val(), //string
            "bairro": $("#bairro").val(), //string
            "logradouro": $("#logradouro").val(), //string
            "numero": $("#num").val(), //int
            "complemento": $("#complemento").val(),//string
            "telefone": $("#telefone").val().replace(/[\(\)\.\s-]+/g,''), //string
            "email": $("#email").val(), //string
            "senha": MD5($("#senha").val()), //string
            "nome": $("#nome").val(), //string
        },
        success: function (resposta) {
            $("#btn-criar").attr("disabled", true);
            loading.hide();
            $("#myModal").hide();
            alert("Você será redirecionado!" ); 
            if(resposta.mensagem == ["100"]) {
                window.location.assign("https://login.gzcloud.com.br/cadastro/sucesso.html");
            }else if(resposta.mensagem == ["208"]){
                window.location.assign("https://login.gzcloud.com.br/cadastro/possui_cadastro.html");
            }else if(resposta.mensagem == ["400"]){
                window.location.assign("https://login.gzcloud.com.br/cadastro/cnpj_cadastrado.html");
            }else if(resposta.mensagem == ["500"]){
                window.location.assign("https://login.gzcloud.com.br/cadastro/erro_gravacao.html");
            }else if(resposta.mensagem == ["600"]){
                window.location.assign("https://login.gzcloud.com.br/cadastro/clientegz.html");
            }
        },
        error: function (xhr, status, error) {
            console.log(error);
            console.log(status);
            $("#btn-criar").attr("disabled", false);
            loading.hide();
            $("#myModal").hide();
            alert("Ocorreu um erro na requisição, atualize e página e tente novamente.");
        },
        timeout: 8000 
    });
}
