// Teclado virtual

//Deve existir objeto para ancorar posicionamento com o nome kb.
//Ex: <img src=imagens/shim.gif name=kb>

var sForm='document.formLogin.';
var iCampo=0;
var oTeclado=new Array();
var oFont=new Array();
var oCoord=new Array();
var oStatus=new Array();
var oCampos=new Array();

function getLeft(oImg){return(oImg.offsetParent ? (getLeft(oImg.offsetParent)+oImg.offsetLeft) : oImg.offsetLeft);}
function getTop(oImg){return(oImg.offsetParent ? (getTop(oImg.offsetParent)+oImg.offsetTop) : oImg.offsetTop);}

function PosicionaTeclado(bLayer){AtivaTeclado(getLeft(document.kb),getTop(document.kb),0,10,bLayer);}

function DefinirTeclas(){oFont[0]=new Array("'", unescape("%22"));oFont[1]=new Array(1,"!");oFont[2]=new Array(2,"@");oFont[3]=new Array(3,"#");oFont[4]=new Array(4,"$");oFont[5]=new Array(5,"%");oFont[6]=new Array(6,"¨");oFont[7]=new Array(7,"&");oFont[8]=new Array(8,"*");oFont[9]=new Array(9,"(");oFont[10]=new Array(0,")");oFont[11]=new Array("-","_");oFont[12]=new Array("=","+");oFont[13]=new Array("q","");oFont[14]=new Array("w","");oFont[15]=new Array("e","");oFont[16]=new Array("r","");oFont[17]=new Array("t","");oFont[18]=new Array("y","");oFont[19]=new Array("u","");oFont[20]=new Array("i","");oFont[21]=new Array("o","");oFont[22]=new Array("p","");oFont[23]=new Array("´","`");oFont[24]=new Array("[","{");oFont[25]=new Array("<-","");oFont[26]=new Array("a","");oFont[27]=new Array("s","");oFont[28]=new Array("d","");oFont[29]=new Array("f","");oFont[30]=new Array("g","");oFont[31]=new Array("h","");oFont[32]=new Array("j","");oFont[33]=new Array("k","");oFont[34]=new Array("l","");oFont[35]=new Array("ç","");oFont[36]=new Array("~","^");oFont[37]=new Array("]","}");oFont[38]=new Array("RET","");oFont[39]=new Array("\\","|");oFont[40]=new Array("z","");oFont[41]=new Array("x","");oFont[42]=new Array("c","");oFont[43]=new Array("v","");oFont[44]=new Array("b","");oFont[45]=new Array("n","");oFont[46]=new Array("m","");oFont[47]=new Array(",","<");oFont[48]=new Array(".",">");oFont[49]=new Array(";",":");oFont[50]=new Array("/","?");oFont[51]=new Array("RET","");oFont[52]=new Array("CAPS","");oFont[53]=new Array("CAPS","");oFont[54]=new Array("CAPS","");oFont[55]=new Array("SHIFT","");oFont[56]=new Array("SHIFT","");oFont[57]=new Array("SHIFT","");oFont[58]=new Array(" ","");oFont[59]=new Array(" ","");oFont[60]=new Array(" ","");oFont[61]=new Array(" ","");oFont[62]=new Array(" ","");oFont[63]=new Array(" ","");oFont[64]=new Array(" ","");}

function PosicionarKB(intPosVertInicialOrig,intPosHozInicialOrig,intDesloca,intFator,blnOffLine){
 intPosVertInicialOrig=parseInt(intPosVertInicialOrig+Math.round(Math.random()*intFator));
 intPosHozInicialOrig =parseInt(intPosHozInicialOrig+intDesloca+Math.round(Math.random()*intFator));
 var intPosVertInicialOrig=(screen.width /2 ) - 10;
 if (document.getElementById('backend_img_logo')) {
  var intPosHozInicialOrig = 150 + document.getElementById('backend_img_logo').height + 9;
  // if forte-fiat +17 px
  // if softexonline +7 px
  // if softexlocal +15 px
 }
 else {
  var intPosHozInicialOrig = 203;
 }

 var intLarguraHozTcl=19;
 var intLarguraVerTcl=22;
 var intPosVertInicial=intPosVertInicialOrig;
 var intPosHozInicial=intPosHozInicialOrig;
 var intPosVertInicialOld=intPosVertInicialOrig;
 var intX1,intY1,intX2,intY2;
 for (var iIndice=0;iIndice<65;iIndice++){
  intX1=intPosVertInicial;
  intY1=intPosHozInicial;
  intX2=parseInt(intPosVertInicial+parseInt(intLarguraVerTcl-2));
  intY2=parseInt(intPosHozInicial+parseInt(intLarguraHozTcl-2));
  oCoord[iIndice]=new Array(intX1,intY1,intX2,intY2,oFont[iIndice][0],oFont[iIndice][1]);
  intPosVertInicial+=22;
  if ((parseInt(iIndice+1)%13)==0 && iIndice!=0){
   intPosHozInicial+=19;
   intPosVertInicial=intPosVertInicialOld;
  }
 }
 MostraKB(intPosVertInicialOrig,intPosHozInicialOrig,blnOffLine);
}

