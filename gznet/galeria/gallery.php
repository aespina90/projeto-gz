<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/gallery.css" type="text/css"/>
<link rel="stylesheet" href="js/fancy/jquery.fancybox.css?v=2.1.0"  media="screen" type="text/css"/>
<script src="js/fancy/jquery.fancybox.js?v=2.1.0" type="text/javascript"></script>	
<script src="js/fancy/jquery.mousewheel-3.0.6.pack.js" type="text/javascript"></script>	
<style>
.paginacao li{display:inline-block;padding:4px;}
.paginacao li a {display:inline-block;padding:4px;text-decoration:none;color:#333;}
.paginacao .current{color:red;}
</style>
<?php
@header( 'Content-Type: text/html; charset=iso-8859-1' );
require_once 'database/mysql.php';
$db = new Mysql;
$page = 0;
$perpage = 10; //quantidade de fotos por p�gina
$current = 1;
$link = '';
if ( isset( $_GET['page'] ) )
{
	$current = $_GET['page'];
	$page = $perpage * $_GET['page'] - $perpage;
	if ( $_GET['page'] == 1 )
	{
		$page = 0;
	}
}

if ( isset( $_GET['id'] ) )
{
    $album_id = $_GET['id'];
    $db->query( "select * from albuns join fotos on(album_id = foto_album) where foto_album = $album_id order by foto_pos asc" )->fetchAll();
		$total = $db->rows;
		if ( $total > $perpage )
		{				
			$link = "<ul class=\"paginacao\" style=\"float:left; width:99%;\">\n";
			$prox = "javascript:;";
			$ant = "javascript:;";
			if ( $current >= 2 )
			{
				$ant = "album.php?id=$album_id&page=" . ($current - 1);
			}
			if ( $current >= 1 && $current < ($total / $perpage))
			{
				$prox = "album.php?id=$album_id&page=" . ($current + 1);
			}
			$link .= '<li><a href="' . $ant . '" title="Anterior">Ant</a></li>';
			$from = round( $total / $perpage ) + 1;

			for ( $i = 1; $i <= $from - 1; $i++ )
			{
				if ( $current == $i )
				{
					$link .= "<li><a class=\"current\" href=\"album.php?id=$album_id&page=$i\"><b>$i</b></a></li>\n";
				}
				else
				{
					$link .= "<li><a href=\"album.php?id=$album_id&page=$i\"><b>$i</b></a></li>\n";
				}
			}
			$link .= '<li><a href="' . $prox . '" title="Pr�xima">Prox</a></li>';
			$link .= "</ul>\n";
		}
	
	
    $db->query( "select * from albuns join fotos on(album_id = foto_album) where foto_album = $album_id order by foto_pos asc LIMIT $page,$perpage" )->fetchAll();
    if ( $db->rows >= 1 )
    {
        $album_name = $db->data[0]['album_name'];

        echo "<h1>" . utf8_decode( $album_name ) . "</h1>\n";
        echo "<a href=\"album.php\" class=\"back\"><img src=\"images/left.png\"/> Voltar</a>";

        foreach ( $db->data as $fotos )
        {
            $f = ( object ) $fotos;
			$d1 = strtotime( date( 'Y-m-d' ) ) ;
			$d2 = strtotime( "$f->foto_data" );
			$d3 = round( ($d1 - $d2) / 86400 );
            $data = $d3;
            ?>
            <div class="box-detail" id="<?= $f->foto_id ?>">
                <div class="box-inner box-color">	
                    <a class="rel" data-fancybox-group="gallery" href="fotos/<?= $f->foto_url ?>" caption="<?= utf8_decode( $f->foto_caption ) ?>"> 					
                        <img src="thumb.php?img=fotos/<?= $f->foto_url ?>" alt="" /> 
                        <div class="box-inner-fx">
                            <h2><?= utf8_decode( $f->foto_caption ) ?></h2>
                            <span>Ampliar</span>
                        </div>
                    </a>
                </div>
                <div class="box-bottom">
                    <?php
                    if ( $f->foto_info != "" )
                    {
                        ?>
                        <div class="box-bottom-left"><?= utf8_decode( $f->foto_info ) ?></div>	
                        <div class="box-bottom-right"><?= $data ?> dia(s) atr�s</div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-bottom-right"><?= $data ?> dia(s) atr�s</div>
                        <?php
                    }
                    ?>
                </div>		
            </div>
            <?php
        }
		echo $link;
    }
}
else
{
    echo "<h1> Selecione um �lbum</h1> <br />\n";
    $db->query( "select * from albuns order by album_name asc" )->fetchAll();
    if ( $db->rows >= 1 )
    {
        $albuns = $db->data;
        foreach ( $albuns as $album )
        {
            $a = ( object ) $album;
            $db->query( "select * from fotos where foto_album = $a->album_id order by foto_pos asc" )->fetchAll();
            if ( $db->rows >= 1 )
            {
                $f = ( object ) $db->data[0];
                ?>
                <div class="box-detail box-alb" id="<?= $a->album_id ?>">
                    <div class="box-inner-alb">	
                        <a href="album.php?id=<?= $a->album_id ?>" caption="<?= utf8_decode( $a->album_name ) ?>"> 					
                            <img src="thumb.php?img=fotos/<?= $f->foto_url ?>" alt=""/> 
                            <div class="box-inner-fx">
                                <h2><?= utf8_decode( $a->album_name ) ?></h2>
                            </div>
                        </a>
                    </div>
                    <div class="box-bottom">
                        <div class="box-bottom-right-photo"><?= $db->rows ?> foto(s)</div>	
                    </div>		
                </div>
                <?php
            }
        }
    }
}
?>
<script type="text/javascript">	
    $(document).ready(function(){
        $('.box-alb').find('.box-inner-fx').css('background','url()').fadeIn(1000);
                
        $('.box-inner').hover(
        function(){
            $(this).find('.box-inner-fx').slideDown();
        },
        function(){
            $(this).find('.box-inner-fx').slideUp();
        })	
        window.onload = function()
        {
            
            $(".rel").fancybox({
                openEffect : 'elastic',
                openSpeed  : 150,
                closeEffect : 'elastic',
                closeSpeed  : 350, 
                arrows: true,
                helpers : {
                    title : {
                        type : 'float'//float, over, outside,inside
                    }}                
                });
            }
        })
</script>  
