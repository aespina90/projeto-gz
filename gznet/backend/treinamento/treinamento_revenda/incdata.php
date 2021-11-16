	<tr>
		<td bgcolor="#FFFFFF">Data do Treinamento:</td>
		<td bgcolor="#FFFFFF" colspan="3">Dia&nbsp;
		<select name="diapublicacao">
			<?php If($var_acao == "I"){ ?>
				<option value="01" <?php If(date("d") == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If(date("d") == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If(date("d") == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If(date("d") == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If(date("d") == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If(date("d") == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If(date("d") == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If(date("d") == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If(date("d") == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If(date("d") == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If(date("d") == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If(date("d") == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If(date("d") == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If(date("d") == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If(date("d") == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If(date("d") == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If(date("d") == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If(date("d") == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If(date("d") == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If(date("d") == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If(date("d") == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If(date("d") == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If(date("d") == "23"){?>selected="selected"<?}?>>23</option>
				<option value="24" <?php If(date("d") == "24"){?>selected="selected"<?}?>>24</option>
				<option value="25" <?php If(date("d") == "25"){?>selected="selected"<?}?>>25</option>
				<option value="26" <?php If(date("d") == "26"){?>selected="selected"<?}?>>26</option>
				<option value="27" <?php If(date("d") == "27"){?>selected="selected"<?}?>>27</option>
				<option value="28" <?php If(date("d") == "28"){?>selected="selected"<?}?>>28</option>
				<option value="29" <?php If(date("d") == "29"){?>selected="selected"<?}?>>29</option>
				<option value="30" <?php If(date("d") == "30"){?>selected="selected"<?}?>>30</option>
				<option value="31" <?php If(date("d") == "31"){?>selected="selected"<?}?>>31</option>
			<?php } If($var_acao == "C" || $var_acao == "A"){ ?>
				<option value="01" <?php If($var_datatreino['dia'] == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If($var_datatreino['dia'] == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If($var_datatreino['dia'] == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If($var_datatreino['dia'] == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If($var_datatreino['dia'] == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If($var_datatreino['dia'] == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If($var_datatreino['dia'] == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If($var_datatreino['dia'] == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If($var_datatreino['dia'] == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If($var_datatreino['dia'] == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If($var_datatreino['dia'] == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If($var_datatreino['dia'] == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If($var_datatreino['dia'] == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If($var_datatreino['dia'] == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If($var_datatreino['dia'] == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If($var_datatreino['dia'] == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If($var_datatreino['dia'] == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If($var_datatreino['dia'] == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If($var_datatreino['dia'] == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If($var_datatreino['dia'] == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If($var_datatreino['dia'] == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If($var_datatreino['dia'] == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If($var_datatreino['dia'] == "23"){?>selected="selected"<?}?>>23</option>
				<option value="24" <?php If($var_datatreino['dia'] == "24"){?>selected="selected"<?}?>>24</option>
				<option value="25" <?php If($var_datatreino['dia'] == "25"){?>selected="selected"<?}?>>25</option>
				<option value="26" <?php If($var_datatreino['dia'] == "26"){?>selected="selected"<?}?>>26</option>
				<option value="27" <?php If($var_datatreino['dia'] == "27"){?>selected="selected"<?}?>>27</option>
				<option value="28" <?php If($var_datatreino['dia'] == "28"){?>selected="selected"<?}?>>28</option>
				<option value="29" <?php If($var_datatreino['dia'] == "29"){?>selected="selected"<?}?>>29</option>
				<option value="30" <?php If($var_datatreino['dia'] == "30"){?>selected="selected"<?}?>>30</option>
				<option value="31" <?php If($var_datatreino['dia'] == "31"){?>selected="selected"<?}?>>31</option>
			<?php }?>
		</select>/
		<select name="mespublicacao">
			<?php If($var_acao == "I"){?>
				<option value="01" <?php If(date("m") == "01"){?>selected="selected"<?}?>>Jan</option>
				<option value="02" <?php If(date("m") == "02"){?>selected="selected"<?}?>>Fev</option>
				<option value="03" <?php If(date("m") == "03"){?>selected="selected"<?}?>>Mar</option>
				<option value="04" <?php If(date("m") == "04"){?>selected="selected"<?}?>>Abr</option>
				<option value="05" <?php If(date("m") == "05"){?>selected="selected"<?}?>>Mai</option>
				<option value="06" <?php If(date("m") == "06"){?>selected="selected"<?}?>>Jun</option>
				<option value="07" <?php If(date("m") == "07"){?>selected="selected"<?}?>>Jul</option>
				<option value="08" <?php If(date("m") == "08"){?>selected="selected"<?}?>>Ago</option>
				<option value="09" <?php If(date("m") == "09"){?>selected="selected"<?}?>>Set</option>
				<option value="10" <?php If(date("m") == "10"){?>selected="selected"<?}?>>Out</option>
				<option value="11" <?php If(date("m") == "11"){?>selected="selected"<?}?>>Nov</option>
				<option value="12" <?php If(date("m") == "12"){?>selected="selected"<?}?>>Dez</option>
			<?php } If($var_acao == "C" || $var_acao == "A"){?>
				<option value="01" <?php If($var_datatreino['mes'] == "01"){?>selected="selected"<?}?>>Jan</option>
				<option value="02" <?php If($var_datatreino['mes'] == "02"){?>selected="selected"<?}?>>Fev</option>
				<option value="03" <?php If($var_datatreino['mes'] == "03"){?>selected="selected"<?}?>>Mar</option>
				<option value="04" <?php If($var_datatreino['mes'] == "04"){?>selected="selected"<?}?>>Abr</option>
				<option value="05" <?php If($var_datatreino['mes'] == "05"){?>selected="selected"<?}?>>Mai</option>
				<option value="06" <?php If($var_datatreino['mes'] == "06"){?>selected="selected"<?}?>>Jun</option>
				<option value="07" <?php If($var_datatreino['mes'] == "07"){?>selected="selected"<?}?>>Jul</option>
				<option value="08" <?php If($var_datatreino['mes'] == "08"){?>selected="selected"<?}?>>Ago</option>
				<option value="09" <?php If($var_datatreino['mes'] == "09"){?>selected="selected"<?}?>>Set</option>
				<option value="10" <?php If($var_datatreino['mes'] == "10"){?>selected="selected"<?}?>>Out</option>
				<option value="11" <?php If($var_datatreino['mes'] == "11"){?>selected="selected"<?}?>>Nov</option>
				<option value="12" <?php If($var_datatreino['mes'] == "12"){?>selected="selected"<?}?>>Dez</option>
			<?php } ?>
		</select>/
		<select name="anopublicacao">
			<?php for($x=(date('Y')-2); $x<=(date('Y')+2) ;$x++){
					If($var_acao == "I"){ ?>
						<option value="<?php echo $x?>" <?php If(date("Y") == $x){?>selected="selected"<?}?>><?php echo $x?></option>
				<?php } If($var_acao == "C" || $var_acao == "A"){ ?>
						<option value="<?php echo $x?>" <?php If($var_datatreino['ano'] == $x){?>selected="selected"<?}?>><?php echo $x?></option>
				<?php }
			} ?>
		</select>&nbsp;&nbsp;&nbsp;Horário&nbsp;
		<select name="horapublicacao">
			<?php If($var_acao == "I"){?>
				<option value="00" <?php If(date("H") == "00"){?>selected="selected"<?}?>>00</option>
				<option value="01" <?php If(date("H") == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If(date("H") == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If(date("H") == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If(date("H") == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If(date("H") == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If(date("H") == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If(date("H") == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If(date("H") == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If(date("H") == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If(date("H") == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If(date("H") == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If(date("H") == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If(date("H") == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If(date("H") == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If(date("H") == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If(date("H") == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If(date("H") == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If(date("H") == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If(date("H") == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If(date("H") == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If(date("H") == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If(date("H") == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If(date("H") == "23"){?>selected="selected"<?}?>>23</option>
			<?php } If($var_acao == "C" || $var_acao == "A"){?>
				<option value="00" <?php If($var_datatreino['hora'] == "00"){?>selected="selected"<?}?>>00</option>
				<option value="01" <?php If($var_datatreino['hora'] == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If($var_datatreino['hora'] == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If($var_datatreino['hora'] == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If($var_datatreino['hora'] == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If($var_datatreino['hora'] == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If($var_datatreino['hora'] == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If($var_datatreino['hora'] == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If($var_datatreino['hora'] == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If($var_datatreino['hora'] == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If($var_datatreino['hora'] == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If($var_datatreino['hora'] == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If($var_datatreino['hora'] == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If($var_datatreino['hora'] == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If($var_datatreino['hora'] == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If($var_datatreino['hora'] == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If($var_datatreino['hora'] == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If($var_datatreino['hora'] == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If($var_datatreino['hora'] == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If($var_datatreino['hora'] == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If($var_datatreino['hora'] == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If($var_datatreino['hora'] == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If($var_datatreino['hora'] == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If($var_datatreino['hora'] == "23"){?>selected="selected"<?}?>>23</option>
			<?php }?>
		</select>:
		<select name="minutopublicacao">
			<?php If($var_acao == "I"){?>
				<option value="00" <?php If(date("i") == "00"){?>selected="selected"<?}?>>00</option>
				<option value="01" <?php If(date("i") == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If(date("i") == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If(date("i") == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If(date("i") == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If(date("i") == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If(date("i") == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If(date("i") == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If(date("i") == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If(date("i") == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If(date("i") == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If(date("i") == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If(date("i") == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If(date("i") == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If(date("i") == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If(date("i") == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If(date("i") == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If(date("i") == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If(date("i") == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If(date("i") == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If(date("i") == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If(date("i") == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If(date("i") == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If(date("i") == "23"){?>selected="selected"<?}?>>23</option>
				<option value="24" <?php If(date("i") == "24"){?>selected="selected"<?}?>>24</option>
				<option value="25" <?php If(date("i") == "25"){?>selected="selected"<?}?>>25</option>
				<option value="26" <?php If(date("i") == "26"){?>selected="selected"<?}?>>26</option>
				<option value="27" <?php If(date("i") == "27"){?>selected="selected"<?}?>>27</option>
				<option value="28" <?php If(date("i") == "28"){?>selected="selected"<?}?>>28</option>
				<option value="29" <?php If(date("i") == "29"){?>selected="selected"<?}?>>29</option>
				<option value="30" <?php If(date("i") == "30"){?>selected="selected"<?}?>>30</option>
				<option value="31" <?php If(date("i") == "31"){?>selected="selected"<?}?>>31</option>
				<option value="32" <?php If(date("i") == "32"){?>selected="selected"<?}?>>32</option>
				<option value="33" <?php If(date("i") == "33"){?>selected="selected"<?}?>>33</option>
				<option value="34" <?php If(date("i") == "34"){?>selected="selected"<?}?>>34</option>
				<option value="35" <?php If(date("i") == "35"){?>selected="selected"<?}?>>35</option>
				<option value="36" <?php If(date("i") == "36"){?>selected="selected"<?}?>>36</option>
				<option value="37" <?php If(date("i") == "37"){?>selected="selected"<?}?>>37</option>
				<option value="38" <?php If(date("i") == "38"){?>selected="selected"<?}?>>38</option>
				<option value="39" <?php If(date("i") == "39"){?>selected="selected"<?}?>>39</option>
				<option value="40" <?php If(date("i") == "40"){?>selected="selected"<?}?>>40</option>
				<option value="41" <?php If(date("i") == "41"){?>selected="selected"<?}?>>41</option>
				<option value="42" <?php If(date("i") == "42"){?>selected="selected"<?}?>>42</option>
				<option value="43" <?php If(date("i") == "43"){?>selected="selected"<?}?>>43</option>
				<option value="44" <?php If(date("i") == "44"){?>selected="selected"<?}?>>44</option>
				<option value="45" <?php If(date("i") == "45"){?>selected="selected"<?}?>>45</option>
				<option value="46" <?php If(date("i") == "46"){?>selected="selected"<?}?>>46</option>
				<option value="47" <?php If(date("i") == "47"){?>selected="selected"<?}?>>47</option>
				<option value="48" <?php If(date("i") == "48"){?>selected="selected"<?}?>>48</option>
				<option value="49" <?php If(date("i") == "49"){?>selected="selected"<?}?>>49</option>
				<option value="50" <?php If(date("i") == "50"){?>selected="selected"<?}?>>50</option>
				<option value="51" <?php If(date("i") == "51"){?>selected="selected"<?}?>>51</option>
				<option value="52" <?php If(date("i") == "52"){?>selected="selected"<?}?>>52</option>
				<option value="53" <?php If(date("i") == "53"){?>selected="selected"<?}?>>53</option>
				<option value="54" <?php If(date("i") == "54"){?>selected="selected"<?}?>>54</option>
				<option value="55" <?php If(date("i") == "55"){?>selected="selected"<?}?>>55</option>
				<option value="56" <?php If(date("i") == "56"){?>selected="selected"<?}?>>56</option>
				<option value="57" <?php If(date("i") == "57"){?>selected="selected"<?}?>>57</option>
				<option value="58" <?php If(date("i") == "58"){?>selected="selected"<?}?>>58</option>
				<option value="59" <?php If(date("i") == "59"){?>selected="selected"<?}?>>59</option>
			<?php } If($var_acao == "C" || $var_acao == "A"){ ?>
				<option value="00" <?php If($var_datatreino['min'] == "00"){?>selected="selected"<?}?>>00</option>
				<option value="01" <?php If($var_datatreino['min'] == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If($var_datatreino['min'] == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If($var_datatreino['min'] == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If($var_datatreino['min'] == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If($var_datatreino['min'] == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If($var_datatreino['min'] == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If($var_datatreino['min'] == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If($var_datatreino['min'] == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If($var_datatreino['min'] == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If($var_datatreino['min'] == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If($var_datatreino['min'] == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If($var_datatreino['min'] == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If($var_datatreino['min'] == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If($var_datatreino['min'] == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If($var_datatreino['min'] == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If($var_datatreino['min'] == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If($var_datatreino['min'] == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If($var_datatreino['min'] == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If($var_datatreino['min'] == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If($var_datatreino['min'] == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If($var_datatreino['min'] == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If($var_datatreino['min'] == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If($var_datatreino['min'] == "23"){?>selected="selected"<?}?>>23</option>
				<option value="24" <?php If($var_datatreino['min'] == "24"){?>selected="selected"<?}?>>24</option>
				<option value="25" <?php If($var_datatreino['min'] == "25"){?>selected="selected"<?}?>>25</option>
				<option value="26" <?php If($var_datatreino['min'] == "26"){?>selected="selected"<?}?>>26</option>
				<option value="27" <?php If($var_datatreino['min'] == "27"){?>selected="selected"<?}?>>27</option>
				<option value="28" <?php If($var_datatreino['min'] == "28"){?>selected="selected"<?}?>>28</option>
				<option value="29" <?php If($var_datatreino['min'] == "29"){?>selected="selected"<?}?>>29</option>
				<option value="30" <?php If($var_datatreino['min'] == "30"){?>selected="selected"<?}?>>30</option>
				<option value="31" <?php If($var_datatreino['min'] == "31"){?>selected="selected"<?}?>>31</option>
				<option value="32" <?php If($var_datatreino['min'] == "32"){?>selected="selected"<?}?>>32</option>
				<option value="33" <?php If($var_datatreino['min'] == "33"){?>selected="selected"<?}?>>33</option>
				<option value="34" <?php If($var_datatreino['min'] == "34"){?>selected="selected"<?}?>>34</option>
				<option value="35" <?php If($var_datatreino['min'] == "35"){?>selected="selected"<?}?>>35</option>
				<option value="36" <?php If($var_datatreino['min'] == "36"){?>selected="selected"<?}?>>36</option>
				<option value="37" <?php If($var_datatreino['min'] == "37"){?>selected="selected"<?}?>>37</option>
				<option value="38" <?php If($var_datatreino['min'] == "38"){?>selected="selected"<?}?>>38</option>
				<option value="39" <?php If($var_datatreino['min'] == "39"){?>selected="selected"<?}?>>39</option>
				<option value="40" <?php If($var_datatreino['min'] == "40"){?>selected="selected"<?}?>>40</option>
				<option value="41" <?php If($var_datatreino['min'] == "41"){?>selected="selected"<?}?>>41</option>
				<option value="42" <?php If($var_datatreino['min'] == "42"){?>selected="selected"<?}?>>42</option>
				<option value="43" <?php If($var_datatreino['min'] == "43"){?>selected="selected"<?}?>>43</option>
				<option value="44" <?php If($var_datatreino['min'] == "44"){?>selected="selected"<?}?>>44</option>
				<option value="45" <?php If($var_datatreino['min'] == "45"){?>selected="selected"<?}?>>45</option>
				<option value="46" <?php If($var_datatreino['min'] == "46"){?>selected="selected"<?}?>>46</option>
				<option value="47" <?php If($var_datatreino['min'] == "47"){?>selected="selected"<?}?>>47</option>
				<option value="48" <?php If($var_datatreino['min'] == "48"){?>selected="selected"<?}?>>48</option>
				<option value="49" <?php If($var_datatreino['min'] == "49"){?>selected="selected"<?}?>>49</option>
				<option value="50" <?php If($var_datatreino['min'] == "50"){?>selected="selected"<?}?>>50</option>
				<option value="51" <?php If($var_datatreino['min'] == "51"){?>selected="selected"<?}?>>51</option>
				<option value="52" <?php If($var_datatreino['min'] == "52"){?>selected="selected"<?}?>>52</option>
				<option value="53" <?php If($var_datatreino['min'] == "53"){?>selected="selected"<?}?>>53</option>
				<option value="54" <?php If($var_datatreino['min'] == "54"){?>selected="selected"<?}?>>54</option>
				<option value="55" <?php If($var_datatreino['min'] == "55"){?>selected="selected"<?}?>>55</option>
				<option value="56" <?php If($var_datatreino['min'] == "56"){?>selected="selected"<?}?>>56</option>
				<option value="57" <?php If($var_datatreino['min'] == "57"){?>selected="selected"<?}?>>57</option>
				<option value="58" <?php If($var_datatreino['min'] == "58"){?>selected="selected"<?}?>>58</option>
				<option value="59" <?php If($var_datatreino['min'] == "59"){?>selected="selected"<?}?>>59</option>
			<?php }?>
		</select>
		</td>
	</tr>