function AlterarStatus(strTecla){
 switch(strTecla){
  case "CAPS":
   if(oStatus[0][0]){TrocarTeclado(1);oStatus[0][0]=false;oStatus[1][0]=true;return true;}
   if(oStatus[2][0]){
    if (document.imgTeclado.complete){
     TrocarTeclado(3);oStatus[3][0]=true;oStatus[2][0]=false;return true;
    }
    else{alert("Aguarde...");return false;}
   }
   if (oStatus[3][0]){
    if (document.imgTeclado.complete){
     TrocarTeclado(2);oStatus[2][0]=true;oStatus[3][0]=false;return true;
    }
    else{alert("Aguarde...");return false;
    }
   }
   else{
    TrocarTeclado(0);oStatus[0][0]=true;oStatus[1][0]=false;return true;
   }
   break;
  case "SHIFT":
   if(oStatus[0][0]){TrocarTeclado(2);oStatus[0][0]=false;oStatus[2][0]=true;return true;}
   if(oStatus[1][0]){TrocarTeclado(3);oStatus[3][0]=true;oStatus[1][0]=false;return true;}
   if(oStatus[3][0]){TrocarTeclado(1);oStatus[1][0]=true;oStatus[3][0]=false;return true;}
   else{TrocarTeclado(0);oStatus[0][0]=true;oStatus[2][0]=false;return true;}
   break;
 }
 return true;
}

function TrocarTeclado(iIndice){
 document.imgTeclado.src=oTeclado[iIndice].src;
 return true;
}

function ManipularTeclado(evnt){
 var blnImg=false;
 var blnRet=false;
 if(navigator.appName=='Netscape'){
  if(evnt.target.name=="imgTeclado" || evnt.target=="javascript:void(13)"){blnImg=true;}
  else{return true;}
 }
 else{
  if(window.event.srcElement.tagName == "IMG"){blnImg=true;}
 }
 if(blnImg){
  if(navigator.appName == 'Netscape') {
   var x=parseFloat(parseInt(evnt.pageX));
   var y=parseFloat(parseInt(evnt.pageY));
  }
  else{
   var x=parseFloat(parseInt(event.x)+parseFloat(document.body.scrollLeft));
   var y=parseFloat(parseInt(event.y)+parseFloat(document.body.scrollTop));
  }
  for(var iIndice=0;iIndice<oCoord.length;iIndice++){
   if((x>=oCoord[iIndice][0] && x<=oCoord[iIndice][2]) && (y>=oCoord[iIndice][1] && y <= oCoord[iIndice][3])){
    switch (oCoord[iIndice][4]){
     case "<-":
      eval(sForm+oCampos[iCampo][0]+".value="+sForm+oCampos[iCampo][0]+".value.substring(0,parseInt("+sForm+oCampos[iCampo][0]+".value.length)-1)");
      break;
     case "RET":
      NovoFoco();
      setTimeout("eval('"+sForm+oCampos[iCampo][0]+".focus()');",10);
      blnRet=true;
      break;
     case "CAPS":
      AlterarStatus("CAPS");
      break;
     case "SHIFT":
      AlterarStatus("SHIFT");
      break;
     default:
       if(oStatus[0][0]){AtualizarValor(oCoord[iIndice][4]);}
       if(oStatus[1][0] && isNaN(oCoord[iIndice][4])){AtualizarValor(oCoord[iIndice][4].toUpperCase());}
       if(oStatus[1][0] && !isNaN(oCoord[iIndice][4])){AtualizarValor(oCoord[iIndice][4]);}
       if(oStatus[2][0]){
        if(oCoord[iIndice][5]!=""){AtualizarValor(oCoord[iIndice][5]);}
        else{
         if(isNaN(oCoord[iIndice][4])){AtualizarValor(oCoord[iIndice][4].toUpperCase());}
         else{AtualizarValor(oCoord[iIndice][4]);}
        }
        AlterarStatus("SHIFT");
       }
       if(oStatus[3][0]){
        if(oCoord[iIndice][5]!=""){AtualizarValor(oCoord[iIndice][5]);}
        else{
         if(isNaN(oCoord[iIndice][4])){AtualizarValor(oCoord[iIndice][4].toUpperCase());}
         else{AtualizarValor(oCoord[iIndice][4]);}
        }
        AlterarStatus("SHIFT");
       }
    }//switch
   }
  }
 }
 if(!blnRet){setTimeout("eval('" + sForm + oCampos[iCampo][0] + ".focus();')",10);}
 return false;
}

