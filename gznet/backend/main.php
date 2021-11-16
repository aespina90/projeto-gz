<?php
session_start();
$default['nivel'] = './';
$default['modulo'] = 1;
require($default['nivel'].'global.php');
require($include['funcao']);
fun_seguranca($_SESSION[$session['iduser']],$_SESSION[$session['idgrupo']],$default['modulo'],'C',$default['nivel']);
require($template['headers']);
require($include['menu']);
?>
<table width="760" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#CCCCCC">
    <td width="40" rowspan="2" align="center" valign="top" bgcolor="#FFFFFF"><img src="<?php echo $folders['icones_menu'];?>/mnu_lettera.jpg" alt="Lettera"  border="0" /></td>
    <th width="320">Lettera</th>
    <td width="40" rowspan="2" align="center" valign="top" bgcolor="#FFFFFF"><img src="<?php echo $folders['icones_menu'];?>/mnu_seguranca.jpg" alt="Seguran&ccedil;a" border="0" /></td>
    <th>Segurança</th>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td valign="top" bgcolor="#FFFFFF">
      - <a href="<?php echo $folders['lettera'].'secoes/';?>">Cadastro de Seções</a><br/>
      - <a href="<?php echo $folders['lettera'].'lettera/';?>">Cadastro de Matérias</a><br/>
      - <a href="<?php echo $folders['lettera'].'bancodeimagens/';?>">Banco de Imagens</a>
    </td>
    <td valign="top" bgcolor="#FFFFFF">
      - <a href="<?php echo $folders['seguranca'].'grupos/';?>">Cadastro  de Grupos</a><br/>
      - <a href="<?php echo $folders['seguranca'].'usuarios/';?>">Cadastro  de Usuários</a>
    </td>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td width="40" rowspan="2" align="center" valign="top" bgcolor="#FFFFFF"><img src="<?php echo $folders['icones_menu'];?>/mnu_revenda.gif" alt="Revenda"  border="0" /></td>
    <th width="320">Revenda</th>
    <td width="40" rowspan="2" align="center" valign="top" bgcolor="#FFFFFF"><img src="<?php echo $folders['icones_menu'];?>/mnu_treinamento.jpg" alt="Treinamento" border="0" /></td>
    <th>Treinamento</th>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td valign="top" bgcolor="#FFFFFF">
      - <a href="<?php echo $folders['revenda'].'revenda/';?>">Cadastro de Revenda</a>
    </td>
    <td valign="top" bgcolor="#FFFFFF">
      - <a href="<?php echo $folders['treinamento'].'treinamento_usuario/';?>">Treinamento de Usuário Final</a><br/>
      - <a href="<?php echo $folders['treinamento'].'treinamento_revenda/';?>">Treinamento de Revenda</a><br/>
      - <a href="<?php echo $folders['treinamento'].'treinamentos/';?>">Treinamentos Agendados</a>
    </td>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td width="40" rowspan="2" align="center" valign="top" bgcolor="#FFFFFF"><img src="<?php echo $folders['icones_menu'];?>/mnu_restrita.jpg" alt="Área Restrita" border="0" /></td>
    <th width="320">Área Restrita</th>
    <td width="40" rowspan="2" align="center" valign="top" bgcolor="#FFFFFF"><img src="<?php echo $folders['icones_menu'];?>/mnu_parceiros.jpg" alt="Parceiros" border="0" /></td>
    <th width="320">Parceiros</th>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FFFFFF">
      - <a href="<?php echo $folders['arearestrita'].'arearestrita/';?>">Cadastro de Usuários</a><br/>
      - <a href="<?php echo $folders['arearestrita'].'secao/';?>">Cadastro de Se&ccedil;&atilde;o</a><br/>
      - <a href="<?php echo $folders['arearestrita'].'sub_secao/';?>">Cadastro de Sub-Se&ccedil;&atilde;o</a><br/>
      - <a href="<?php echo $folders['arearestrita'].'arquivos/';?>">Cadastro de Arquivos</a><br/>
	  - <a href="<?php echo $folders['arearestrita'].'relatorios/';?>">Relatórios</a>
    </td>
    <td valign="top" bgcolor="#FFFFFF">
      - <a href="<?php echo $folders['parceiros'].'parceiros/';?>">Cadastro de Parceiros</a>
    </td>
  </tr>
</table>