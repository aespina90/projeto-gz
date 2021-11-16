<?php
//*** Início da sessão
	session_start() ;

//*** Propriedades página
	// Nível
	$default['nivel'] = '../../' ;
	// Número do módulo
	$default['modulo'] = 1 ;

//*** Inclusões:
	// Configurações da aplicação
	require ( $default['nivel'] . 'global.php' ) ;
	// Conexão com o banco de dados
	require ( $include['conexao'] ) ;
	// Funçoes
	require ( $include['funcao'] ) ;
	// Template: Leitura de _Get e/ou _Post
	require ( $template['getpost'] ) ;

	$cont_total = $_POST['cont_for'] ;

//*** Função de segurança
	fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , $var_acao , $default['nivel'] ) ;

//*** Inclusões:
	// Template: Validação de variáveis
	require ( $template['valvars'] ) ;

  	$hid_id_grupo	= $_POST['id_grupo'] ;

	// Deleta todos os registros
$rs_sql		= 'DELETE FROM tbsegurancaacessos WHERE idgrupo="'. $hid_id_grupo .'"' ;
	// Apaga os registros
	$rs_query	= mysql_query ( $rs_sql , $conexao['conexao'] ) ;

	for ( $cont_i = 0 ; $cont_i < $cont_total ; $cont_i ++ )
	{
	  	$ckb_leitura	= $_POST['leitura_'. $cont_i] ;
	  	$ckb_escrita	= $_POST['escrita_'. $cont_i] ;
	  	$hid_id_modulo	= $_POST['id_modulo_'. $cont_i] ;

	  	( $ckb_leitura == 'on' ) ? $ckb_leitura = 'S' : $ckb_leitura = 'N' ;
	  	( $ckb_escrita == 'on' ) ? $ckb_escrita = 'S' : $ckb_escrita = 'N' ;

		if (( $ckb_leitura != 'N' ) || ( $ckb_escrita != 'N' ))
		{
			$rs_sql		= 'INSERT INTO tbsegurancaacessos ( idgrupo , idmodulo , leitura , escrita ) VALUES ' ;
			$rs_sql    .= '("'. $hid_id_grupo .'" , "'. $hid_id_modulo .'" , "'. $ckb_leitura .'" , "'. $ckb_escrita .'")';
			$rs_query	= mysql_query ( $rs_sql , $conexao['conexao'] ) ;
		}
		if ( $hid_id_grupo == 0 )
		{
			$rs_sql		= 'INSERT INTO tbsegurancaacessos ( idgrupo , idmodulo , leitura , escrita ) VALUES ' ;
			$rs_sql    .= '("0" , "0" , "S" , "S")';
			$rs_query	= mysql_query ( $rs_sql , $conexao['conexao'] ) ;
		}
	}
?>
<script language="javascript">
	history.back() ;
</script>