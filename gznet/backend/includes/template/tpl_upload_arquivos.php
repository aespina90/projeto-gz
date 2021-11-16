<?php
$upload['erro'] = array ();
if(!is_uploaded_file($upload['campo']['tmp_name'])){
	$upload['erro'][] = 'O arquivo não foi carregado.';
}
if(count($upload['erro']) > 0){
	foreach($upload['erro'] as $err){
		$upload['msg_erro'] .= $err.'<br/>';
	}
	print $upload['msg_erro'];
	$upload['msg_erro'] = '';
}
else{
	$upload['campo']['name'] = str_replace(" ","_",strtolower($upload['campo']['name']));
	$upload['nome'] = $upload['campo']['name'];
	if(!move_uploaded_file($upload['campo']['tmp_name'],$folders['arquivos'].$upload['campo']['name'])){
		exit;
	}
}
?>