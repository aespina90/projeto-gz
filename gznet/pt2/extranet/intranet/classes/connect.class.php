<?php

  class CONEXAO{
          var $usuario = "gzsistemas12";
          var $senha = "elearning8520";
          var $sid = "mysql02.gzsistemas.com.br";
          var $banco = "gzsistemas12";
          var $consulta = "";
          var $link = "";

          function CONEXAO(){
  		$this->Conecta();
          }

  	function Conecta(){
  		$this->link = mysql_connect($this->sid,$this->usuario,$this->senha);
  		if (!$this->link){
  			die("Problema na Conexão com o Banco de Dados");
                }elseif (!mysql_select_db($this->banco,$this->link)){
  			die("Problema na Conexão com o Banco de Dados");

                        }

                        }

        function Desconecta()
                {
                        return mysql_close($this->link);
                }

        function Consulta($consulta)
                {
  		$resultado = mysql_query($consulta);
                return $resultado;       
                }
          }

        function Insere_dados($inserir){
            mysql_query($inserir);
        }

?>