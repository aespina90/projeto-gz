<?php
//Dados Remotos
include 'connect.class.php';
//Validando Usuários, Cursos, Licoes, Categorias e Lições por usuários
//Backup da tabela remota
$tbl_users_remoto = 'users' . date("Y-m-d-H-i-s");
$backup_users = "mysqldump -h mysql02.gzsistemas.com.br -ugzsistemas12 -pelearning8520 gzsistemas12 --table users courses lessons directions users_to_lessons departamentos > $tbl_users_remoto";
system($backup_users);
//Restaurando tabela na base local
$restore_users = "mysql -h192.168.1.2 -uintranet -pmestre bdusuariosgz < $tbl_users_remoto";
system($restore_users);
//Apagando Arquivo de Backup
system("rm $tbl_users_remoto");
?>