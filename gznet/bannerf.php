<?php include("inc_conexao.php"); ?>
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
<div id="slide" style="z-index:997;">
  <?php $sql = mysql_query("select * from banner order by id asc"); while($row = mysql_fetch_assoc($sql)): ?>
     <a href="<?php echo $row['link'];?>">  
       <img src="uploads/<?php echo $row['imagem'];?>" width="216" height="227" border="0" style="border:1px solid #333" />
     </a>
  <?php endwhile;?>
</div>
<div id="nav"  style="position:relative; top:-30px; z-index:998; left:140px; font-family:verdana; font-size:10px"></div>

