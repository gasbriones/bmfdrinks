<?php
require 'panel/phpScripts/connection/connection.php';
$result = mysql_query("SELECT * FROM categoria_producto ORDER BY 'id'") or die('Error, getPromociones error');
mysql_close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description"
          content="Bebidas a domicilio: cervezas, vinos, whisky, vodka, champagne, gin, tequila, ron, licores, fernet, aperitivos, energizantes, picadas, vinos espumantes, gaseosas, aguardiente, Delivery de Bebidas, deliverydebebidas, bebidas, delivery" />
    <meta name="keywords"
          content="Delivery de Bebidas alcohol, cervezas, vinos, whisky, vodka, champagne, gin, tequila, ron, licores, fernet, aperitivos, energizantes, picadas, vinos espumantes, gaseosas, aguardiente, nosotros, promos, Palermo, Villa Crespo, Almagro, Recoleta, deliverydebebidas" />
    <title>BMF DRINKS Delivery de bebidas en Buenos Aires.</title>

    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/fancy-box.css" type="text/css" media="all">
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/fancy-box.js"></script>
    <script type="text/javascript" src="js/navs.js"></script>
    <script type="text/javascript" src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.ez-bg-resize.js"></script>
    <script type="text/javascript" src="js/init.js"></script>

</head>

