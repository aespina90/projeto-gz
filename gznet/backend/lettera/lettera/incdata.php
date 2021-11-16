	<tr>
		<td bgcolor="#FFFFFF">Data Publicação:</td>
		<td bgcolor="#FFFFFF" colspan="3">
		<select name="diapublicacao">
			<?php If ($var_acao == "I"){?>
				<option value="01" <?php If (date("d") == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If (date("d") == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If (date("d") == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If (date("d") == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If (date("d") == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If (date("d") == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If (date("d") == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If (date("d") == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If (date("d") == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If (date("d") == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If (date("d") == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If (date("d") == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If (date("d") == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If (date("d") == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If (date("d") == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If (date("d") == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If (date("d") == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If (date("d") == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If (date("d") == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If (date("d") == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If (date("d") == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If (date("d") == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If (date("d") == "23"){?>selected="selected"<?}?>>23</option>
				<option value="24" <?php If (date("d") == "24"){?>selected="selected"<?}?>>24</option>
				<option value="25" <?php If (date("d") == "25"){?>selected="selected"<?}?>>25</option>
				<option value="26" <?php If (date("d") == "26"){?>selected="selected"<?}?>>26</option>
				<option value="27" <?php If (date("d") == "27"){?>selected="selected"<?}?>>27</option>
				<option value="28" <?php If (date("d") == "28"){?>selected="selected"<?}?>>28</option>
				<option value="29" <?php If (date("d") == "29"){?>selected="selected"<?}?>>29</option>
				<option value="30" <?php If (date("d") == "30"){?>selected="selected"<?}?>>30</option>
				<option value="31" <?php If (date("d") == "31"){?>selected="selected"<?}?>>31</option>
			<?php }
			If ($var_acao == "C" || $var_acao == "A"){?>
				<option value="01" <?php If ($var_datapublicacao['dia'] == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If ($var_datapublicacao['dia'] == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If ($var_datapublicacao['dia'] == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If ($var_datapublicacao['dia'] == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If ($var_datapublicacao['dia'] == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If ($var_datapublicacao['dia'] == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If ($var_datapublicacao['dia'] == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If ($var_datapublicacao['dia'] == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If ($var_datapublicacao['dia'] == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If ($var_datapublicacao['dia'] == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If ($var_datapublicacao['dia'] == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If ($var_datapublicacao['dia'] == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If ($var_datapublicacao['dia'] == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If ($var_datapublicacao['dia'] == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If ($var_datapublicacao['dia'] == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If ($var_datapublicacao['dia'] == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If ($var_datapublicacao['dia'] == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If ($var_datapublicacao['dia'] == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If ($var_datapublicacao['dia'] == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If ($var_datapublicacao['dia'] == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If ($var_datapublicacao['dia'] == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If ($var_datapublicacao['dia'] == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If ($var_datapublicacao['dia'] == "23"){?>selected="selected"<?}?>>23</option>
				<option value="24" <?php If ($var_datapublicacao['dia'] == "24"){?>selected="selected"<?}?>>24</option>
				<option value="25" <?php If ($var_datapublicacao['dia'] == "25"){?>selected="selected"<?}?>>25</option>
				<option value="26" <?php If ($var_datapublicacao['dia'] == "26"){?>selected="selected"<?}?>>26</option>
				<option value="27" <?php If ($var_datapublicacao['dia'] == "27"){?>selected="selected"<?}?>>27</option>
				<option value="28" <?php If ($var_datapublicacao['dia'] == "28"){?>selected="selected"<?}?>>28</option>
				<option value="29" <?php If ($var_datapublicacao['dia'] == "29"){?>selected="selected"<?}?>>29</option>
				<option value="30" <?php If ($var_datapublicacao['dia'] == "30"){?>selected="selected"<?}?>>30</option>
				<option value="31" <?php If ($var_datapublicacao['dia'] == "31"){?>selected="selected"<?}?>>31</option>
		<?php }?>
		</select>/
		<select name="mespublicacao">
			<?php If ($var_acao == "I"){?>
				<option value="01" <?php If (date("m") == "01"){?>selected="selected"<?}?>>Jan</option>
				<option value="02" <?php If (date("m") == "02"){?>selected="selected"<?}?>>Fev</option>
				<option value="03" <?php If (date("m") == "03"){?>selected="selected"<?}?>>Mar</option>
				<option value="04" <?php If (date("m") == "04"){?>selected="selected"<?}?>>Abr</option>
				<option value="05" <?php If (date("m") == "05"){?>selected="selected"<?}?>>Mai</option>
				<option value="06" <?php If (date("m") == "06"){?>selected="selected"<?}?>>Jun</option>
				<option value="07" <?php If (date("m") == "07"){?>selected="selected"<?}?>>Jul</option>
				<option value="08" <?php If (date("m") == "08"){?>selected="selected"<?}?>>Ago</option>
				<option value="09" <?php If (date("m") == "09"){?>selected="selected"<?}?>>Set</option>
				<option value="10" <?php If (date("m") == "10"){?>selected="selected"<?}?>>Out</option>
				<option value="11" <?php If (date("m") == "11"){?>selected="selected"<?}?>>Nov</option>
				<option value="12" <?php If (date("m") == "12"){?>selected="selected"<?}?>>Dez</option>
			<?php }
			If ($var_acao == "C" || $var_acao == "A"){?>
				<option value="01" <?php If ($var_datapublicacao['mes'] == "01"){?>selected="selected"<?}?>>Jan</option>
				<option value="02" <?php If ($var_datapublicacao['mes'] == "02"){?>selected="selected"<?}?>>Fev</option>
				<option value="03" <?php If ($var_datapublicacao['mes'] == "03"){?>selected="selected"<?}?>>Mar</option>
				<option value="04" <?php If ($var_datapublicacao['mes'] == "04"){?>selected="selected"<?}?>>Abr</option>
				<option value="05" <?php If ($var_datapublicacao['mes'] == "05"){?>selected="selected"<?}?>>Mai</option>
				<option value="06" <?php If ($var_datapublicacao['mes'] == "06"){?>selected="selected"<?}?>>Jun</option>
				<option value="07" <?php If ($var_datapublicacao['mes'] == "07"){?>selected="selected"<?}?>>Jul</option>
				<option value="08" <?php If ($var_datapublicacao['mes'] == "08"){?>selected="selected"<?}?>>Ago</option>
				<option value="09" <?php If ($var_datapublicacao['mes'] == "09"){?>selected="selected"<?}?>>Set</option>
				<option value="10" <?php If ($var_datapublicacao['mes'] == "10"){?>selected="selected"<?}?>>Out</option>
				<option value="11" <?php If ($var_datapublicacao['mes'] == "11"){?>selected="selected"<?}?>>Nov</option>
				<option value="12" <?php If ($var_datapublicacao['mes'] == "12"){?>selected="selected"<?}?>>Dez</option>
			<?php } ?>
		</select>/
		<select name="anopublicacao">
			<?php for ($x=(date('Y')-2); $x<=(date('Y')+2) ; $x++){
					If ($var_acao == "I"){?>
						<option value="<?=$x?>" <?php If (date("Y") == $x){?>selected="selected"<?}?>><?=$x?></option>
				<?php }
					If ($var_acao == "C" || $var_acao == "A"){?>
						<option value="<?=$x?>" <?php If ($var_datapublicacao['ano'] == $x){?>selected="selected"<?}?>><?=$x?></option>
				<?php }
			} ?>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="horapublicacao">
			<?php If ($var_acao == "I"){?>
				<option value="00" <?php If (date("H") == "00"){?>selected="selected"<?}?>>00</option>
				<option value="01" <?php If (date("H") == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If (date("H") == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If (date("H") == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If (date("H") == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If (date("H") == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If (date("H") == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If (date("H") == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If (date("H") == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If (date("H") == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If (date("H") == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If (date("H") == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If (date("H") == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If (date("H") == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If (date("H") == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If (date("H") == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If (date("H") == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If (date("H") == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If (date("H") == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If (date("H") == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If (date("H") == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If (date("H") == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If (date("H") == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If (date("H") == "23"){?>selected="selected"<?}?>>23</option>
			<?php }
			If ($var_acao == "C" || $var_acao == "A"){?>
				<option value="00" <?php If ($var_datapublicacao['hora'] == "00"){?>selected="selected"<?}?>>00</option>
				<option value="01" <?php If ($var_datapublicacao['hora'] == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If ($var_datapublicacao['hora'] == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If ($var_datapublicacao['hora'] == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If ($var_datapublicacao['hora'] == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If ($var_datapublicacao['hora'] == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If ($var_datapublicacao['hora'] == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If ($var_datapublicacao['hora'] == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If ($var_datapublicacao['hora'] == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If ($var_datapublicacao['hora'] == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If ($var_datapublicacao['hora'] == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If ($var_datapublicacao['hora'] == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If ($var_datapublicacao['hora'] == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If ($var_datapublicacao['hora'] == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If ($var_datapublicacao['hora'] == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If ($var_datapublicacao['hora'] == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If ($var_datapublicacao['hora'] == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If ($var_datapublicacao['hora'] == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If ($var_datapublicacao['hora'] == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If ($var_datapublicacao['hora'] == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If ($var_datapublicacao['hora'] == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If ($var_datapublicacao['hora'] == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If ($var_datapublicacao['hora'] == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If ($var_datapublicacao['hora'] == "23"){?>selected="selected"<?}?>>23</option>
			<?php }?>
		</select>:
		<select name="minutopublicacao">
			<?php If ($var_acao == "I"){?>
				<option value="00" <?php If (date("i") == "00"){?>selected="selected"<?}?>>00</option>
				<option value="01" <?php If (date("i") == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If (date("i") == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If (date("i") == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If (date("i") == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If (date("i") == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If (date("i") == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If (date("i") == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If (date("i") == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If (date("i") == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If (date("i") == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If (date("i") == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If (date("i") == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If (date("i") == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If (date("i") == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If (date("i") == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If (date("i") == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If (date("i") == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If (date("i") == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If (date("i") == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If (date("i") == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If (date("i") == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If (date("i") == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If (date("i") == "23"){?>selected="selected"<?}?>>23</option>
				<option value="24" <?php If (date("i") == "24"){?>selected="selected"<?}?>>24</option>
				<option value="25" <?php If (date("i") == "25"){?>selected="selected"<?}?>>25</option>
				<option value="26" <?php If (date("i") == "26"){?>selected="selected"<?}?>>26</option>
				<option value="27" <?php If (date("i") == "27"){?>selected="selected"<?}?>>27</option>
				<option value="28" <?php If (date("i") == "28"){?>selected="selected"<?}?>>28</option>
				<option value="29" <?php If (date("i") == "29"){?>selected="selected"<?}?>>29</option>
				<option value="30" <?php If (date("i") == "30"){?>selected="selected"<?}?>>30</option>
				<option value="31" <?php If (date("i") == "31"){?>selected="selected"<?}?>>31</option>
				<option value="32" <?php If (date("i") == "32"){?>selected="selected"<?}?>>32</option>
				<option value="33" <?php If (date("i") == "33"){?>selected="selected"<?}?>>33</option>
				<option value="34" <?php If (date("i") == "34"){?>selected="selected"<?}?>>34</option>
				<option value="35" <?php If (date("i") == "35"){?>selected="selected"<?}?>>35</option>
				<option value="36" <?php If (date("i") == "36"){?>selected="selected"<?}?>>36</option>
				<option value="37" <?php If (date("i") == "37"){?>selected="selected"<?}?>>37</option>
				<option value="38" <?php If (date("i") == "38"){?>selected="selected"<?}?>>38</option>
				<option value="39" <?php If (date("i") == "39"){?>selected="selected"<?}?>>39</option>
				<option value="40" <?php If (date("i") == "40"){?>selected="selected"<?}?>>40</option>
				<option value="41" <?php If (date("i") == "41"){?>selected="selected"<?}?>>41</option>
				<option value="42" <?php If (date("i") == "42"){?>selected="selected"<?}?>>42</option>
				<option value="43" <?php If (date("i") == "43"){?>selected="selected"<?}?>>43</option>
				<option value="44" <?php If (date("i") == "44"){?>selected="selected"<?}?>>44</option>
				<option value="45" <?php If (date("i") == "45"){?>selected="selected"<?}?>>45</option>
				<option value="46" <?php If (date("i") == "46"){?>selected="selected"<?}?>>46</option>
				<option value="47" <?php If (date("i") == "47"){?>selected="selected"<?}?>>47</option>
				<option value="48" <?php If (date("i") == "48"){?>selected="selected"<?}?>>48</option>
				<option value="49" <?php If (date("i") == "49"){?>selected="selected"<?}?>>49</option>
				<option value="50" <?php If (date("i") == "50"){?>selected="selected"<?}?>>50</option>
				<option value="51" <?php If (date("i") == "51"){?>selected="selected"<?}?>>51</option>
				<option value="52" <?php If (date("i") == "52"){?>selected="selected"<?}?>>52</option>
				<option value="53" <?php If (date("i") == "53"){?>selected="selected"<?}?>>53</option>
				<option value="54" <?php If (date("i") == "54"){?>selected="selected"<?}?>>54</option>
				<option value="55" <?php If (date("i") == "55"){?>selected="selected"<?}?>>55</option>
				<option value="56" <?php If (date("i") == "56"){?>selected="selected"<?}?>>56</option>
				<option value="57" <?php If (date("i") == "57"){?>selected="selected"<?}?>>57</option>
				<option value="58" <?php If (date("i") == "58"){?>selected="selected"<?}?>>58</option>
				<option value="59" <?php If (date("i") == "59"){?>selected="selected"<?}?>>59</option>
			<?php }
			If ($var_acao == "C" || $var_acao == "A"){?>
				<option value="00" <?php If ($var_datapublicacao['min'] == "00"){?>selected="selected"<?}?>>00</option>
				<option value="01" <?php If ($var_datapublicacao['min'] == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If ($var_datapublicacao['min'] == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If ($var_datapublicacao['min'] == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If ($var_datapublicacao['min'] == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If ($var_datapublicacao['min'] == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If ($var_datapublicacao['min'] == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If ($var_datapublicacao['min'] == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If ($var_datapublicacao['min'] == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If ($var_datapublicacao['min'] == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If ($var_datapublicacao['min'] == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If ($var_datapublicacao['min'] == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If ($var_datapublicacao['min'] == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If ($var_datapublicacao['min'] == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If ($var_datapublicacao['min'] == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If ($var_datapublicacao['min'] == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If ($var_datapublicacao['min'] == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If ($var_datapublicacao['min'] == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If ($var_datapublicacao['min'] == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If ($var_datapublicacao['min'] == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If ($var_datapublicacao['min'] == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If ($var_datapublicacao['min'] == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If ($var_datapublicacao['min'] == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If ($var_datapublicacao['min'] == "23"){?>selected="selected"<?}?>>23</option>
				<option value="24" <?php If ($var_datapublicacao['min'] == "24"){?>selected="selected"<?}?>>24</option>
				<option value="25" <?php If ($var_datapublicacao['min'] == "25"){?>selected="selected"<?}?>>25</option>
				<option value="26" <?php If ($var_datapublicacao['min'] == "26"){?>selected="selected"<?}?>>26</option>
				<option value="27" <?php If ($var_datapublicacao['min'] == "27"){?>selected="selected"<?}?>>27</option>
				<option value="28" <?php If ($var_datapublicacao['min'] == "28"){?>selected="selected"<?}?>>28</option>
				<option value="29" <?php If ($var_datapublicacao['min'] == "29"){?>selected="selected"<?}?>>29</option>
				<option value="30" <?php If ($var_datapublicacao['min'] == "30"){?>selected="selected"<?}?>>30</option>
				<option value="31" <?php If ($var_datapublicacao['min'] == "31"){?>selected="selected"<?}?>>31</option>
				<option value="32" <?php If ($var_datapublicacao['min'] == "32"){?>selected="selected"<?}?>>32</option>
				<option value="33" <?php If ($var_datapublicacao['min'] == "33"){?>selected="selected"<?}?>>33</option>
				<option value="34" <?php If ($var_datapublicacao['min'] == "34"){?>selected="selected"<?}?>>34</option>
				<option value="35" <?php If ($var_datapublicacao['min'] == "35"){?>selected="selected"<?}?>>35</option>
				<option value="36" <?php If ($var_datapublicacao['min'] == "36"){?>selected="selected"<?}?>>36</option>
				<option value="37" <?php If ($var_datapublicacao['min'] == "37"){?>selected="selected"<?}?>>37</option>
				<option value="38" <?php If ($var_datapublicacao['min'] == "38"){?>selected="selected"<?}?>>38</option>
				<option value="39" <?php If ($var_datapublicacao['min'] == "39"){?>selected="selected"<?}?>>39</option>
				<option value="40" <?php If ($var_datapublicacao['min'] == "40"){?>selected="selected"<?}?>>40</option>
				<option value="41" <?php If ($var_datapublicacao['min'] == "41"){?>selected="selected"<?}?>>41</option>
				<option value="42" <?php If ($var_datapublicacao['min'] == "42"){?>selected="selected"<?}?>>42</option>
				<option value="43" <?php If ($var_datapublicacao['min'] == "43"){?>selected="selected"<?}?>>43</option>
				<option value="44" <?php If ($var_datapublicacao['min'] == "44"){?>selected="selected"<?}?>>44</option>
				<option value="45" <?php If ($var_datapublicacao['min'] == "45"){?>selected="selected"<?}?>>45</option>
				<option value="46" <?php If ($var_datapublicacao['min'] == "46"){?>selected="selected"<?}?>>46</option>
				<option value="47" <?php If ($var_datapublicacao['min'] == "47"){?>selected="selected"<?}?>>47</option>
				<option value="48" <?php If ($var_datapublicacao['min'] == "48"){?>selected="selected"<?}?>>48</option>
				<option value="49" <?php If ($var_datapublicacao['min'] == "49"){?>selected="selected"<?}?>>49</option>
				<option value="50" <?php If ($var_datapublicacao['min'] == "50"){?>selected="selected"<?}?>>50</option>
				<option value="51" <?php If ($var_datapublicacao['min'] == "51"){?>selected="selected"<?}?>>51</option>
				<option value="52" <?php If ($var_datapublicacao['min'] == "52"){?>selected="selected"<?}?>>52</option>
				<option value="53" <?php If ($var_datapublicacao['min'] == "53"){?>selected="selected"<?}?>>53</option>
				<option value="54" <?php If ($var_datapublicacao['min'] == "54"){?>selected="selected"<?}?>>54</option>
				<option value="55" <?php If ($var_datapublicacao['min'] == "55"){?>selected="selected"<?}?>>55</option>
				<option value="56" <?php If ($var_datapublicacao['min'] == "56"){?>selected="selected"<?}?>>56</option>
				<option value="57" <?php If ($var_datapublicacao['min'] == "57"){?>selected="selected"<?}?>>57</option>
				<option value="58" <?php If ($var_datapublicacao['min'] == "58"){?>selected="selected"<?}?>>58</option>
				<option value="59" <?php If ($var_datapublicacao['min'] == "59"){?>selected="selected"<?}?>>59</option>
			<?php }?>
		</select>
		</td>
		</tr>
		<tr id="l_data_expiracao">
		<td bgcolor="#FFFFFF">Data Expiração:</td>
		<td bgcolor="#FFFFFF" colspan="3">
		<select name="diaexpiracao">
			<?php If ($var_acao == "I"){?>
				<option value="01" <?php If (date("d") == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If (date("d") == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If (date("d") == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If (date("d") == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If (date("d") == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If (date("d") == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If (date("d") == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If (date("d") == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If (date("d") == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If (date("d") == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If (date("d") == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If (date("d") == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If (date("d") == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If (date("d") == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If (date("d") == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If (date("d") == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If (date("d") == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If (date("d") == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If (date("d") == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If (date("d") == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If (date("d") == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If (date("d") == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If (date("d") == "23"){?>selected="selected"<?}?>>23</option>
				<option value="24" <?php If (date("d") == "24"){?>selected="selected"<?}?>>24</option>
				<option value="25" <?php If (date("d") == "25"){?>selected="selected"<?}?>>25</option>
				<option value="26" <?php If (date("d") == "26"){?>selected="selected"<?}?>>26</option>
				<option value="27" <?php If (date("d") == "27"){?>selected="selected"<?}?>>27</option>
				<option value="28" <?php If (date("d") == "28"){?>selected="selected"<?}?>>28</option>
				<option value="29" <?php If (date("d") == "29"){?>selected="selected"<?}?>>29</option>
				<option value="30" <?php If (date("d") == "30"){?>selected="selected"<?}?>>30</option>
				<option value="31" <?php If (date("d") == "31"){?>selected="selected"<?}?>>31</option>
			<?php }
			If ($var_acao == "C" || $var_acao == "A"){?>
				<option value="01" <?php If ($var_dataexpiracao['dia'] == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If ($var_dataexpiracao['dia'] == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If ($var_dataexpiracao['dia'] == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If ($var_dataexpiracao['dia'] == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If ($var_dataexpiracao['dia'] == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If ($var_dataexpiracao['dia'] == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If ($var_dataexpiracao['dia'] == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If ($var_dataexpiracao['dia'] == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If ($var_dataexpiracao['dia'] == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If ($var_dataexpiracao['dia'] == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If ($var_dataexpiracao['dia'] == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If ($var_dataexpiracao['dia'] == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If ($var_dataexpiracao['dia'] == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If ($var_dataexpiracao['dia'] == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If ($var_dataexpiracao['dia'] == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If ($var_dataexpiracao['dia'] == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If ($var_dataexpiracao['dia'] == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If ($var_dataexpiracao['dia'] == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If ($var_dataexpiracao['dia'] == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If ($var_dataexpiracao['dia'] == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If ($var_dataexpiracao['dia'] == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If ($var_dataexpiracao['dia'] == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If ($var_dataexpiracao['dia'] == "23"){?>selected="selected"<?}?>>23</option>
				<option value="24" <?php If ($var_dataexpiracao['dia'] == "24"){?>selected="selected"<?}?>>24</option>
				<option value="25" <?php If ($var_dataexpiracao['dia'] == "25"){?>selected="selected"<?}?>>25</option>
				<option value="26" <?php If ($var_dataexpiracao['dia'] == "26"){?>selected="selected"<?}?>>26</option>
				<option value="27" <?php If ($var_dataexpiracao['dia'] == "27"){?>selected="selected"<?}?>>27</option>
				<option value="28" <?php If ($var_dataexpiracao['dia'] == "28"){?>selected="selected"<?}?>>28</option>
				<option value="29" <?php If ($var_dataexpiracao['dia'] == "29"){?>selected="selected"<?}?>>29</option>
				<option value="30" <?php If ($var_dataexpiracao['dia'] == "30"){?>selected="selected"<?}?>>30</option>
				<option value="31" <?php If ($var_dataexpiracao['dia'] == "31"){?>selected="selected"<?}?>>31</option>
		<?php }?>
		</select>/
		<select name="mesexpiracao">
			<?php If ($var_acao == "I"){?>
				<option value="01" <?php If ((date("m")+2) == "01"){?>selected="selected"<?}?>>Jan</option>
				<option value="02" <?php If ((date("m")+2) == "02"){?>selected="selected"<?}?>>Fev</option>
				<option value="03" <?php If ((date("m")+2) == "03"){?>selected="selected"<?}?>>Mar</option>
				<option value="04" <?php If ((date("m")+2) == "04"){?>selected="selected"<?}?>>Abr</option>
				<option value="05" <?php If ((date("m")+2) == "05"){?>selected="selected"<?}?>>Mai</option>
				<option value="06" <?php If ((date("m")+2) == "06"){?>selected="selected"<?}?>>Jun</option>
				<option value="07" <?php If ((date("m")+2) == "07"){?>selected="selected"<?}?>>Jul</option>
				<option value="08" <?php If ((date("m")+2) == "08"){?>selected="selected"<?}?>>Ago</option>
				<option value="09" <?php If ((date("m")+2) == "09"){?>selected="selected"<?}?>>Set</option>
				<option value="10" <?php If ((date("m")+2) == "10"){?>selected="selected"<?}?>>Out</option>
				<option value="11" <?php If ((date("m")+2) == "11"){?>selected="selected"<?}?>>Nov</option>
				<option value="12" <?php If ((date("m")+2) == "12"){?>selected="selected"<?}?>>Dez</option>
			<?php }
			If ($var_acao == "C" || $var_acao == "A"){?>
				<option value="01" <?php If ($var_dataexpiracao['mes'] == "01"){?>selected="selected"<?}?>>Jan</option>
				<option value="02" <?php If ($var_dataexpiracao['mes'] == "02"){?>selected="selected"<?}?>>Fev</option>
				<option value="03" <?php If ($var_dataexpiracao['mes'] == "03"){?>selected="selected"<?}?>>Mar</option>
				<option value="04" <?php If ($var_dataexpiracao['mes'] == "04"){?>selected="selected"<?}?>>Abr</option>
				<option value="05" <?php If ($var_dataexpiracao['mes'] == "05"){?>selected="selected"<?}?>>Mai</option>
				<option value="06" <?php If ($var_dataexpiracao['mes'] == "06"){?>selected="selected"<?}?>>Jun</option>
				<option value="07" <?php If ($var_dataexpiracao['mes'] == "07"){?>selected="selected"<?}?>>Jul</option>
				<option value="08" <?php If ($var_dataexpiracao['mes'] == "08"){?>selected="selected"<?}?>>Ago</option>
				<option value="09" <?php If ($var_dataexpiracao['mes'] == "09"){?>selected="selected"<?}?>>Set</option>
				<option value="10" <?php If ($var_dataexpiracao['mes'] == "10"){?>selected="selected"<?}?>>Out</option>
				<option value="11" <?php If ($var_dataexpiracao['mes'] == "11"){?>selected="selected"<?}?>>Nov</option>
				<option value="12" <?php If ($var_dataexpiracao['mes'] == "12"){?>selected="selected"<?}?>>Dez</option>
			<?php } ?>
		</select>/
		<select name="anoexpiracao">
			<?php for ($x=(date('Y')-2); $x<=(date('Y')+2) ; $x++){
					If ($var_acao == "I" && date("m") != 12){?>
						<option value="<?=$x?>" <?php If (date("Y")  == $x){?>selected="selected"<?}?>><?=$x?></option>
				<?php }
					ElseIf ($var_acao == "I" && date("m") == 12){
					?>
					<option value="<?=$x?>" <?php If ( (date("Y")+1)  == $x){?>selected="selected"<?}?>><?=$x?></option>
					<?php
					}
					If ($var_acao == "C" || $var_acao == "A"){?>
						<option value="<?=$x?>" <?php If ($var_dataexpiracao['ano'] == $x){?>selected="selected"<?}?>><?=$x?></option>
				<?php }
			} ?>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="horaexpiracao">
			<?php If ($var_acao == "I"){?>
				<option value="00" <?php If (date("H") == "00"){?>selected="selected"<?}?>>00</option>
				<option value="01" <?php If (date("H") == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If (date("H") == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If (date("H") == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If (date("H") == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If (date("H") == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If (date("H") == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If (date("H") == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If (date("H") == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If (date("H") == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If (date("H") == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If (date("H") == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If (date("H") == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If (date("H") == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If (date("H") == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If (date("H") == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If (date("H") == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If (date("H") == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If (date("H") == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If (date("H") == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If (date("H") == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If (date("H") == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If (date("H") == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If (date("H") == "23"){?>selected="selected"<?}?>>23</option>
			<?php }
			If ($var_acao == "C" || $var_acao == "A"){?>
				<option value="00" <?php If ($var_dataexpiracao['hora'] == "00"){?>selected="selected"<?}?>>00</option>
				<option value="01" <?php If ($var_dataexpiracao['hora'] == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If ($var_dataexpiracao['hora'] == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If ($var_dataexpiracao['hora'] == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If ($var_dataexpiracao['hora'] == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If ($var_dataexpiracao['hora'] == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If ($var_dataexpiracao['hora'] == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If ($var_dataexpiracao['hora'] == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If ($var_dataexpiracao['hora'] == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If ($var_dataexpiracao['hora'] == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If ($var_dataexpiracao['hora'] == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If ($var_dataexpiracao['hora'] == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If ($var_dataexpiracao['hora'] == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If ($var_dataexpiracao['hora'] == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If ($var_dataexpiracao['hora'] == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If ($var_dataexpiracao['hora'] == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If ($var_dataexpiracao['hora'] == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If ($var_dataexpiracao['hora'] == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If ($var_dataexpiracao['hora'] == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If ($var_dataexpiracao['hora'] == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If ($var_dataexpiracao['hora'] == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If ($var_dataexpiracao['hora'] == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If ($var_dataexpiracao['hora'] == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If ($var_dataexpiracao['hora'] == "23"){?>selected="selected"<?}?>>23</option>
			<?php }?>
		</select>:
		<select name="minutoexpiracao">
			<?php If ($var_acao == "I"){?>
				<option value="00" <?php If (date("i") == "00"){?>selected="selected"<?}?>>00</option>
				<option value="01" <?php If (date("i") == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If (date("i") == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If (date("i") == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If (date("i") == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If (date("i") == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If (date("i") == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If (date("i") == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If (date("i") == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If (date("i") == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If (date("i") == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If (date("i") == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If (date("i") == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If (date("i") == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If (date("i") == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If (date("i") == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If (date("i") == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If (date("i") == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If (date("i") == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If (date("i") == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If (date("i") == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If (date("i") == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If (date("i") == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If (date("i") == "23"){?>selected="selected"<?}?>>23</option>
				<option value="24" <?php If (date("i") == "24"){?>selected="selected"<?}?>>24</option>
				<option value="25" <?php If (date("i") == "25"){?>selected="selected"<?}?>>25</option>
				<option value="26" <?php If (date("i") == "26"){?>selected="selected"<?}?>>26</option>
				<option value="27" <?php If (date("i") == "27"){?>selected="selected"<?}?>>27</option>
				<option value="28" <?php If (date("i") == "28"){?>selected="selected"<?}?>>28</option>
				<option value="29" <?php If (date("i") == "29"){?>selected="selected"<?}?>>29</option>
				<option value="30" <?php If (date("i") == "30"){?>selected="selected"<?}?>>30</option>
				<option value="31" <?php If (date("i") == "31"){?>selected="selected"<?}?>>31</option>
				<option value="32" <?php If (date("i") == "32"){?>selected="selected"<?}?>>32</option>
				<option value="33" <?php If (date("i") == "33"){?>selected="selected"<?}?>>33</option>
				<option value="34" <?php If (date("i") == "34"){?>selected="selected"<?}?>>34</option>
				<option value="35" <?php If (date("i") == "35"){?>selected="selected"<?}?>>35</option>
				<option value="36" <?php If (date("i") == "36"){?>selected="selected"<?}?>>36</option>
				<option value="37" <?php If (date("i") == "37"){?>selected="selected"<?}?>>37</option>
				<option value="38" <?php If (date("i") == "38"){?>selected="selected"<?}?>>38</option>
				<option value="39" <?php If (date("i") == "39"){?>selected="selected"<?}?>>39</option>
				<option value="40" <?php If (date("i") == "40"){?>selected="selected"<?}?>>40</option>
				<option value="41" <?php If (date("i") == "41"){?>selected="selected"<?}?>>41</option>
				<option value="42" <?php If (date("i") == "42"){?>selected="selected"<?}?>>42</option>
				<option value="43" <?php If (date("i") == "43"){?>selected="selected"<?}?>>43</option>
				<option value="44" <?php If (date("i") == "44"){?>selected="selected"<?}?>>44</option>
				<option value="45" <?php If (date("i") == "45"){?>selected="selected"<?}?>>45</option>
				<option value="46" <?php If (date("i") == "46"){?>selected="selected"<?}?>>46</option>
				<option value="47" <?php If (date("i") == "47"){?>selected="selected"<?}?>>47</option>
				<option value="48" <?php If (date("i") == "48"){?>selected="selected"<?}?>>48</option>
				<option value="49" <?php If (date("i") == "49"){?>selected="selected"<?}?>>49</option>
				<option value="50" <?php If (date("i") == "50"){?>selected="selected"<?}?>>50</option>
				<option value="51" <?php If (date("i") == "51"){?>selected="selected"<?}?>>51</option>
				<option value="52" <?php If (date("i") == "52"){?>selected="selected"<?}?>>52</option>
				<option value="53" <?php If (date("i") == "53"){?>selected="selected"<?}?>>53</option>
				<option value="54" <?php If (date("i") == "54"){?>selected="selected"<?}?>>54</option>
				<option value="55" <?php If (date("i") == "55"){?>selected="selected"<?}?>>55</option>
				<option value="56" <?php If (date("i") == "56"){?>selected="selected"<?}?>>56</option>
				<option value="57" <?php If (date("i") == "57"){?>selected="selected"<?}?>>57</option>
				<option value="58" <?php If (date("i") == "58"){?>selected="selected"<?}?>>58</option>
				<option value="59" <?php If (date("i") == "59"){?>selected="selected"<?}?>>59</option>
			<?php }
			If ($var_acao == "C" || $var_acao == "A"){?>
				<option value="00" <?php If ($var_dataexpiracao['min'] == "00"){?>selected="selected"<?}?>>00</option>
				<option value="01" <?php If ($var_dataexpiracao['min'] == "01"){?>selected="selected"<?}?>>01</option>
				<option value="02" <?php If ($var_dataexpiracao['min'] == "02"){?>selected="selected"<?}?>>02</option>
				<option value="03" <?php If ($var_dataexpiracao['min'] == "03"){?>selected="selected"<?}?>>03</option>
				<option value="04" <?php If ($var_dataexpiracao['min'] == "04"){?>selected="selected"<?}?>>04</option>
				<option value="05" <?php If ($var_dataexpiracao['min'] == "05"){?>selected="selected"<?}?>>05</option>
				<option value="06" <?php If ($var_dataexpiracao['min'] == "06"){?>selected="selected"<?}?>>06</option>
				<option value="07" <?php If ($var_dataexpiracao['min'] == "07"){?>selected="selected"<?}?>>07</option>
				<option value="08" <?php If ($var_dataexpiracao['min'] == "08"){?>selected="selected"<?}?>>08</option>
				<option value="09" <?php If ($var_dataexpiracao['min'] == "09"){?>selected="selected"<?}?>>09</option>
				<option value="10" <?php If ($var_dataexpiracao['min'] == "10"){?>selected="selected"<?}?>>10</option>
				<option value="11" <?php If ($var_dataexpiracao['min'] == "11"){?>selected="selected"<?}?>>11</option>
				<option value="12" <?php If ($var_dataexpiracao['min'] == "12"){?>selected="selected"<?}?>>12</option>
				<option value="13" <?php If ($var_dataexpiracao['min'] == "13"){?>selected="selected"<?}?>>13</option>
				<option value="14" <?php If ($var_dataexpiracao['min'] == "14"){?>selected="selected"<?}?>>14</option>
				<option value="15" <?php If ($var_dataexpiracao['min'] == "15"){?>selected="selected"<?}?>>15</option>
				<option value="16" <?php If ($var_dataexpiracao['min'] == "16"){?>selected="selected"<?}?>>16</option>
				<option value="17" <?php If ($var_dataexpiracao['min'] == "17"){?>selected="selected"<?}?>>17</option>
				<option value="18" <?php If ($var_dataexpiracao['min'] == "18"){?>selected="selected"<?}?>>18</option>
				<option value="19" <?php If ($var_dataexpiracao['min'] == "19"){?>selected="selected"<?}?>>19</option>
				<option value="20" <?php If ($var_dataexpiracao['min'] == "20"){?>selected="selected"<?}?>>20</option>
				<option value="21" <?php If ($var_dataexpiracao['min'] == "21"){?>selected="selected"<?}?>>21</option>
				<option value="22" <?php If ($var_dataexpiracao['min'] == "22"){?>selected="selected"<?}?>>22</option>
				<option value="23" <?php If ($var_dataexpiracao['min'] == "23"){?>selected="selected"<?}?>>23</option>
				<option value="24" <?php If ($var_dataexpiracao['min'] == "24"){?>selected="selected"<?}?>>24</option>
				<option value="25" <?php If ($var_dataexpiracao['min'] == "25"){?>selected="selected"<?}?>>25</option>
				<option value="26" <?php If ($var_dataexpiracao['min'] == "26"){?>selected="selected"<?}?>>26</option>
				<option value="27" <?php If ($var_dataexpiracao['min'] == "27"){?>selected="selected"<?}?>>27</option>
				<option value="28" <?php If ($var_dataexpiracao['min'] == "28"){?>selected="selected"<?}?>>28</option>
				<option value="29" <?php If ($var_dataexpiracao['min'] == "29"){?>selected="selected"<?}?>>29</option>
				<option value="30" <?php If ($var_dataexpiracao['min'] == "30"){?>selected="selected"<?}?>>30</option>
				<option value="31" <?php If ($var_dataexpiracao['min'] == "31"){?>selected="selected"<?}?>>31</option>
				<option value="32" <?php If ($var_dataexpiracao['min'] == "32"){?>selected="selected"<?}?>>32</option>
				<option value="33" <?php If ($var_dataexpiracao['min'] == "33"){?>selected="selected"<?}?>>33</option>
				<option value="34" <?php If ($var_dataexpiracao['min'] == "34"){?>selected="selected"<?}?>>34</option>
				<option value="35" <?php If ($var_dataexpiracao['min'] == "35"){?>selected="selected"<?}?>>35</option>
				<option value="36" <?php If ($var_dataexpiracao['min'] == "36"){?>selected="selected"<?}?>>36</option>
				<option value="37" <?php If ($var_dataexpiracao['min'] == "37"){?>selected="selected"<?}?>>37</option>
				<option value="38" <?php If ($var_dataexpiracao['min'] == "38"){?>selected="selected"<?}?>>38</option>
				<option value="39" <?php If ($var_dataexpiracao['min'] == "39"){?>selected="selected"<?}?>>39</option>
				<option value="40" <?php If ($var_dataexpiracao['min'] == "40"){?>selected="selected"<?}?>>40</option>
				<option value="41" <?php If ($var_dataexpiracao['min'] == "41"){?>selected="selected"<?}?>>41</option>
				<option value="42" <?php If ($var_dataexpiracao['min'] == "42"){?>selected="selected"<?}?>>42</option>
				<option value="43" <?php If ($var_dataexpiracao['min'] == "43"){?>selected="selected"<?}?>>43</option>
				<option value="44" <?php If ($var_dataexpiracao['min'] == "44"){?>selected="selected"<?}?>>44</option>
				<option value="45" <?php If ($var_dataexpiracao['min'] == "45"){?>selected="selected"<?}?>>45</option>
				<option value="46" <?php If ($var_dataexpiracao['min'] == "46"){?>selected="selected"<?}?>>46</option>
				<option value="47" <?php If ($var_dataexpiracao['min'] == "47"){?>selected="selected"<?}?>>47</option>
				<option value="48" <?php If ($var_dataexpiracao['min'] == "48"){?>selected="selected"<?}?>>48</option>
				<option value="49" <?php If ($var_dataexpiracao['min'] == "49"){?>selected="selected"<?}?>>49</option>
				<option value="50" <?php If ($var_dataexpiracao['min'] == "50"){?>selected="selected"<?}?>>50</option>
				<option value="51" <?php If ($var_dataexpiracao['min'] == "51"){?>selected="selected"<?}?>>51</option>
				<option value="52" <?php If ($var_dataexpiracao['min'] == "52"){?>selected="selected"<?}?>>52</option>
				<option value="53" <?php If ($var_dataexpiracao['min'] == "53"){?>selected="selected"<?}?>>53</option>
				<option value="54" <?php If ($var_dataexpiracao['min'] == "54"){?>selected="selected"<?}?>>54</option>
				<option value="55" <?php If ($var_dataexpiracao['min'] == "55"){?>selected="selected"<?}?>>55</option>
				<option value="56" <?php If ($var_dataexpiracao['min'] == "56"){?>selected="selected"<?}?>>56</option>
				<option value="57" <?php If ($var_dataexpiracao['min'] == "57"){?>selected="selected"<?}?>>57</option>
				<option value="58" <?php If ($var_dataexpiracao['min'] == "58"){?>selected="selected"<?}?>>58</option>
				<option value="59" <?php If ($var_dataexpiracao['min'] == "59"){?>selected="selected"<?}?>>59</option>
			<?php }?>
		</select>
		</td>
	</tr>