function AtualizarValor(strValor){
 switch(oCampos[iCampo][2]){
  case "A": //Campo alfanumérico
   if(eval(sForm+oCampos[iCampo][0]+".value.length")<parseInt(oCampos[iCampo][1])){
    if (escape(strValor)=="%27"){eval(sForm+oCampos[iCampo][0]+".value+=\""+strValor+"\"");}
    else{
     var objTargetField=new Object(eval(sForm+oCampos[iCampo][0]));
     objTargetField.value += strValor;
    }
   }
   if(eval(sForm+oCampos[iCampo][0]+".value.length")==parseInt(oCampos[iCampo][1])){
    NovoFoco();
    setTimeout("eval('"+sForm+oCampos[iCampo][0]+".focus()');",10);
   }
   break;
  case "N": //Campo numérico
    if(eval("parseInt("+sForm+oCampos[iCampo][0]+".value.length)")<parseInt(oCampos[iCampo][1])){
     if(escape(strValor)=="%27"){
      eval(sForm+oCampos[iCampo][0]+".value+=ValidarNum(\"" + strValor + "\")");}
     else{
      var objTargetField=new Object(eval(sForm+oCampos[iCampo][0]));
      objTargetField.value += ValidarNum(eval("'" + strValor + "'"));
     }
    }
    if(eval("parseInt("+sForm+oCampos[iCampo][0]+".value.length)") == parseInt(oCampos[iCampo][1])){
     NovoFoco();
     setTimeout("eval('"+sForm+oCampos[iCampo][0]+".focus()');",10);
    }
    break;
 }
 return true;
}

function NovoFoco(){
 if(arguments.length>0){
  iCampo=arguments[0];
 }
 else{
  if(parseInt(parseInt(oCampos.length)-1)==parseInt(iCampo)){
   iCampo=0;
  }
  else{
   iCampo=parseInt(iCampo)+1;
  }
 }
}

function MostraKB(intPosVertInicialOrig,intPosHozInicialOrig,blnOffLine){
 if(navigator.appName=='Netscape'){
   window.captureEvents(Event.CLICK | Event.MOUSEDOWN | Event.MOUSEUP);
   if(parseFloat(navigator.appVersion.split(" ")[0])<5){
    if(!blnOffLine){document.writeln('<layer id="posicaotcl" left="'+intPosVertInicialOrig+'" top="'+intPosHozInicialOrig+'" ><A HREF="javascript:void(13)"><img name="imgTeclado" border="0" src="'+oStatus[0][1]+'"></A></layer>');}
    else{
     var objLyr=document.posicaotcl;
     objLyr.top=intPosHozInicialOrig;
     objLyr.left=intPosVertInicialOrig;
    }
   }
   else{if(!blnOffLine){document.writeln('<layer id=posicaotcl style="position:absolute;left:'+intPosVertInicialOrig+';top:'+intPosHozInicialOrig+';"><a href="javascript:void(13)"><img name=imgTeclado border=0 src='+oStatus[0][1]+'></a></layer>')}
   }
   window.onmousedown=ManipularTeclado;
 }
 else{ //IE
  if(!blnOffLine){document.writeln('<div id=divTeclado style="cursor:hand;width:284;height:93;position:absolute;left:'+intPosVertInicialOrig+'; top:'+intPosHozInicialOrig+'"><img name=imgTeclado border=0 src='+oStatus[0][1]+'></div>');}
  else{
   divTeclado.style.top=intPosHozInicialOrig;
   divTeclado.style.left=intPosVertInicialOrig;
  }
  document.imgTeclado.onmousedown=ManipularTeclado;
  document.imgTeclado.ondblclick=ManipularTeclado;
 }
}
function DefinirCampos(){
//Define os campos do form que aceitarão o teclado virtual, no formato Nome%Tamanho%Tipo
 for(iIndice=0;iIndice<arguments.length;iIndice++){
  oCampos[iIndice]=new Array(arguments[iIndice].split("%")[0],arguments[iIndice].split("%")[1],arguments[iIndice].split("%")[2]);
 }
}

function ObtemLayout(){
 var blnSel;
 for(iIndice=0;iIndice<arguments.length;iIndice++){
  if(iIndice==0)blnSel=true; else blnSel=false;
  oStatus[iIndice]=new Array(blnSel,arguments[iIndice]);
 }
 for(var iIndice=0;iIndice<oStatus.length;iIndice++){
  oTeclado[iIndice]=new Image();
  oTeclado[iIndice].src=oStatus[iIndice][1];
 }
}

function ValidarNum(intVal){if(isNaN(intVal)||intVal==" ") return ""; else return intVal;}

function AtivaTeclado(intPosVertInicial,intPosHozInicial,intDeslocamento,intFatorCorrecao,blnOffLine){
 DefinirTeclas();
 PosicionarKB(intPosVertInicial,intPosHozInicial,intDeslocamento,intFatorCorrecao,blnOffLine);
}

ObtemLayout("icones/teclado/teclado.gif","icones/teclado/tecladocl.gif","icones/teclado/teclados.gif","icones/teclado/tecladoscl.gif");