<body>
<div id="glob">
    <div class="aside-bg" style="right:744.5px;"></div>
    <div id="main">
        <h1>
            <a href="../index.php"> <img alt="" src="images/logo.png"></a>
        </h1>
        <nav>
            <ul class="sf sf-js-enabled sf-shadow">
                <li class="active" >
                    <a href="#!/home" style="color: rgb(138, 137, 137);">home<span style="opacity: 0; display: inline;"></span></a>
                </li>
                <li>
                    <a href="#!/promos" style="color: #8A8989;" id="promocionesLink">promos<span style="opacity: 0; display: inline;"></span>
                        <img class="img_new" src="images/new_icon.png" width="40" />
                    </a>
                </li>
                <li>
                    <a href="#!/productos"	style="color: #8A8989;" id="productosLink">productos<span style="opacity: 0; display: inline;"></span></a>
                </li>
                <li>
                    <a href="#!/entrega" style="color: #8A8989;">zona de entrega<span style="opacity: 0; display: inline;"></span></a>
                </li>
                <li>
                    <a href="#!/contacto" style="color: #8A8989;">contacto<span	style="opacity: 0; display: inline;"></span></a>
                </li>
            </ul>
        </nav>
        <div id="banners">
            <div class="slogan">
                <div class="titulo-slogan">Delivery Drink's</div>
                <div class="frase">Que te vamos a explicar...</div>
            </div>
            <div id="telefonos">
                <div>Teléfonos</div>
                <div  class="numeros">4833-0260</div>
                <div  class="numeros">4831-4373</div>
            </div>
        </div>

        <div id="sombra-human"></div>
        <div id="zona">
            <img src="images/nav-palermo.png">
        </div>
        <div id="megafono">
            <img src="images/megafono.png">
        </div>



        <article id="content" style="top: -100%;">
            <ul>
                <li id="home" style="display: none;">
                    <div id="siluetas">

                    </div>
                    <p class="parrafo-1">
                        Ubicados en Palermo y Belgrano, y distribuyendo a mas de 10 barrios aledaños, brindamos desde hace 8 años el mejor servicio de entrega de bebidas a domicilio, ofreciendo a nuestros clientes las mejores marcas de bebidas importadas y nacionales, acompañado de una cordial atención telefónica.
                    </p>
                    <p class="parrafo-2">
                        Delivery de bebidas en general, cervezas, aperitivos, espumantes, vinos en sus variedades de uva, whiskies scotch , irish y bourbon, bebidas blancas, licores artesanales, licores cremosos, coolers, energizantes, bebidas sin alcohol, snacks y cigarrillos.
                    </p>

                    <div class="alerta">
                        <a href="../belgrano"><img src="images/alerta.jpg" border="0" /></a>
                    </div>

                </li>
                <li id="promos" style="display: none;">
                    <h3>Promociones</h3>
                    <div class="scrollable">

                    </div>
                </li>
                <li id="productos" style="display: list-item; opacity: 1;">
                    <h3>Lista de productos</h3>
                    <div class="tabs">
                        <ul id="tabsLinks">
                            <?php
                            while ($row = mysql_fetch_array($result)) {
                                if($row['categoriaId']== 1){
                                    echo ' <li class="active" categoriaId="'.$row['categoriaId'].'"><a href="#" style="color:#FFF !important; background-color: #FC2500 !important">'.$row['categoriaNombre'].'</a></li>';
                                }else{
                                    echo ' <li categoriaId="'.$row['categoriaId'].'"><a href="#" style="color: #fff; background-color: rgb(0, 0, 0);">'.$row['categoriaNombre'].'</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="tabs-items" id="tabs-items-content">

                    </div>
                </li>
                <li id="entrega" style="display: none;">
                    <h3>Zona de entrega</h3>
                    <dt>

                        <img alt="" src="images/zona-entrega.jpg">
                    </dt>
                    <dt class="entregas">
                    <p class="light-gray">
                        :: <b class="orange">ZONA 1:</b> <br /> Desde Oro, Av Santa Fé, Julian Alvarez,
                        Cordoba. <br /> No se cobra envio y el pedido
                        mínimo es de $40 ::
                    </p>
                    <p class="light-gray">
                        :: <b class="orange">ZONA 2:</b> <br />
                        Desde Juan B. Justo hasta Las Heras/Guitierrez/Juncal,
                        Coronel Díaz y Cordoba/Estado de Israel/Aguirre. <br /> No se cobra envio y el pedido
                        mínimo es de $50 ::
                    </p>
                    <p class="light-gray">
                        :: <b class="orange">ZONA 3:</b> <br />
                        Desde Ravignani, Luis Maria Campos, Aguero, Velazco
                        Libertador y Corrientes. <br /> Costo del envio $3 y el pedido
                        mínimo es de $80 ::
                    </p>
                    <p class="light-gray">
                        :: <b class="orange">ZONA 4:</b> <br />
                        Desde Newbery, Libertador, Pueyrredon, Corrientes/Angel Gallardo/Warnes/Murillo
                        <br /> Costo del envio $5 y el pedido
                        mínimo es de $100 ::
                    </p>
                    <p class="light-gray">
                        :: <b class="orange">ZONA 5:</b> <br />
                        Desde Lacroze, Figueroa Alcorta, Callao, Rivadavia/Diaz Velez/Honorio Pueyrredon
                        <br /> Costo del envio $7 y el pedido
                        mínimo es de $150 ::
                    </p>
                    <p class="light-gray">
                        :: <b class="orange">ZONA 6:</b> <br />
                        Desde Zabala, Rio, 9 de Julio, Rivadavia <br /> Costo del envio $13 y el pedido
                        mínimo es de $200 ::
                    </p>
                    <p class="light-gray">
                        :: <b class="orange">ZONA 7:</b> <br />
                        Mas Lejos!! <br /> Costo del envio $20 y el pedido
                        mínimo es de $300 ::
                    </p>

                    </dt>

                </li>
                <li id="contacto" style="display: none;">
                    <h3>Contactanos</h3>
                    <div class="col-1">
                        <!--iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.ar/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=Nicaragua+4563,+Buenos+Aires&amp;aq=0&amp;oq=nicaragua+4563&amp;sll=-38.452918,-63.598921&amp;sspn=33.793132,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Nicaragua+4563,+Palermo,+Buenos+Aires&amp;t=m&amp;ll=-34.5904,-58.425035&amp;spn=0.017665,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe -->
                    </div>
                    <div class="col-2">
                        <dl class="address blo">
                            <dt class="blo"><b>Nicaragua 4563 - Palermo SOHO</b></dt>
                            <dd><span>Teléfonos:</span> (11) 4833-0260 | 4831-4373 </dd>
                            <dd><span>Cel:</span> 15-60985989</dd>
                            <dd><span>ID:</span> 639*3512</dd>
                            <dd><span>E-mail:</span> <a href="mailto:consultasbmf@hotmail.com">consultasbmf@hotmail.com</a></dd>
                        </dl>
                        <form id="form1">
                            <fieldset>
                                <label class="name">Nombre:<br>
                                    <input type="text" value="">
                                    <span class="error" style="display: none;">*Nombre invalido.</span> <span class="empty" style="display: none;">*Campo requerido.</span> </label>
                                <label class="email">Email:<br>
                                    <input type="email" value="">
                                    <span class="error" style="display: none;">*Email invalido.</span> <span class="empty" style="display: none;">*Campo requerido.</span> </label>
                                <label class="message">Mensaje:<br>
                                    <textarea></textarea>
                                    <span class="error" style="display: none;">*Ingrese su mensaje.</span> <span class="empty" style="display: none;">*Campo requerido.</span> </label>
                                <div class="btns"><a data-type="reset" class="btn" href="#">Borrar</a><a data-type="submit" class="btn" href="#">Enviar</a></div>
                            </fieldset>
                        </form>
                    </div>
                </li>
            </ul>
        </article>
    </div>
    <footer>
        <div class="in">
            <div class="mp3-mask"> Sound</div>
            <div class="mp3-player">
                <object type="application/x-shockwave-flash" data="mp3/dewplayer.swf" width="200" height="20" id="dewplayer" name="dewplayer">
                    <param name="wmode" value="transparent" />
                    <param name="movie" value="mp3/dewplayer.swf" />
                    <param name="flashvars" value="mp3=mp3/sound.mp3&amp;autostart=1" />
                </object>
            </div>
            <div class="yo">Diseñado por: <a href="https://twitter.com/gasbriones" target="_new">@gasbriones</a></div>
            <pre class="privacy und">bmf drinks &copy; 2013 | Prohibida la venta a menores de 18 años</pre>
				<pre class="info und nocolor">Teléfonos: (11) 4833-0260 | 4831-4373 | 15-60985989 | ID: 639*3512  E- mail: <a
                        href="mailto:consultasbmf@hotmail.com">consultasbmf@hotmail.com</a> 	<!-- {%FOOTER_LINK} -->
				</pre>
            <ul class="soc-ico">
                <li><a href="https://www.facebook.com/BMFDrinks" target="_blank"><img alt="" src="images/facebook.png"> </a></li>
            </ul>
        </div>
    </footer>
</div>

</body>
</html>
