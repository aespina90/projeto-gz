<!DOCTYPE html>
<html>
    <head>  
        <title>Dream Gallery</title>  
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/home.css" type="text/css"/>
    </head>
    <body>	
        <div id="wrap">

            <div id="top-menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li class="current"><a href="album.php">Álbuns</a></li>
                    <li><a href="javascript:void(0)">Blog</a></li>
                    <li><a href="javascript:void(0)">Contato</a></li>
                    <li><a href="javascript:void(0)">Créditos</a></li>
                </ul>
            </div>

            <div id="top">
                <h1>Dream <span>Gallery</span></h1>
            </div>

            <div id="gallery">
                <?php require_once 'gallery.php'; ?>
            </div>

            <div id="footer">
                <h1>
                    Design by Rafael Clares
                </h1>
            </div>
        </div>

    </body>
</html>