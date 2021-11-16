<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script type="text/javascript" language="javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript" language="javascript" src="jquery.cycle.all.js"></script>

<script language="JavaScript" type="text/javascript">
    $(function(){
	  $("#slide").cycle({
	  	fx: 'fade',
		pager:  '#nav',
		next: '#next2',
		prev: '#prev2',
		speed: 3000,
		timeout: 100
	  })
	})
</script>

<style type="text/css">

#nav a { border: 1px solid #6699ff; background: #FFF; text-decoration: none; margin: 0 2px; padding: 1px 5px; color:#6699ff }
#nav a.activeSlide { background: #FFF; color:#333}
#nav a:focus { outline: none; }


</style>

</head>

<body>
<div id="slide">
    <img src="banner.jpg" width="216" height="227" />
    <img src="banner.jpg" width="216" height="227" />
    <img src="banner.jpg" width="216" height="227" />
</div>
<div id="nav"  style="position:relative; top:-30px; z-index:555; left:140px;"></div>
</body>
</html>
