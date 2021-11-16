<?php
session_start();
include('../../classes/valida_cookies.inc');
include('../../classes/connect.class.php');
include('../../classes/valida_perm.inc');
?>
<html xml:lang="pt-BR" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>GZ Net - INTRANET</title>
        <style type="text/css" title="mystyles" media="all">
            body{
                background-repeat: repeat-x;
                background-color:#e5eaf0;
                font-family: arial;
                font-size: 12px;}
            .ttl_form{
                width: 90px;
                display:inline-block;
            }
            .header_form{
                background: url("../../images/fundo_indice1.png");
                height:22px;
                width: 100%;
                color:#fff;
                font-weight: bold;
                text-align: center;
                padding-bottom: -5px;
                margin-bottom:  5px;
            }
            #obs{
                float:left;
                line-height: 180%;
                width: 380px;
                height: 270px;
                border: 1px solid #AEAEAE;
                display: inline-block;
            }
            .ttl_form{
                width: 90px;
                display:inline-block;
                vertical-align: top;

            }
            input
            {
                background-color: #ececec;
                font-family: arial;
                font-size: 10pt;
                color: #000000;
                border-style:groove;
            }
            .textarea
            {
                width:240px;
                height:195px;
                background-color: #ececec;
                font-family: arial;
                font-size: 10pt;
                color: #000;
                border-style:groove;
            }
            input.checkbox{
                background-color: #ececec;
                font-family: arial;
                font-size: 10pt;
                color: #000000;
                border-style:groove;
            }
            select
            {
                background-color: #ececec;
                font-family: arial;
                font-size: 10pt;
                color: #000000;
                border-style:groove;
            }

            .ok{
                margin-left:90px;
            }
        </style>

    </head>
    <form action="model_relatorio.php" method="POST">
        <div id="obs">
            <div class="header_form"> Observação </div>
            <div class="ttl_form">*Código:</div><input name="cod1" type="text" id="cod1" size="10"></input><br />
            <div class="ttl_form">*Obs</div><textarea cols="30" rows="20"  class="textarea" name="obs1" id="obs1"></textarea>
            <br />
            <input class="ok" type=submit value="OK"></input>
        </div>
    </form>
</html>