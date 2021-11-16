function abrir(URL) {

    var width = 1024;
    var height = 768;

    var left = (screen.width) ? (screen.width-width)/2 : 0;
    var top = (screen.height) ? (screen.height-height)/2 : 0;
    window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=yes');
}
function abrir2(URL) {

    var width = 500;
    var height = 300;

    var left = (screen.width) ? (screen.width-width)/2 : 0;
    var top = (screen.height) ? (screen.height-height)/2 : 0;
    window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, statusbar=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=yes, titlebar=no');
}

function abrir3(URL) {

    var width = 764;
    var height = 768;

    var left = (screen.width) ? (screen.width-width)/2 : 0;
    var top = (screen.height) ? (screen.height-height)/2 : 0;
    window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=yes');
}

function show(id){
    document.getElementById(id).style.visibility="visible";
}
function hide(id){
    document.getElementById(id).style.visibility="hidden";
}
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

function jsddm_open()
{
    jsddm_canceltimer();
    jsddm_close();
    ddmenuitem = $(this).find('ul').eq(0).css('visibility', 'visible');
}

function jsddm_close()
{
    if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');
}

function jsddm_timer()
{
    closetimer = window.setTimeout(jsddm_close, timeout);
}

function jsddm_canceltimer()
{
    if(closetimer)

    {
        window.clearTimeout(closetimer);
        closetimer = null;
    }
}

$(document).ready(function()
{
    $('#jsddm > li').bind('mouseover', jsddm_open);
    $('#jsddm > li').bind('mouseout',  jsddm_timer);
});

document.onclick = jsddm_close;
function exibe(id) {
	if(document.getElementById(id).style.display=="none") {
		document.getElementById(id).style.display = "inline";
	}
	else {
		document.getElementById(id).style.display = "none";
	}
}

function minimiza(){
    	document.getElementById('cat1').style.display = "none";
        document.getElementById('cat2').style.display = "none";
        document.getElementById('cat3').style.display = "none";
        document.getElementById('cat4').style.display = "none";
}
function fecha(){
    window.close()
}
            