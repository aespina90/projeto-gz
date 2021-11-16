        <?
        session_start();
        $usuario = $_SESSION['usuario'];
        $data = date("d/m/Y h:i:s");

        require '../../classes/connect.class.php';
        include('../../classes/valida_cookies.inc');
        $conecta = new CONEXAO();
        $conecta->Conecta();
        define ($msg);
        define ($tipoperfil);
        function alert($aviso) {
            echo "<script>alert('".$aviso."');</script>";
        }
        $cod = $_POST["cod"];
        $nome = $_POST["nome"];
        $ct = $_POST['cbx_ct'];
        $ar = $_POST["cbx_ar"];
        $el = $_POST["cbx_el"];
        $pc = $_POST["cbx_pc"];
        $ts = $_POST["cbx_ts"];
        $em = $_POST["cbx_em"];
        $qw = $_POST["cbx_qw"];
        $perfil_ts = $_POST["perfil"];
        $sel_uf = $_POST["uf"];
        $email = $_POST["email"];
        $cod1 = $_POST["cod1"];
        $obs = $_POST["obs1"];
        echo "<br>";
        echo "<br>";
        $nome = strtoupper($nome);
        if ($cod) {
            if((!$cod) || (!$nome) || (!$perfil_ts) || (!$email) || ($sel_uf == '0')) {

                if(!$cod) {
                    $msg = "\\nCódigo";
                }
                if(!$nome) {
                    $msg .= "\\nNome";
                }
                if(!$perfil_ts) {
                    $msg .= "\\nPerfil do TS";
                }
                if(!$email) {
                    $msg .= "\\nEmail";
                }
                if($sel_uf == '0') {
                    $msg .= "\\nUF";
                }
                alert('Os seguintes dados estão faltando:\n'.$msg.'\n\nPreencha os dados novamente');
                echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=../relatorio.php'>";
                echo "<br>";
            }
            else {
                $tipoperfil = "Acessos: ";
                //Tratando valor do Controller
                if($ct == 'on') {
                    $tipoperfil .= "Controller <br /> ";
                }
                //Tratando o valor da Ãƒï¿½rea Restrita
                if($ar == 'on') {
                    $tipoperfil .= "Área Restrita <br /> ";
                }
                //Tratando o valor da E-Learning
                if($el == 'on') {
                    $tipoperfil .= "E-Learning <br /> ";
                }
                //Tratando o valor do ProtCli
                if($pc == 'on') {
                    $tipoperfil .= "ProtCli <br /> ";
                }
                //Tratando o valor do Terminal Server
                if($ts == 'on') {
                    $tipoperfil .= "Terminal Server <br /> ";
                }
                //Tratando o valor do Email
                if($em == 'on') {
                    $tipoperfil .= "Email <br /> ";
                }
                //Tratando o valor do Qualitor
                if($qw == 'on') {
                    $tipoperfil .= "Qualitor ";
                }
              	$conecta->Consulta("insert INTO tbl_usuarios (COD,NOME,EMAIL,PEDIDOACESSO,PERFIL_TS,UF,FLB_OBS) values ('$cod', '$nome','$email','$tipoperfil','$perfil_ts','$sel_uf',1)");
                //Enviando email com pedido de senha
                        $msg =  "<FONT COLOR='#000000'><b>NOME:</b> \t$cod<br><br>";
		        $msg .= "<b>EMPRESA:</b> \t$nome<br><br>";
		        $msg .= "<b>ESTADO:</b> \t$email<br><br>";
		        $msg .= "<b>CIDADE:</b> \t$tipoperfil<br><br>";
		        $msg .= "<b>E-MAIL:</b> \t$perfil_ts<br><br>";
		        $msg .= "<b>TELEFONE:</b> \t$sel_uf</FONT><br><br>";
		        $mensagem = "$msg";
		        $remetente = "$email";
		        $destinatario = "zago.rafael@gzsistemas.com.br";
		        $assunto = "Novo usuÃ¡rio a ser criado";
		        $headers = "From: ".$remetente."\nContent-type: text/html"; # o â€˜text/htmlâ€™ Ã© o tipo mime da mensagem
				mail($destinatario,$assunto,$mensagem,$headers);
				//Confirmando envio
                alert('Pedido registrado com sucesso');

                echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=relatorio.php'>";
            }
        }
        if (($cod1) || ($obs)) {
            $valida_obs = $conecta->consulta("SELECT nome from tbl_usuarios where cod='$cod1'");
            $i= mysql_fetch_row($valida_obs);
            if($i){
            $obs_datab = $conecta->consulta("SELECT obs FROM tbl_usuarios where cod ='$cod1'");
            $obs_db = mysql_fetch_row($obs_datab);
            $obs = "<br /><hr> <b>Comentário Inserido em:</b> ".$data."<br /><b>Por:</b> ".$usuario."<br /> <b>Obs.:</b>".$obs."<br />".$obs_db[0];
            $conecta->consulta("update tbl_usuarios SET OBS='$obs', FLB_OBS=1 where cod='$cod1'");
            echo "
            <script type='text/javascript'>
             window.close();
            </script>";}

            else{
                 echo "
            <script type='text/javascript'>
             alert('Código de Revenda Inválido');
             window.close();
            </script>";
            }

        }
        ?>